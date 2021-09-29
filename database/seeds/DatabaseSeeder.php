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
        $this->call(TeacherSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(QuestionSeeder::class);
    }
}
