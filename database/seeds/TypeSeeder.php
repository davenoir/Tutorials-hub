<?php

use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Free', 'Paid'];

        foreach($types as $type) {
        DB::table('types')->insert([
            'name'=> $type
        ]);
        }
    }
}
