<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('users')->insert([
            'name' => $faker->name,
            'email'=>'admin@admin.com',
            'role_id' => 1,
            'password' => Hash::make(123456789),
            'api_token'=>Str::random(60),
        ]);

    }
}
