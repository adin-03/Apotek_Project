<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiObat extends Model
{
    protected $guarded = [];

    public function obat(){
        return $this->belongsTo(Obat::class, 'id_obat', 'id');
    }

    public function countTransaksi()
    {
        return $this->obat()->groupBy('id_obat')->sum('kuantitas');
    }
}
