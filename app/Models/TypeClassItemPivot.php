<?php

// namespace App;
namespace App\Models;
use Illuminate\Database\Eloquent\Relations\Pivot;

class TypeClassItemPivot extends Pivot
{
    protected $connection = 'sqlsrv';
    protected $table = 'Menu_Spec_Link';
    protected $primaryKey = 'spec_link_id';
    protected $fillable =   [
        'MST',
        'MPT',
        'MPC',
        'MSI',
        'Spec_Rem'
    ];

    public function MenuSpecItem() {
        return $this->belongsTo(MenuSpecItem::class,'MSI','spec_item_id');
    }
}
