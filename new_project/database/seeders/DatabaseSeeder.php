<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
 public function run(): void
{
    $this->call([
        FilmsSeeder::class,
        ActeursSeeder::class,
        ParticipationsSeeder::class,
        AnnonceSeeder::class,
    ]);
}
}