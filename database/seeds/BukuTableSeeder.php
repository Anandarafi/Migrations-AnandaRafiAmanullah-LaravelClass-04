<?php

use Illuminate\Database\Seeder;

class BukuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Buku::insert([ 
        [
            'judul'    => 'ThingSpeak',
            'penerbit'          => 'Alex',
            'pengarang'            => 'SupriyadiMedia',
            'foto'        => 'thing.jpg',
            'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
          ],
          [
              'judul'    => 'Hello Gaes',
              'penerbit'          => 'Supriyadi',
              'pengarang'            => 'AlexMedia',
              'foto'        => 'hello.jpg',
              'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'judul'    => 'The Hell',
                'penerbit'          => 'Bambang',
                'pengarang'            => 'TokoMedia',
                'foto'        => 'hell.jpg',
                'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
              ],
              [
                'judul'    => 'A6 ',
                'penerbit'          => 'Asshiap',
                'pengarang'            => 'AhhaBledeg',
                'foto'        => 'A6.jpg',
                'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
              ],
              [
                'judul'    => 'Asus Gaming Nvidia',
                'penerbit'          => 'School',
                'pengarang'            => 'GamingMedia',
                'foto'        => 'asus.jpg',
                'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
              ],

      ]);
    }
}
