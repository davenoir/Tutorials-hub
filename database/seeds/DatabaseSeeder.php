<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(RoleSeeder::class);
         $this->call(AdminSeeder::class);
         $this->call(UserSeeder::class);
         $this->call(CategorySeeder::class);
         $this->call(ProgrammingSeeder::class);
         $this->call(DataScienceSeeder::class);
         $this->call(DevOpsSeeder::class);
         $this->call(DesignSeeder::class);
         $this->call(VersionSeeder::class);
         $this->call(TypeSeeder::class);
         $this->call(FormatSeeder::class);
         $this->call(LanguageSeeder::class);
         $this->call(LevelSeeder::class);
         $this->call(CourseSeeder::class);
    }
}
