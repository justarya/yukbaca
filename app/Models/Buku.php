<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';

    //primarykey
    protected $primaryKey = 'id_buku';

    public function Peminjaman(){
        return $this->belongsTo('App\Models\Peminjaman','id_buku','id_buku');
    }
}
