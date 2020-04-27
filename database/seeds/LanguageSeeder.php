<?php

use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = ['Engish', 'Spanish', 'French', 'German'];

        foreach($languages as $language) {
        DB::table('languages')->insert([
            'name'=> $language
        ]);
        }
    }
}
