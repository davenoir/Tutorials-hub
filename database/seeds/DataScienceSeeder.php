<?php

use Illuminate\Database\Seeder;

class DataScienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = ['Apache Spark','Data Science', 'Hadoop', 'Machine Learning',
        'R programming', 'TensorFlow', 'Artificial Intelligence', 'Deep Learning'];
        foreach($technologies as $technology)
        {
            DB::table('technologies')->insert([
                'name'=> $technology,
                'logo'=>$technology.'.png',
                'category_id'=> 2
            ]);
        }
    }
}
