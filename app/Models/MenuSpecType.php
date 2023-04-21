<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class MenuSpecType extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'Menu_Spec_Type';
    protected $primaryKey = 'spec_type_id';

    public function MenuSpecItems() {
        return $this->belongsToMany(MenuSpecItem::class, 'Menu_Spec_Link', 'MST', 'MSI')
        ->withPivot('MSI')
        ->using(TypeClassItemPivot::class);
    }


}
