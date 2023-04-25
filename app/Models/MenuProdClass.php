<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuProdClass extends Model
{
    // use HasFactory;
    protected $connection = 'sqlsrv';
    protected $table = 'Menu_Prod_Class';
    protected $primaryKey = 'prod_class_id';

    public function MenuSpecItems() {
        return $this->belongsToMany(MenuSpecItem::class, //對應目標
                                    'Menu_Spec_Link', //聯合併的資料表名稱
                                    'MPC', //關聯中的模型的外鍵名稱 (對到MenuProdClass的id)
                                    'MSI') //合併的模型中的外鍵名稱 (對到MenuSpecItems的id)
        ->withPivot('MSI')
        ->using(TypeClassItemPivot::class);
    }    
}
