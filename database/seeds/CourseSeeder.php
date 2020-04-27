<?php

use App\Type;
use App\User;
use App\Level;
use App\Course;
use App\Format;
use App\Version;
use App\Language;
use Carbon\Carbon;
use App\Technology;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $technologies = Technology::all();
        $versions = Version::all();
        $versions = Version::all();
        $date = Carbon::createFromTimeStamp($faker->dateTimeBetween('now', '+7 days')->getTimestamp());

       for($i=0; $i < 5; $i++){
            foreach($technologies as $technology) {
                foreach($versions as $version) {
                    if($technology->id == $version->technology_id) {
                DB::table('courses')->insert([
                    'name'=> $faker->sentence,
                    'link'=>'https://www.udemy.com/course/the-ultimate-mysql-bootcamp-go-from-sql-beginner-to-expert/',
                    'technology_id'=> $technology->id,
                    'type_id'=> Type::all()->random()->id,
                    'format_id'=> Format::all()->random()->id,
                    'version_id'=> $version->id,
                    'language_id'=> Language::all()->random()->id,
                    'user_id'=> User::all()->random()->id,
                    'level_id'=>Level::all()->random()->id,
                    'created_at'=> $date,
                    'approved'=> true
            ]);
                }
                }
            }
        }
    }
}
