<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach(range(1,5) as $index){
        DB::table('users')->insert([
            'name' => $faker->name,
            'email' => $faker->unique()->safeEmail,
            'nid' => $faker->numerify('##########'),
            'telephone' => $faker->e164phoneNumber,
            'address' => $faker->address,
            'roles' => 'ROLE_TEACHER',
            'category'=>$faker->randomElement($array = array ('a','b','c')),
            'drivinglicense'=>$faker->numerify('##########'),
            'plateNo'=>$faker->userName,
            'cartype'=>$faker->name,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        }
    }
    }

