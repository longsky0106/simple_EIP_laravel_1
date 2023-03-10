<?php

namespace App\Http\Controllers;

use App\Models\DataProdReferenceModel;
use Illuminate\Http\Request;

class DataProdReferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search_text = "U";
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
        ->leftJoin('SSTOCK', 'SK_NO1', '=', 'SK_NO')
        ->leftJoin('SSTOCK_temp', 'SK_NO4', '=', 'SSTOCK_temp.SK_NO')
        ->leftJoin('SSTOCKFD', 'SK_NO1', '=', 'fd_skno')
        ->leftJoin('SSTOCKFD_temp', 'SK_NO4', '=', 'SSTOCKFD_temp.fd_skno')
        ->leftJoinSub(
            DataProdReferenceModel::select('*')->from('View_SPHNowQtyByWare')->where('WD_WARE', '=', 'A'), 
            'QTY', 'SK_NO1', '=', 'WD_SKNO'
        )
        ->where(function ($query) use($search_column,$search_text) {
            for ($i = 0; $i < count($search_column); $i++){
               $query->orwhere($search_column[$i], 'LIKE',  '%'.$search_text.'%');
            }      
        })
        ->orWhere(function ($query) use($search_column2,$search_text) {
            for ($i = 0; $i < count($search_column2); $i++){
               $query->orwhere($search_column2[$i], 'LIKE',  '%'.$search_text.'%');
            }      
        })
        ->limit(1000)
        ->get()
        ->sortBy('Model');

        // return view('DataProdReference.index')->withDataProdReference(DataProdReferenceModel::all());
        return view('DataProdReference.index')->with('DataProdsReference',$DataProdsReference);
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
        //
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
