<?php

use Illuminate\Database\Seeder;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('skills')->delete();
        $skill = array(
            array('id'=>1, 'name'=>'PHP', 'skill_type_id'=>1),
            array('id'=>2, 'name'=>'Laravel Framework', 'skill_type_id'=>1),
            array('id'=>3, 'name'=>'Symfony Framework', 'skill_type_id'=>1),
            array('id'=>4, 'name'=>'CodeIgniter Framework', 'skill_type_id'=>1),
            array('id'=>5, 'name'=>'Yii Framework', 'skill_type_id'=>1),
            array('id'=>6, 'name'=>'Phalcon Framework', 'skill_type_id'=>1),
            array('id'=>7, 'name'=>'CakePHP Framework', 'skill_type_id'=>1),
            array('id'=>8, 'name'=>'Zend Framework', 'skill_type_id'=>1),
            array('id'=>9, 'name'=>'Slim Framework', 'skill_type_id'=>1),
            array('id'=>10, 'name'=>'FuelPHP Framework', 'skill_type_id'=>1),
            array('id'=>11, 'name'=>'PHPixie Framework', 'skill_type_id'=>1),


            array('id'=>12, 'name'=>'HTML/CSS', 'skill_type'=>2),
            array('id'=>13, 'name'=>'Scss', 'skill_type'=>2),


            array('id'=>14, 'name'=>'JAVASCRIPT', 'skill_type_id'=>3),
            array('id'=>15, 'name'=>'Angular JS', 'skill_type_id'=>3),
            array('id'=>16, 'name'=>'Angular2 JS', 'skill_type_id'=>3),
            array('id'=>17, 'name'=>'Angular4 JS', 'skill_type_id'=>3),


        );
        DB::table('skills')->insert($skill);
    }
}
