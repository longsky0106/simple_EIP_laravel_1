<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataProdReferenceModel extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'Data_Prod_Reference';
    public $timestamps = false;
    protected $fillable =   [
                                'Model',
                                'SK_NO1',
                                'SK_NO2',
                                'SK_NO3',
                                'SK_NO4',
                                'HDMI',
                                'DisplayPort',
                                'DVI',
                                'VGA',
                                'USB-C(Data)',
                                'USB-A',
                                'RJ45',
                                'SD Slot',
                                'Micro SD Slot',
                                'Audio',
                                'Audio(TRRS)',
                                'BC 1.2',
                                'USB-C(5V/1.5A)',
                                'PD',
                                'Price',
                                'Suggested Price',
                                'Cost Price',
                                'Main_Product',
                                'Mark1',
                                'Mark2'
                            ];
    //$timestamps = false;
}
