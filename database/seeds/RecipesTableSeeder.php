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
        // FIXME: VSCodeだとエラー扱いになる(Undefined type 'DB'.intelephense)
        DB::Table('recipes')->truncate();
        $recipes = [
            [
                'name' => 'recipe1',
                'cookingtime' => 10,
            ],
            [
                'name' => 'recipe2',
                'cookingtime' => 20,
            ],
            [
                'name' => 'recipe3',
                'cookingtime' => 30,
            ]
        ];

        foreach ($recipes as $recipe) {
            \App\Recipe::create($recipe);
        }
    }
}
