<?php

use Illuminate\Database\Seeder;

class RecipesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // clear table
        DB::Table('recipes')->truncate();

        $recipes = [
            [
                'name' => 'レシピ1',
                'cookingtime' => 10,
                'description' => 'レシピ1の説明です',
                'is_comment_allowed' => 1,
            ],
            [
                'name' => 'レシピ2',
                'cookingtime' => 20,
                'description' => 'レシピ1の説明です',
                'is_comment_allowed' => 0,
            ],
            [
                'name' => 'レシピ3',
                'cookingtime' => 30,
                'description' => 'レシピ1の説明です',
                'is_comment_allowed' => 1,
            ],
            [
                'name' => 'レシピ4',
                'cookingtime' => 40,
                'description' => 'レシピ1の説明です',
                'is_comment_allowed' => 1,
            ],
            [
                'name' => 'レシピ5',
                'cookingtime' => 50,
                'description' => 'レシピ1の説明です',
                'is_comment_allowed' => 0,
            ],
            [
                'name' => 'レシピ6',
                'cookingtime' => 60,
                'description' => 'レシピ1の説明です',
                'is_comment_allowed' => 1,
            ],
            [
                'name' => 'レシピ7',
                'cookingtime' => 70,
                'description' => 'レシピ1の説明です',
                'is_comment_allowed' => 1,
            ],
        ];

        foreach ($recipes as $recipe) {
            \App\Recipe::create($recipe);
        }
    }
}
