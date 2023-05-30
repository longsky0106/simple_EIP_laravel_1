<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SStockTemp;
use GuzzleHttp\Promise\Create;

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
        $SK_NO4 = $input['SK_NO4'];

        $SStockTemp = new SStockTemp();
        $check_temp_model_extis = $this->show($SK_NO4)->count();
        // 如果沒有建立料號
        if($check_temp_model_extis){
            $SStockTemp->SK_NO = $SK_NO4;
        }
        

        // 否則只存其他欄位

        $SStockTemp->save();

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
