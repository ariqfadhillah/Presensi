<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    protected $table = 'device';
    protected $fillable = ['serialnumber','location','timeZoneAdj'];

    public function rekap()
    {
    	return $this->hasMany(Rekap::class);
    }
}
