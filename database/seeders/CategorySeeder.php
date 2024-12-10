<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Camperas',
        ]);
        Category::create([
            'name' => 'Remeras',
        ]);
        Category::create([
            'name' => 'Pantalones',
        ]);

        Category::create([
            'name' => 'Guantes',
        ]);
        Category::create([
            'name' => 'Mascaras',
        ]);

        Category::create([
            'name' => 'Fundas',
        ]);
        Category::create([
            'name' => 'Mochilas',
        ]);

        Category::create([
            'name' => 'Cascos',
        ]);
        Category::create([
            'name' => 'Cuchillos',
        ]);
        Category::create([
            'name' => 'Chalecos',
        ]);
    }
}
