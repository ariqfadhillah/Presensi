<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Rekap extends Model
{
    protected $table = 'device';
    protected $fillable = ['serialnumber','location','timeZoneAdj'];
    
}