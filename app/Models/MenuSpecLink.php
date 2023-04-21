<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuSpecLink extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'Menu_Spec_Link';
    protected $primaryKey = 'spec_link_id';
}
