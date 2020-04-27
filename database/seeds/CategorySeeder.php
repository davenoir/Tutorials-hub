<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Programming', 'Data Science', 'DevOps', 'Design'];

        foreach($categories as $category)
        {
            DB::table('categories')->insert([
                'name' => $category,
            ]);

        }
    }
}
