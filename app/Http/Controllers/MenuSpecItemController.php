<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuProdClass;
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
