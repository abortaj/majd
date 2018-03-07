<?php

use Illuminate\Database\Seeder;

class SkillTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('skill_types')->delete();
        $skillType = array(
            array('id'=>1, 'name'=>'PHP'),
            array('id'=>2, 'name'=>'HTML/CSS'),
            array('id'=>3, 'name'=>'JAVASCRIPT'),
            array('id'=>4, 'name'=>'C/C++'),
            array('id'=>5, 'name'=>'RUBY'),
            array('id'=>6, 'name'=>'DOT NET FRAMEWORK'),
            array('id'=>7, 'name'=>'MARKETING'),
    );
        DB::table('skill_types')->insert($skillType);
    }
}
