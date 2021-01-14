<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('courses')->insert([
                'name' => 'Provisoire',
                'price'=>20000
            ]);

            DB::table('courses')->insert([
                'name' => 'Driving license',
                'price'=>140000
            ]);
}
}
