<?php

namespace Database\Seeders;

use App\Models\Annonce;
use Illuminate\Database\Seeder;

class AnnonceSeeder extends Seeder
{
    public function run(): void
    {
        $annonces = [
            [
                'titre' => 'Bel appartement centre-ville',
                'description' => 'Spacieux appartement de 3 pièces situé au cœur de la ville. Entièrement rénové avec cuisine équipée et balcon.',
                'type' => 'Appartement',
                'ville' => 'Casablanca',
                'superficie' => 85.5,
                'neuf' => false,
                'prix' => 450000.00,
                'photo' => null,
            ],
            [
                'titre' => 'Villa moderne avec piscine',
                'description' => 'Superbe villa de 5 pièces avec piscine privée, jardin paysager et garage. Situation calme proche des écoles.',
                'type' => 'Villa',
                'ville' => 'Marrakech',
                'superficie' => 350.0,
                'neuf' => true,
                'prix' => 2800000.00,
                'photo' => null,
            ],
            [
                'titre' => 'Maison familiale suburbaine',
                'description' => 'Maison de 4 chambres avec grand jardin, idéale pour famille. Proche des transports et commodités.',
                'type' => 'Maison',
                'ville' => 'Rabat',
                'superficie' => 180.0,
                'neuf' => false,
                'prix' => 1200000.00,
                'photo' => null,
            ],
            [
                'titre' => 'Terrain constructible vue mer',
                'description' => 'Parcelle de terrain constructible de 1000m² avec vue sur mer. Toutes viabilités disponibles.',
                'type' => 'Terrain',
                'ville' => 'Agadir',
                'superficie' => 1000.0,
                'neuf' => true,
                'prix' => 850000.00,
                'photo' => null,
            ],
            [
                'titre' => 'Magasin commercial centre commercial',
                'description' => 'Local commercial de 50m² situé dans un centre commercial fréquenté. Bonne visibilité et parking.',
                'type' => 'Magasin',
                'ville' => 'Casablanca',
                'superficie' => 50.0,
                'neuf' => true,
                'prix' => 750000.00,
                'photo' => null,
            ],
            [
                'titre' => 'Appartement luxe Marina',
                'description' => 'Magnifique appartement de prestige à la Marina avec terrasse panoramique. Finitions haut de gamme.',
                'type' => 'Appartement',
                'ville' => 'Casablanca',
                'superficie' => 120.0,
                'neuf' => true,
                'prix' => 1850000.00,
                'photo' => null,
            ],
        ];

        foreach ($annonces as $annonce) {
            Annonce::create($annonce);
        }
    }
}
