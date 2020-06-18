<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $guarded = [];

    protected $hidden = ['created_at','updated_at','id_merk'];


    public function transaksiobat()
    {
        return $this->belongsTo(TransaksiObat::class, 'id_obat', 'id');
    }

    public function transaksiobats()
    {
        return $this->hasMany(TransaksiObat::class, 'id_obat', 'id');
    }

    public function merk()
    {
        return $this->belongsTo(Merk::class, 'id_merk', 'id');
    }

}
