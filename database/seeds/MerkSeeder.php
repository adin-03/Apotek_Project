<?php

use App\Merk;
use Illuminate\Database\Seeder;

class MerkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $merk = ['Kimia Farma', 'Graha Farma', 'Tawon Jaya', 'Konimex'];

        for ($i=0; $i < count($merk); $i++) { 
            Merk::create([
                'merk' => $merk[$i],
            ]);
        }
    }
}
