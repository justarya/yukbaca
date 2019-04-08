<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman_buku';

    //primarykey
    protected $primaryKey = 'id_peminjaman';

    public function buku(){
        return $this->hasOne('App\Models\Buku','id_buku','id_buku');
    }
    public function siswa(){
        return $this->hasOne('App\Models\Siswa','nis','nis');
    }
}
