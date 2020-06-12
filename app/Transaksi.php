<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $guarded = [];

    public function transaksiobats()
    {
        return $this->hasMany(TransaksiObat::class, 'id_transaksi', 'id');
    }
}
