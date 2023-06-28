<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SStockFDTemp;
use Throwable;

class SStockFDTempController extends Controller
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
        $input = $request->input();
        $SStockFDTemp = SStockFDTemp::create(array_merge($input
                                                        ,[
                                                            'fd_skno' => $input['create_Model'].'_temp'
                                                            ,'fd_lang' => '網路平台'
                                                            ,'fd_name' => $input['name_for_sell_tw']
                                                            ,'fd_spes' => ''
                                                       ]));
        if($SStockFDTemp){
            echo "儲存產品銷售用名稱成功<br>";
        }else{
            echo "儲存產品銷售用名稱失敗<br>";
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
        $fd_name = SStockFDTemp::select('fd_name')->where('fd_skno', $id)->get();
        return $fd_name;
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
        try {
            $SStockFDTemp = SStockFDTemp::find($id)->update(['fd_name' => $input['name_for_sell_tw']]);
                                                        // dd($SStockFDTemp);//true
                                                        echo "儲存產品銷售用名稱完成<br>";
            
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
