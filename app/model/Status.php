<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $guarded = [];
    public function karyawan(){
        return $this->hasMany(Karyawan::class,'status_id','id');
    }
}
