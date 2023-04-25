<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuSpecItemUniversal1 extends Model
{
    // use HasFactory;
    protected $connection = 'sqlsrv';
    protected $table = 'Menu_Spec_Item_Universal_1';
    protected $primaryKey = 'spec_item_id';
    protected $fillable =   [
        'spec_item_name',
        'spec_item_name_en',
        'spec_item_name_form',
        'spec_item_ren'
    ];
}
