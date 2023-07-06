<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuProdClass;
use App\Models\MenuProdClassShop;
use App\Models\MenuSpecItem;
use App\Models\MenuSpecItemUniversal1;
use App\Models\MenuSpecItemUniversal2;

class MenuSpecItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    { 
        $MenuSpecItemsUni1 = MenuSpecItemUniversal1::all();
        $MenuSpecItemsUni2 = MenuSpecItemUniversal2::all();

        if($id!=0){
            $prod_class_id = MenuProdClassShop::with('MenuProdClass')->where('shop_menu2_id', $id)
                                                ->first()->spec_menu_class_index;
        }else{
            $prod_class_id = 0;
        }
        
        $MenuSpecItems = MenuProdClass::with('MenuSpecItems')->where('prod_class_id', $prod_class_id)->get()
                                        ->pluck('MenuSpecItems') // 取得MenuSpecItems子集合
                                        ->flatten();
        $MenuSpecItemAll = $MenuSpecItemsUni1->concat($MenuSpecItems)
                                            ->concat($MenuSpecItemsUni2); // 連接所有集合

        $MenuSpecItems = $MenuSpecItemAll;

        return view('ProductDataManage.MenuSpecItems', compact('MenuSpecItems'));
    }

    public function getSpecExample($spec_item_name, $spec_item_no, $spec_item_lang)
    {

        if($spec_item_lang == "both"){
            $spec_item_example = MenuSpecItem::select(
                                    'spec_item_example'.$spec_item_no.'_tw',
                                    'spec_item_example'.$spec_item_no.'_en'
                                )->where('spec_item_name_form', $spec_item_name)->first();
            // echo $row['spec_item_example'.$spec_item_no.'_tw']."|".$row['spec_item_example'.$spec_item_no.'_en'];
            return $spec_item_example['spec_item_example'.$spec_item_no.'_tw'].'|'.$spec_item_example['spec_item_example'.$spec_item_no.'_en'];
        }else{
            $spec_item_example = MenuSpecItem::select(
                                    'spec_item_example'.$spec_item_no.'_'.$spec_item_lang
                                )->where('spec_item_name_form', $spec_item_name)->first();
            // echo $row['spec_item_example'.$spec_item_no.'_'.$spec_item_lang.''];
            return $spec_item_example['spec_item_example'.$spec_item_no.'_'.$spec_item_lang];
        }

        // dd($spec_item_example['spec_item_example'.$spec_item_no.'_'.$spec_item_lang]);
        
    }

    public function getSpecItemName($spec_item_name_form)
    {
        $MenuSpecItems = MenuSpecItem::select(  'spec_item_name',
                                                'spec_item_name_en',
                                                'spec_item_name_form');
        $MenuSpecItemsUni1 = MenuSpecItemUniversal1::select('spec_item_name',
                                                            'spec_item_name_en',
                                                            'spec_item_name_form');
        $MenuSpecItemsUni2 = MenuSpecItemUniversal2::select('spec_item_name',
                                                            'spec_item_name_en',
                                                            'spec_item_name_form');

        $MenuSpecItemsAll = $MenuSpecItems->unionAll($MenuSpecItemsUni1)->unionAll($MenuSpecItemsUni2);
        $MenuSpecItemsFinall = MenuSpecItem::select(  'spec_item_name')
        ->from($MenuSpecItemsAll, 'spec_item')
        ->where('spec_item_name_form', '=', $spec_item_name_form)->distinct()->get();
        return $MenuSpecItemsFinall;






    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $MainSK_NO)
    {
        $MenuSpecItemsUni1 = MenuSpecItemUniversal1::all();
        $MenuSpecItemsUni2 = MenuSpecItemUniversal2::all();

        if($id!=0){
            $prod_class_id = MenuProdClassShop::with('MenuProdClass')->where('shop_menu2_id', $id)
                                                ->first()->spec_menu_class_index;
        }else{
            $prod_class_id = 0;
        }
        
        $MenuSpecItems = MenuProdClass::with('MenuSpecItems')->where('prod_class_id', $prod_class_id)->get()
                                        ->pluck('MenuSpecItems') // 取得MenuSpecItems子集合
                                        ->flatten();
        $MenuSpecItemAll = $MenuSpecItemsUni1->concat($MenuSpecItems)
                                            ->concat($MenuSpecItemsUni2); // 連接所有集合

        $MenuSpecItems = $MenuSpecItemAll;


        if(!str_ends_with($MainSK_NO, '_temp')){
            $DataSStock =  app('App\Http\Controllers\SStockController')->show($MainSK_NO);
        }else{
            $DataSStock =  app('App\Http\Controllers\SStockTempController')->show($MainSK_NO);
        }

        $name_for_sell_tw = $DataSStock->SK_SESPES;
        $name_for_sell_en = $DataSStock->SK_SESPES;
// dd($name_for_sell_en);

        $SK_SPEC_tw = explode("\r\n", $DataSStock->getAttribute('SK_SPEC'));
        $SK_SPEC_tw_array = "";
        $SK_SPEC_tw_array_final = [];
        foreach($SK_SPEC_tw as $key => $val){
            $SK_SPEC_tw_array = explode('	', $val);//dd($SK_SPEC_tw_array);
            if(isset($SK_SPEC_tw_array[0]) && isset($SK_SPEC_tw_array[1])){
                $SK_SPEC_tw_array_final[$SK_SPEC_tw_array[0]] = $SK_SPEC_tw_array[1];
            }            
        }
        $SK_SPEC_tw = $SK_SPEC_tw_array_final?$SK_SPEC_tw_array_final:'';

// $SK_SPEC_tw = '';

        $SK_SPEC_en = explode("\r\n", $DataSStock->getAttribute('SK_ESPES'));
        $SK_SPEC_en_array = "";
        $SK_SPEC_en_array_final = [];
        foreach($SK_SPEC_en as $key => $val){
            $SK_SPEC_en_array = explode('	', $val);
            if(isset($SK_SPEC_en_array[0]) && isset($SK_SPEC_en_array[1])){
                $SK_SPEC_en_array_final[$SK_SPEC_en_array[0]] = $SK_SPEC_en_array[1];  
            }

        }
        $SK_SPEC_en = $SK_SPEC_en_array_final?$SK_SPEC_en_array_final:'';

        // $SK_SPEC_en = '';
        
        

        return view('ProductDataManage.ModelMenuSpecItems', compact('MenuSpecItems', 'SK_SPEC_tw', 'SK_SPEC_en', 
                    'name_for_sell_tw', 'name_for_sell_en'));
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
