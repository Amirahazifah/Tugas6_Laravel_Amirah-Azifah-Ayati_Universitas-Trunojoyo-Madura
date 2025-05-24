<?php

namespace Database\Seeders;

use App\Models\GenreModel;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    public function run(): void
    {
        $genres = [
            [
                'name' => 'Fiksi',
                'description' => 'Cerita rekaan yang mengandung unsur imajinatif, tidak sepenuhnya berdasarkan fakta.'
            ],
            [
                'name' => 'Biografi',
                'description' => 'Kisah nyata tentang kehidupan seseorang yang ditulis secara naratif.'
            ],
            [
                'name' => 'Puisi',
                'description' => 'Karya sastra dengan gaya bahasa yang indah dan penuh makna emosional.'
            ],
            [
                'name' => 'Sejarah',
                'description' => 'Buku yang membahas kejadian-kejadian penting di masa lalu.'
            ],
            [
                'name' => 'Sains',
                'description' => 'Genre yang berisi teori, eksperimen, dan pengetahuan ilmiah.'
            ],
            [
                'name' => 'Romansa',
                'description' => 'Cerita yang berfokus pada hubungan cinta antar tokoh.'
            ],
        ];

        foreach ($genres as $genre) {
            GenreModel::create($genre);
        }
    }

}