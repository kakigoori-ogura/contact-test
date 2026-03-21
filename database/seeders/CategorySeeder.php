<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Category::create(['content' => '商品のお届けについて']);

        \App\Models\Category::create(['content' => '商品の交換について']);

        \App\Models\Category::create(['content' => '商品トラブル']);

        \App\Models\Category::create(['content' => 'ショップへのお問い合せ']);

        \App\Models\Category::create(['content' => 'その他']);
    }
}
