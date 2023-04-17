<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuProdTypeShop extends Model
{
    // use HasFactory;
    protected $connection = 'sqlsrv';
    protected $table = 'Menu_Prod_Type_shop';
    protected $fillable =   [
                                'shop_menu1_name',
                                'shop_menu1_rem',
                                'pct_menu1_id'
                            ];
}
