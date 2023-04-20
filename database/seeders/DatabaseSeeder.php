<?php

namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use app\Models\Supplier;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
      
        DB::table('supplier')->insert([
            [
                'nama_supplier' => 'PT. Makmur Jaya',
                'alamat' => 'Bondowoso',
                'no_telp' => '082887186352'
            ],
            [
                'nama_supplier' => 'PT. Mandala Cross',
                'alamat' => 'Jakarta',
                'no_telp' => '083848139012'
            ],
            [
                'nama_supplier' => 'PT. Utama Raya',
                'alamat' => 'Pasuruan',
                'no_telp' => '087662516253'
            ]
        ]);

        DB::table('barang')->insert([
            [
                'nama_barang' => 'Motor Cross Mini',
                'stok' => '0'
            ],
            [
                'nama_barang' => 'Motor Cross Listrik',
                'stok' => '0'
            ],
            [
                'nama_barang' => 'Motor Cross Sakti',
                'stok' => '0'
            ]
        ]);
    }
}
