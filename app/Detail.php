<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $table = 'temp_inout';
    protected $fillable = ['deviceSN','pin','time','status','verify'];
}
