<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SStockFD extends Model
{
    protected $connection = 'sqlsrv_ly';
    // protected $connection = 'sqlsrv';
    protected $table = 'SSTOCKFD';
    protected $primaryKey = 'fd_skno';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable =   [
        'fd_skno'
        ,'fd_lang'
        ,'fd_name'
        ,'fd_spes'
    ];
}
