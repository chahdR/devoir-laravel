<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class FilmsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('films')->insert([
            [
                'titre' => 'Inception',
                'pays' => 'USA',
                'annee' => 2010,
                'duree' => '02:28:00',
                'genre' => 'Science-fiction'
            ],
            [
                'titre' => 'Gladiator',
                'pays' => 'USA',
                'annee' => 2000,
                'duree' => '02:35:00',
                'genre' => 'Historique'
            ]
        ]);
    }
}