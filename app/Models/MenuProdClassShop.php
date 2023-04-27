<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuProdClassShop extends Model
{
    // use HasFactory;
    protected $connection = 'sqlsrv';
    protected $table = 'Menu_Prod_Class_shop';
    protected $primaryKey = 'shop_menu2_id';

    public function MenuProdClass() {
        return $this->hasOne(MenuProdClass::class,'prod_class_id', 'spec_menu_class_index'); //合併的模型中的外鍵名稱 (對到MenuSpecItems的id)
    }
}
