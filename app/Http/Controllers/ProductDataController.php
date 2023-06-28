<?php

namespace App\Http\Controllers;

use App\Models\DataProdReferenceModel;
use App\Models\MenuProdTypeShop;
use Illuminate\Http\Request;

class ProductDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 10); // 在index加入輸入參數以便從view輸入想要的每頁數量，並設定預設值為 10
        $search_text = $request->get('search_text', ''); // 取得搜尋關鍵字
        $search_text = strip_tags($search_text);
        // $search_text = "";

        $search_column = array('Model', 'SSTOCK.SK_USE', 'SSTOCK.SK_LOCATE', 'SSTOCKFD.fd_name', 'SSTOCKFD_temp.fd_name'
                            , 'SK_NO1', 'SK_NO2', 'SK_NO3', 'SK_NO4');
        $search_column2 = array('Model', 'SK_NO1', 'SK_NO2', 'SK_NO3', 'SK_NO4');

        $DataProdsReference = DataProdReferenceModel::select(
            'ID'
            , 'Model'
            , DataProdReferenceModel::raw('(case when SSTOCK.SK_USE is NUll then SSTOCK_temp.SK_USE 
                                            else SSTOCK.SK_USE 
                                            end) as SK_USE')
            , DataProdReferenceModel::raw('(case when SSTOCK.SK_LOCATE is NUll then SSTOCK_temp.SK_LOCATE 
                                            else SSTOCK.SK_LOCATE 
                                            end) as SK_LOCATE')
            , DataProdReferenceModel::raw('(case when SSTOCKFD.fd_name is NUll then SSTOCKFD_temp.fd_name 
                                            else SSTOCKFD.fd_name 
                                            end) as fd_name')
            , 'SSTOCK.SK_NAME'
            ,'SK_NO1'
            ,'SK_NO2'
            ,'SK_NO3'
            ,'SK_NO4'
            ,'Price'
            ,'Suggested Price'
            ,'Cost Price'
            ,'SPH_NowQtyByWare'
        )->from(function ($sub) {
            $sub->select('*')->from('Data_Prod_Reference');
        }, 'PCT')
        ->leftJoin('SSTOCK', 'SK_NO1', '=', DataProdReferenceModel::raw('SK_NO collate chinese_taiwan_stroke_ci_as'))
        ->leftJoin('SSTOCK_temp', 'SK_NO4', '=', DataProdReferenceModel::raw('SSTOCK_temp.SK_NO collate chinese_taiwan_stroke_ci_as'))
        ->leftJoin('SSTOCKFD', 'SK_NO1', '=', DataProdReferenceModel::raw('fd_skno collate chinese_taiwan_stroke_ci_as'))
        ->leftJoin('SSTOCKFD_temp', 'SK_NO4', '=', DataProdReferenceModel::raw('SSTOCKFD_temp.fd_skno collate chinese_taiwan_stroke_ci_as'))
        ->leftJoinSub(
            DataProdReferenceModel::select('*')->from('View_SPHNowQtyByWare')->where('WD_WARE', '=', 'A'), 
            'QTY', 'SK_NO1', '=', DataProdReferenceModel::raw('WD_SKNO collate chinese_taiwan_stroke_ci_as')
        )
        ->where(function ($query) use($search_column,$search_text) {
            for ($i = 0; $i < count($search_column); $i++){
               $query->orwhere($search_column[$i], 'LIKE',  '%'.$search_text. '%');
            }      
        })
        ->orWhere(function ($query) use($search_column2,$search_text) {
            for ($i = 0; $i < count($search_column2); $i++){
               $query->orwhere($search_column2[$i], 'LIKE',  '%'.$search_text.'%');
            }      
        })
        ->oldest('Model') // ->orderBy('Model')
        ->paginate($perPage);

        // return view('DataProdReference.index')->with('DataProdsReference',$DataProdsReference);
        return view('ProductDataManage.index', compact('DataProdsReference', 'perPage', 'search_text')); // 將變數傳回給View

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

        $DefaultMenuSpecItems = app('App\Http\Controllers\MenuSpecItemController')->index(0);
        
        $shopMenus1 = MenuProdTypeShop::select('shop_menu1_id',
                                                'shop_menu1_name',
                                                'shop_menu1_rem')
                                        ->get();
        return view('ProductDataManage.create', compact('shopMenus1', 'DefaultMenuSpecItems'));
    }

    // 之後要改到MenuProdTypeShop控制器下...
    public function getShopMenu2($id)
    {
            $shopMenus2 = MenuProdTypeShop::with('MenuProdClassShop')->where('shop_menu1_id', $id)->get();
            if($shopMenus2->count() > 0){
                $shopMenus2 = json_decode($shopMenus2, true);
                $shopMenus2 = $shopMenus2[0]['menu_prod_class_shop'];
                return view('ProductDataManage.select-shopMenus2', compact('shopMenus2'));
            }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Sec = 3;
        $error = 0;
        $input = $request->input();
        $new_Model = $input['create_Model'];
        $SK_NO1 = $input['SK_NO1'];
        $SK_NO2 = $input['SK_NO2'];
        $SK_NO3 = $input['SK_NO3'];
        $SK_NO4 = $input['SK_NO4'];
        $categories = !empty($input['categories'])?($input['categories']):"0";
        $ProdType = !empty($input['ProdType'])?($input['ProdType']):"0";
        $name_for_sell_tw = $input['name_for_sell_tw'];

        if(empty($new_Model)){
            echo "Model不可為空！<br>";
            $error++;
        }

        $check_model_extis = $this->show($new_Model)->count();
        if ($check_model_extis) {
            echo $new_Model."已經存在，無法重複建立！<br>";
            $error++;
        }
        
        if(empty($SK_NO1.$SK_NO2.$SK_NO3.$SK_NO4)){
            echo "請至少填寫一個料號！<br>";
            $error++;
        }

        if($categories+$ProdType==0){
            echo "請設定產品分類！<br>";
            $error++;
        }

        if($error>0){
            return;
        }else{
            $SK_NO1 = empty($SK_NO1)?'':$SK_NO1;
            $SK_NO2 = empty($SK_NO2)?'':$SK_NO2;
            $SK_NO3 = empty($SK_NO3)?'':$SK_NO3;
            $SK_NO4 = empty($SK_NO4)?'':$SK_NO4;

            
            echo "建立基本資料(對照)...<br>";
            $DataProdReference = 
            DataProdReferenceModel::create(array_merge($input,
                                                        [
                                                            'Model' => $new_Model,
                                                            'SK_NO1' => $SK_NO1,
                                                            'SK_NO2' => $SK_NO2,
                                                            'SK_NO3' => $SK_NO3,
                                                            'SK_NO4' => $SK_NO4
                                                        ]));

            if(isset($DataProdReference)){
                echo "建立基本資料成功<br>";
            }else{
                echo "建立基本資料失敗<br>";
            }

            if(!empty($name_for_sell_tw)){
                echo "儲存產品銷售用名稱...<br>";
                $id = $new_Model;
                $fd_name = app('App\Http\Controllers\SStockFDTempController')->show($id);
                if($fd_name->count() > 0){
                    app('App\Http\Controllers\SStockFDTempController')->update($request, $id);
                }else{
                    app('App\Http\Controllers\SStockFDTempController')->store($request);
                }
                
            }

            for($i=1;$i<3;$i++) {
                $item = "SK_NO".$i;
                if(!empty($$item)){
                    $id = $$item;
                    echo "更新規格資料到料號".$id."...<br>";
                    // app('App\Http\Controllers\SStockController')->update($request, $id);                
                }
            }

            if(!empty($SK_NO4)){
                echo "建立臨時料號...<br>";
                app('App\Http\Controllers\SStockTempController')->store($request);                
            }

            echo $Sec.'秒後回到上一頁';
            echo "<script>
                    setTimeout(function(){ 
                        window.location.href = '/ProductDataManage'; 
                    }, ".($Sec*1000).");
                  </script>";
        }



        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Model = DataProdReferenceModel::select('Model')->where('Model', $id)->get();
        return $Model;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
