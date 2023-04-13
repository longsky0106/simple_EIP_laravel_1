<?php

namespace App\Http\Controllers;

use App\Models\DataProdReferenceModel;
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
        return view('ProductDataManage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = request('zh-tw_description');
        dd(($input));

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
