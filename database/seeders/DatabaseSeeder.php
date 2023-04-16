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
                'nama_supplier' => 'Ahmad Wildan',
                'alamat' => 'Bondowoso',
                'no_telp' => '083848139012'
            ],

            [
                'nama_supplier' => 'Farul Ahmad Wananda',
                'alamat' => 'Bondowoso',
                'no_telp' => '083848139012'
            ],

            [
                'nama_supplier' => 'M. Rizky Ramadhani',
                'alamat' => 'Pasuruan',
                'no_telp' => '083848139012'
            ],

            [
                'nama_supplier' => 'Bahrul Ulum',
                'alamat' => 'Situbondo',
                'no_telp' => '083848139012'
            ],

            [
                'nama_supplier' => 'Zainur Roziqin',
                'alamat' => 'Situbondo',
                'no_telp' => '083848139012'
            ]
        ]);
    }
}
