<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Karyawan extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function telepon(){
        return $this->hasOne(Telepon::class,'karyawan_id','id');
    }
    public function jabatan(){
        return $this->belongsTo(Jabatan::class,'jabatan_id','id');
    }
}
