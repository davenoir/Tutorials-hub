<?php

use Illuminate\Database\Seeder;

class DevOpsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = ['Ansible','Microsoft Azure', 'AWS', 'Apache Kafka', 'DevOps',
        'Jenkins','Docker', 'Google Cloud Platform','Kubernetes', 'Linux Administration',
        'Puppet Labs', 'Serverless Computing', 'System Architecture', 'Vargant', 'Windows Admin'];
        foreach($technologies as $technology)
        {
            DB::table('technologies')->insert([
                'name'=> $technology,
                'logo'=>$technology.'.png',
                'category_id'=> 3
            ]);
        }
    }
}
