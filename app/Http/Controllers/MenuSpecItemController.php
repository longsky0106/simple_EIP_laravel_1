<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuProdClass;
use App\Models\MenuSpecItemUniversal1;
use App\Models\MenuSpecItemUniversal2;
use App\Models\TypeClassItemPivot;

class MenuSpecItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        
        
        	// 取得產品資料 顏色 規格
	// $sql2 = "SELECT SK_NO, SK_NAME, SK_NOWQTY, SK_SPEC, SK_UNIT, SK_COLOR, SK_SIZE, SK_SESPES, SK_ESPES, SK_REM, SK_SMNETS, BD_DSKNO, BM_USKNO, SK_USE, SK_LOCATE, fd_name
    // FROM (
    // SELECT DISTINCT ".$ly_sql_db_table.".SK_NO, ".$ly_sql_db_table.".SK_NAME, SK_NOWQTY, CONVERT(NVARCHAR(MAX),SK_SPEC) AS 'SK_SPEC', SK_UNIT, SK_COLOR, SK_SIZE, SK_SESPES, CONVERT(VARCHAR(MAX),SK_ESPES) AS 'SK_ESPES', CONVERT(NVARCHAR(MAX),SK_REM) AS 'SK_REM', CONVERT(NVARCHAR(MAX),SK_SMNETS) AS 'SK_SMNETS', BD_DSKNO, BM_USKNO, SK_USE, SK_LOCATE, fd_name
    // , ROW_NUMBER ( ) OVER ( PARTITION BY ".$ly_sql_db_table.".SK_NO order by ".$ly_sql_db_table.".SK_NO DESC) as rn
    // FROM ".$ly_sql_db_table."
    // LEFT JOIN ".$dbname.".dbo.BOMDT on ".$ly_sql_db_table.".SK_NO = ".$dbname.".dbo.BOMDT.BD_USKNO
    // LEFT JOIN ".$ly_sql_db_table_FD." on ".$ly_sql_db_table.".SK_NO = ".$ly_sql_db_table_FD.".fd_skno
    // LEFT JOIN (
    //     SELECT BM_USKNO,SK_NO
    //     FROM ".$dbname.".dbo.BOM
    //     LEFT JOIN ".$dbname.".dbo.BOMDT ON ( BOM.BM_USKNO = BOMDT.BD_USKNO )
    //     INNER JOIN ".$ly_sql_db_table." on (".$ly_sql_db_table.".sk_no=BOMDT.BD_DSKNO )
    // ) BOMUSE on ".$ly_sql_db_table.".SK_NO = BOMUSE.SK_NO
    // ) AS SKM
    // WHERE rn = 1 and SK_NO =:SK_NO";
        
        
        
        
/*       [spec_item_id]
      ,[spec_item_name]
      ,[spec_item_name_en]
      ,[spec_item_name_form]
      ,[spec_item_comment]
      ,[spec_item_example1_tw]
      ,[spec_item_example2_tw]
      ,[spec_item_example3_tw]
      ,[spec_item_example1_en]
      ,[spec_item_example2_en]
      ,[spec_item_example3_en]   */  
        
        
        
        
        
    $MenuSpecItemAll = collect();
        
        $MenuSpecItemsUni1 = MenuSpecItemUniversal1::all();
        $MenuSpecItemsUni2 = MenuSpecItemUniversal2::all();
        $MenuSpecItems = MenuProdClass::with('MenuSpecItems')->where('prod_class_id', $id)->get()
                                        ->pluck('MenuSpecItems') // 取得MenuSpecItems子集合
                                        ->flatten();
        $MenuSpecItemAll = $MenuSpecItemsUni1->concat($MenuSpecItems)
                                            ->concat($MenuSpecItemsUni2); // 連接所有集合

        $MenuSpecItems = $MenuSpecItemAll;

        return view('ProductDataManage.MenuSpecItems', compact('MenuSpecItems'));
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
