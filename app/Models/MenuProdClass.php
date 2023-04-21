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
        return $this->belongsToMany(MenuSpecItem::class, 'Menu_Spec_Link', 'MPC', 'MSI')
        ->withPivot('MSI')
        ->using(TypeClassItemPivot::class);
    }    
}
