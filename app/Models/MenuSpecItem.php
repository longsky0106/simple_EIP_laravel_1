<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuSpecItem extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'Menu_Spec_Item';
    protected $primaryKey = 'spec_item_id';
    protected $fillable =   [
        'spec_item_id',
        'spec_item_name',
        'spec_item_name_en'
    ];
}
