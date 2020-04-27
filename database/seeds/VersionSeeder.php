<?php

use App\Technology;
use Illuminate\Database\Seeder;

class VersionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $versions = ['1', '2' ,'3'];

        $technologies=Technology::all();

        foreach($technologies as $technology)
        {
            foreach($versions as $version) {
                DB::table('versions')->insert([
                    'technology_id'=> $technology->id,
                    'name'=>$technology->name.' '.$version,
                ]);
            }
        }
    }
}
