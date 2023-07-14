<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SStock;
use Throwable;

class SStockController extends Controller
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
    public function show($id)
    {
        $SStock = SStock::select(
                                'SK_NO'
                                , 'SK_NAME'
                                , 'SK_SPEC'
                                , 'SK_COLOR'
                                , 'SK_SIZE'
                                , 'SK_USE'
                                , 'SK_LOCATE'
                                , 'SK_SESPES'
                                , 'SK_ESPES'
                                , 'SK_REM'
                                , 'SK_SMNETS'
                            )->where('SK_NO', $id)->first();
        return $SStock;
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
    public function update(Request $request, $SK_NO)
    {
        $input = $request->input();
        $SK_SPEC_tw = '';
        $SK_SPEC_en = '';

        foreach($input as $key => $value){
            if($value){

                // 中文規格
                if(!strpos($key,'_en'))
                {
                    // 查詢中文規格名稱
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

        $SK_SPEC = rtrim($SK_SPEC_tw);
        $SK_ESPES = rtrim($SK_SPEC_en);

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

        echo "寫入規格資料到".$SK_NO."現有料號...<br>";
        try {
            $SStock = SStock::where('SK_NO', $SK_NO)->update([
                                                    'SK_SPEC' => $SK_SPEC,
                                                    'SK_COLOR' => $input['Color'],
                                                    'SK_USE' => $input['categories_text'],
                                                    'SK_LOCATE' => $input['ProdType_text'],
                                                    'SK_SESPES' => $input['name_for_sell_en'],
                                                    'SK_ESPES' => $SK_ESPES,
                                                    'SK_SMNETS' => $SK_SMNETS,
                                                ]);

            echo "寫入規格資料完成<br>";
            
        } catch (Throwable $e) {
            print "Error: ".$e->getMessage();
            return ;
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
