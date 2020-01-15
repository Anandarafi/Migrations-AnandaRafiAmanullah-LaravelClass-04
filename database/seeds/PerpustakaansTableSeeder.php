<?php

use Illuminate\Database\Seeder;

class PerpustakaansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Anggota::insert([
            [
              'nama_anggota'    => 'Supriyadi',
              'alamat'          => 'Malang',
              'telp'            => '08123456789',
              'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_anggota'    => 'Bambang',
                'alamat'          => 'Kediri',
                'telp'            => '081234567888',
                'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
              ],
              [
                'nama_anggota'    => 'ALex',
                'alamat'          => 'Surabaya',
                'telp'            => '0812415123161551',
                'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
              ],

        ]);

    }
}
