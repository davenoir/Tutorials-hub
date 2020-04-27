<?php

use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $levels = ['Beginner', 'Advanced'];

        foreach($levels as $level) {
        DB::table('levels')->insert([
            'name'=> $level
        ]);
        }
    }
}
