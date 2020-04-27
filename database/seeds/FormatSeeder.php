<?php

use Illuminate\Database\Seeder;

class FormatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $formats = ['Video', 'Book'];

        foreach($formats as $format) {
        DB::table('formats')->insert([
            'name'=> $format
        ]);
        }
    }
}
