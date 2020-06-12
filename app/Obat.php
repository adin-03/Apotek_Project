<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $guarded = [];


    public function transaksiobat()
    {
        return $this->belongsTo(TransaksiObat::class, 'id_obat', 'id');
    }

    public function transaksiobats()
    {
        return $this->hasMany(TransaksiObat::class, 'id_obat', 'id');
    }




}
