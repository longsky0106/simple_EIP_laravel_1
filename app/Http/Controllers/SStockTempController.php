<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SStockTemp;
use GuzzleHttp\Promise\Create;
use Throwable;

class SStockTempController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $input = $request->input();
        $SK_NO4 = $input['SK_NO4'];

        $SStockTemp = new SStockTemp();
        $check_temp_model_extis = $this->show($SK_NO4)->count();
        // 如果沒有建立料號
        if(!$check_temp_model_extis){

            $SStockTemp = SStockTemp::create(array_merge($input,
                                                        [
                                                            'SK_NO' => $SK_NO4
                                                        ]));
                                            
            if(isset($SStockTemp)){
                echo "建立料號成功<br>";
                // dd($DataProdReference);
            }else{
                echo "建立料號失敗<br>";
                // dd($DataProdReference);
            }
        }else{
            echo "臨時料號已存在...<br>";
        }
        // "寫入資料到現有臨時料號...<br>";
        $this->update($request, $SK_NO4);
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
    public function show($id)
    {
        $tempModel = SStockTemp::select('SK_NO')->where('SK_NO', $id)->get();
        return $tempModel;
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
        $input = $request->input();
        $SK_SPEC_tw = '';
        $SK_SPEC_en = '';

        foreach($input as $key => $value){
            if($value){

                // 中文規格
                if(!strpos($key,'_en'))
                {
                    $SpecItemName = app('App\Http\Controllers\MenuSpecItemController')->getSpecItemName($key);
                
                    // 將中文規格每一行排成: 規格標題 全形空格 規格內容
                    if($SpecItemName->count() > 0){
                        $SpecItemName = $SpecItemName[0]['spec_item_name'];
                        $SK_SPEC_tw .=  $SpecItemName."	".$value."\r\n";
                    }
                    
                }
                else if(strpos($key,'_en') && !str_starts_with($key,'SK_') && !str_starts_with($key,'name_for_sell'))
                {
                    // 將英文規格每一行排成: 規格標題 全形空格 規格內容
                    $key = str_replace('_en','',$key);
                    $key = str_replace('_',' ',$key);
                    $key = str_replace('Max ','Max. ',$key);
                    $SK_SPEC_en .= $key."	".$value."\r\n";
                }

            }

        }
        echo nl2br(str_replace('	','&emsp;',$SK_SPEC_tw))."<br>";
        echo nl2br(str_replace('	','&emsp;',$SK_SPEC_en));
        echo "<br>";

        $SK_SPEC = $SK_SPEC_tw;
        $SK_ESPES = $SK_SPEC_en;

        if(!empty($input['zh-tw_description'].$input['zh-tw_features'].$input['en-us_description'].$input['en-us_features'])){
            $SK_SMNETS = $input['zh-tw_description']
                        .(($input['zh-tw_description'] == "")?"":"\r\n")."---Features---\r\n"
                        .$input['zh-tw_features']
                        .(($input['zh-tw_features'] == "")?"":"\r\n")."---DESCRIPTION---\r\n"
                        .$input['en-us_description']
                        .(($input['en-us_description'] == "")?"":"\r\n")."---Features---\r\n"
                        .$input['en-us_features'];
        }else{
            $SK_SMNETS = '';
        }
        echo nl2br(str_replace('	','&emsp;',$SK_SMNETS))."<br>";


        echo "寫入".$id."資料到現有臨時料號...<br>";
        try {
            $SStockTemp = SStockTemp::find($id)->update([
                                                            'SK_SPEC' => $SK_SPEC,
                                                            'SK_COLOR' => $input['Color'],
                                                            'SK_USE' => $input['categories_text'],
                                                            'SK_LOCATE' => $input['ProdType_text'],
                                                            'SK_SESPES' => $input['name_for_sell_en'],
                                                            'SK_ESPES' => $SK_ESPES,
                                                            'SK_SMNETS' => $SK_SMNETS,
                                                        ]);
        } catch (Throwable $e) {
            print "Error: ".$e->getMessage;
        }
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
