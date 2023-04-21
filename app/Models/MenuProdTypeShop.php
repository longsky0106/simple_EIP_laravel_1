<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuProdTypeShop extends Model
{
    // use HasFactory;
    protected $connection = 'sqlsrv';
    protected $table = 'Menu_Prod_Type_shop';

    public function MenuProdClassShop()
    {
        return $this->hasMany(MenuProdClassShop::class,'shop_menu1_index','shop_menu1_id');
    }
}
