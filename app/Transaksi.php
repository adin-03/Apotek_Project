<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $guarded = [];

    public function obats()
    {
        return $this->hasMany(TransaksiObat::class, 'id_transaksi', 'id');
    }

    public function kasir()
    {
        return $this->belongsTo(Kasir::class, 'id_kasir', 'id');
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan', 'id');
    }
}
