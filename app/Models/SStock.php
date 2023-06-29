<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SStock extends Model
{
    protected $connection = 'sqlsrv_ly';
    // protected $connection = 'sqlsrv';
    protected $table = 'SSTOCK';
    protected $primaryKey = 'SK_NO';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable =   [
        'SK_SPEC',
        'SK_COLOR',
        'SK_SIZE',
        'SK_USE',
        'SK_LOCATE',
        'SK_REM',
        'SK_SESPES',
        // 'SK_CSPES',
        'SK_ESPES',
        'SK_SMNETS'
    ];
}
