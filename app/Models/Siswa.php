<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';

    //primarykey
    protected $primaryKey = 'nis';

    public function Peminjaman(){
        return $this->belongsTo('App\Models\Peminjaman','nis','nis');
    }
}
