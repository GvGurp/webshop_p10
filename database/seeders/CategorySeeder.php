<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder; 
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // Truncate the table to remove any existing data
        Category::truncate();  // Clears the table before seeding

        // Define the categories you want to seed
        $categories = ['laptop', 'tablet', 'telefoon', 'pc'];

        // Insert each category into the database
        foreach ($categories as $category) {
            Category::create([
                'name' => $category
            ]);
        }
    }
}
