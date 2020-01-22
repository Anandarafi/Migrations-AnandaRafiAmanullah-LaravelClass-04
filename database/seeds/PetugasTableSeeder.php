<?php

use Illuminate\Database\Seeder;

class PetugasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::insert([
              [
                'nama_petugas'    => 'Faseh',
                'alamat'          => 'Kediri',
                'telp'            => '082231954774',
                'username'        => 'faseh1',
                'password'        => 'wolffire1',
                'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
              ],
              [
                  'nama_petugas'    => 'Juri',
                  'alamat'          => 'Malang',
                  'telp'            => '08123456789',
                  'username'        => 'juri1',
                  'password'        => 'wolffire1',
                  'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
                ],
                [
                    'nama_petugas'    => 'Bayu',
                    'alamat'          => 'Bekasi',
                    'telp'            => '08123456789',
                    'username'        => 'bayu1',
                    'password'        => 'wolffire1',
                    'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
                  ],

        ]);
    }
}
