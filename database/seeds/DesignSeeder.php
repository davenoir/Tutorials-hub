<?php

use Illuminate\Database\Seeder;

class DesignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = ['Adobe After Effects', 'Adobe Ex. Design', 'Adobe Indesign',
        'Adobe Lightroom', 'Adobe Premier','Affinity Designer', 'Affinity Photo','Autodesk 3DS max',
        'Autodesk Maya','Blender','Cinema 4D', 'Color Theory','Daz Studio', 'Figma', 'Framer',
        'Game Design', 'Illustrator', 'Industrial Design', 'Inkscape', 'Interaction Design', 'InVision',
        'Origami Studio', 'Photoshop', 'Principle', 'Product Design', 'Prototyping',
        'Sketch', 'Sketchbook Pro', 'UX Design', 'UI Design', 'UX Pin', 'UX Research'];
        foreach($technologies as $technology)
        {
            DB::table('technologies')->insert([
                'name'=> $technology,
                'logo'=>$technology.'.png',
                'category_id'=> 4
            ]);
        }
    }
}
