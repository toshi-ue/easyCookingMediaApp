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
                'cookingtools' => '1,2',
                'description' => 'レシピ1の説明です',
                'is_comment_allowed' => 1,
                'is_published' => 1,
            ],
            [
                'name' => 'レシピ2',
                'cookingtime' => 20,
                'cookingtools' => '2,3',
                'description' => 'レシピ2の説明です',
                'is_comment_allowed' => 0,
                'is_published' => 1,
            ],
            [
                'name' => 'レシピ3',
                'cookingtime' => 30,
                'cookingtools' => '3,4',
                'description' => 'レシピ3の説明です',
                'is_comment_allowed' => 1,
                'is_published' => 1,
            ],
            [
                'name' => 'レシピ4',
                'cookingtime' => 40,
                'cookingtools' => '1,4',
                'description' => 'レシピ4の説明です',
                'is_comment_allowed' => 1,
                'is_published' => 1,
            ],
            [
                'name' => 'レシピ5',
                'cookingtime' => 50,
                'cookingtools' => '5',
                'description' => 'レシピ5の説明です',
                'is_comment_allowed' => 0,
                'is_published' => 1,
            ],
            [
                'name' => 'レシピ6',
                'cookingtime' => 60,
                'cookingtools' => '7',
                'description' => 'レシピ6の説明です',
                'is_comment_allowed' => 1,
                'is_published' => 1,
            ],
            [
                'name' => 'レシピ7',
                'cookingtime' => 70,
                'cookingtools' => '3',
                'description' => 'レシピ7の説明です',
                'is_comment_allowed' => 1,
                'is_published' => 1,
            ],
        ];

        foreach ($recipes as $recipe) {
            \App\Recipe::create($recipe);
        }
    }
}
