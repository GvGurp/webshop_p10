<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Specifieke afbeeldingen per categorie (Gaby)
        $categoryImages = [
            'laptop' => 'foto\'s/laptop.png',
            'telefoon' => 'foto\'s/telefoon.png',
            'tablet' => 'foto\'s/tablet.png',
            'pc' => 'foto\'s/pc.png',
        ];

        // Pak alle categorieën die bestaan (Gaby)
        $categories = Category::all();
        
        // Array om alle producten in op te slaan (Gaby)
        $products = [];
        
        foreach ($categories as $category) {
            // Haal de juiste afbeelding op voor de huidige categorie (Gaby)
            $categoryName = strtolower($category->name); // Zorg dat de naam lowercase is voor consistentie (Gaby)
            $imagePath = $categoryImages[$categoryName] ?? $faker->imageUrl(640, 480, 'tech', true); // (Gaby)

            for ($i = 0; $i < 100; $i++) {
                $products[] = [
                    'name' => ucfirst($category->name) . ' ' . ($i + 1),  // Bijvoorbeeld laptop 1 (Gaby)
                    'picture' => $imagePath,  // Specifieke afbeelding voor de categorie (Gaby)
                    'specifications' => $faker->sentence,  // Een korte specificatie (Gaby)
                    'price' => $faker->randomFloat(2, 100, 2000),  // Een prijs tussen 100 en 2000 euro (Gaby)
                    'productInformation' => $faker->paragraph,  // Een korte productbeschrijving (Gaby)
                    'category_id' => $category->id,  // Koppel het product aan de categorie (Gaby)
                    'created_at' => now(),  // Timestamp voor aanmaakdatum (Gaby)
                    'updated_at' => now(),  // Timestamp voor bewerkingsdatum (Gaby)
                ];
            }
        }
        
        // Willekeurig sorteren (Gaby)
        shuffle($products);
        
        // Voeg alle producten in één keer toe aan de database (Gaby)
        Product::insert($products);
    }
}
