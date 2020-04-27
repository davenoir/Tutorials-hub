<?php

use App\Category;
use Illuminate\Database\Seeder;

class ProgrammingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = ['Amazon Alexa Skills', 'Android', 'Angular',
        'Bitcoin', 'Blockchain', 'Bootstrap', 'C', 'C Sharp', 'CSS3',
        'Data Structures', 'Django',
        'Electron', 'Ethical Hacking', 'Flutter', 'Git', 'HTML 5',
        'Intro to Programming', 'Ionic', 'Java', 'JavaScript', 'Jquery',
        'Laravel', 'MySQL', 'Node.js', 'PHP', 'Python', 'React', 'Redux', 'Ruby', 'Scala',
        'Selenium', 'Software Testing', 'Spring', 'Unity', 'Virtual Reality', 'Vue.js', 'Website Performance', 'Xamarin'];
        foreach($technologies as $technology)
        {
            DB::table('technologies')->insert([
                'name'=> $technology,
                'logo'=>$technology.'.png',
                'category_id'=> 1
            ]);
        }
    }
}
