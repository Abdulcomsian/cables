<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;
class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $catergoy1 =  Category::create([
            'name' => 'Broadband_only',
            'uuid' => (string) Str::uuid(),

        ]);

        $catergoy12 =  Category::create([
            'name' => 'TV_broad',
            'uuid' => (string) Str::uuid(),
        ]);
        $catergoy3 =  Category::create([
            'name' => 'Packages',
            'uuid' => (string) Str::uuid(),
        ]);
        $catergoy4 =  Category::create([
            'name' => 'Television_only',
            'uuid' => (string) Str::uuid(),
        ]);
        $catergoy5 =  Category::create([
            'name' => 'Broadband_calls',
            'uuid' => (string) Str::uuid(),
        ]);
        

    }
}
