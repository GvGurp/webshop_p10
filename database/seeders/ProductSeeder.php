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

        // Haal de categorieën op uit de database
        $categories = Category::all();

        foreach ($categories as $category) {
            for ($i = 0; $i < 25; $i++) {
                Product::create([
                    'name' => ucfirst($category->name) . ' ' . ($i + 1),  // Bijvoorbeeld laptop 1 (Gaby)
                    'picture' => $faker->imageUrl(640, 480, 'tech', true),  // Een willekeurige tech-afbeelding (Gaby)
                    'specifications' => $faker->sentence,  // Een korte specificatie zoals 'Battery life: 10h (Gaby)
                    'price' => $faker->randomFloat(2, 100, 2000),  // Een willekeurige prijs tussen 100 en 2000 euro met decimalen (Gaby)
                    'product_information' => $faker->paragraph,  // Een korte productbeschrijving (Gaby)
                    'category_id' => $category->id  // Koppel het product aan een van de 4 categorieËn (Gaby)
                ]);
            }
        }
    }
}
