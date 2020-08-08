<?php

use Illuminate\Database\Seeder;
use App\Admin;
use App\Apotek;
use App\Kasir;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Admin::create([
//            'nama' => 'Administrator',
//            'email' => 'admin@mail.com',
//            'password' => bcrypt(12345678)
//        ]);

       $apotek = Apotek::create([
            'nama' => 'Apotek Cemara',
            'email' => 'apotekcemara@mail.com',
            'password' => bcrypt(12345678)
        ]);

        Kasir::create([
            'nama' => 'Dahlia W',
            'email' => 'dahliaw@mail.com',
            'password' => bcrypt(12345678),
            'no_hp' => '085642781288',
            'alamat' => 'Jl Srikandi Desa Kedokan sayang kab Tegal',
            'id_apotek' => $apotek->id
        ]);
    }
}
