<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SStockFD;
use Throwable;

class SStockFDController extends Controller
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
        $SStockFD = SStockFD::create(array_merge($input
                                                        ,[
                                                            'fd_skno' => $input['create_Model'].'_temp'
                                                            ,'fd_lang' => '網路平台'
                                                            ,'fd_name' => $input['name_for_sell_tw']
                                                            ,'fd_spes' => ''
                                                       ]));
        if($SStockFD){
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
        $fd_name = SStockFD::select('fd_name')->where('fd_skno', $id)->get();
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
