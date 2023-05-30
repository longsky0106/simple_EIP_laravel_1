<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SStockTemp extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'SSTOCK_temp';
    protected $primaryKey = 'SK_NO';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable =   [
        'SK_NO',
        'SK_NAME',
        'SK_SPEC',
        'SK_COLOR',
        'SK_SIZE',
        'SK_USE',
        'SK_LOCATE',
        'SK_NOWQTY',
        'SK_REM',
        'SK_SESPES',
        'SK_CSPES',
        'SK_ESPES',
        'SK_SMNETS'
    ];
}
