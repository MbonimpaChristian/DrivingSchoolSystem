<?php

use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('test_questions')->insert([

            [
                'question' => 'Umurongo utemerewe kudepasirizamo nuwuhe?',
                'choiceA' => 'umurongo ucagaguye',
                'choiceB' => 'umurongo usa umweru',
                'choiceC' =>'umurongo udacagaguye',
                'choiceD' => 'umurongo usa umukara',
                'answer' => 'choiceC',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'question' => 'Imodoka za ndakumirwa zirangwa nayahe matara?',
                'choiceA' => 'umutuku',
                'choiceB' => 'ubururu',
                'choiceC' =>'umuhondo',
                'choiceD' => 'umukara',
                'answer' => 'choiceB',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'question' => 'NInde muntu utanga uruhushya rwo gutwara ikinyabiziga ?',
                'choiceA' => 'Umupolisi',
                'choiceB' => 'umukozi',
                'choiceC' =>'umumotard',
                'choiceD' => 'umworozi',
                'answer' => 'choiceA',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'question' => 'Ni he ikinyabiziga kemerewe kunyura kukindi mu ruhe ruhande?',
                'choiceA' => 'Iburyo bwawe',
                'choiceB' => 'Ibumoso bwawe',
                'choiceC' =>'Inyuma yawe',
                'choiceD' => 'Imbere yawe',
                'answer' => 'choiceA',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'question' => 'Ni he ikinyabiziga kemerewe kunyura kukindi mu ruhe ruhande?',
                'choiceA' => 'Iburyo bwawe',
                'choiceB' => 'Ibumoso bwawe',
                'choiceC' =>'Inyuma yawe',
                'choiceD' => 'Imbere yawe',
                'answer' => 'choiceA',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
