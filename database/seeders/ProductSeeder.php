<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->truncate(); // optional, clears old data

        $products = [
            ['T-shirt One Piece', 3500, 'M', 'Noir'],
            ['Sweat Naruto', 4900, 'L', 'Rouge'],
            ['Veste Attack on Titan', 7200, 'XL', 'Vert'],
            ['Casquette Tokyo Revengers', 1800, 'Taille Unique', 'Noir'],
            ['Hoodie Luffy Gear 5', 5600, 'L', 'Blanc'],
            ['T-shirt Demon Slayer', 3300, 'M', 'Vert'],
            ['Pull Gojo Satoru', 5800, 'XL', 'Bleu'],
            ['Hoodie Hunter x Hunter', 5100, 'L', 'Gris'],
            ['Sweat One Piece Crew', 4700, 'M', 'Bleu'],
            ['T-shirt Goku Ultra Instinct', 3900, 'L', 'Blanc'],
        ];

        foreach ($products as [$name, $price, $taille, $color]) {
            DB::table('products')->insert([
                'name' => $name,
                'price' => $price,
                'taille' => $taille,
                'color' => $color,
                'photo' => 'default.png',
                'video' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

