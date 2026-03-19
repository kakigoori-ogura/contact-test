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
        \App\Models\Category::create(['content' => 'ご意見']);

        \App\Models\Category::create(['content' => 'ご質問']);

        \App\Models\Category::create(['content' => 'その他']);
    }
}
