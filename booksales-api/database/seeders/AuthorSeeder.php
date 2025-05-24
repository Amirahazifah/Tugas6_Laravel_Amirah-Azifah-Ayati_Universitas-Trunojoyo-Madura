<?php

namespace Database\Seeders;

use App\Models\AuthorsModel;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        $authors = [
            [
                'name' => 'Andrea Hirata',
                'photo' => 'andrea.jpg',
                'bio' => 'Dikenal luas melalui novel "Laskar Pelangi", fokus pada pendidikan dan kehidupan desa.'
            ],
            [
                'name' => 'Tere Liye',
                'photo' => 'tere.jpg',
                'bio' => 'Penulis terkenal asal Indonesia dengan genre fiksi dan motivasi.'
            ],
            [
                'name' => 'Dewi Lestari',
                'photo' => 'dewi lestari.jpg',
                'bio' => 'Penulis dan musisi, terkenal dengan serial "Supernova" yang bernuansa filosofis dan spiritual.'
            ],
            [
                'name' => 'Habiburrahman El Shirazy',
                'photo' => 'habib.jpg',
                'bio' => 'Penulis novel religi populer seperti "Ayat-Ayat Cinta" yang diangkat ke layar lebar.'
            ],
            [
                'name' => 'Sapardi Djoko Damono',
                'photo' => 'sapardi.jpg',
                'bio' => 'Sastrawan dan penyair legendaris Indonesia, dikenal dengan puisi romantis dan reflektif.'
            ],
            [
                'name' => 'Pidi Baiq',
                'photo' => 'pidi.jpg',
                'bio' => 'Penulis nyentrik yang menciptakan karya humor dan populer, termasuk "Dilan 1990".'
            ]
        ];

        foreach ($authors as $author) {
            AuthorsModel::create($author);
        }
    }
}
