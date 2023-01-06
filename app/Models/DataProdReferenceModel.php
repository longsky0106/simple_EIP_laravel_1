<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataProdReferenceModel extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'Data_Prod_Reference';
    protected $fillable =   [
                                'Model',
                                'SK_NO1'
                            ];
    //$timestamps = false;
}
