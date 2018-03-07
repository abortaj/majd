<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $users = array(
            array('id' => 1,'first_name' => 'System' ,'last_name' => "Administrator",'avatar' => 'storage/users/sysadmin.png','email'=> 'admin@admin.com','password'=> bcrypt('111111'),'job_title'=>'Administrator')
        );
        DB::table('users')->insert($users);

    }
}
