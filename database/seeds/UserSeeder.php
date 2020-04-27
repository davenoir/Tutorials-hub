<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for($i=0; $i<30; $i++){
            DB::table('users')->insert([
                'name' => $faker->name,
                'email'=>$faker->safeEmail,
                'role_id' => 2,
                'password' => Hash::make($faker->password),
                'api_token'=>Str::random(60),
            ]);
        }
    }
}
