<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('avatar')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedInteger('reference_id')->nullable();
            $table->string('invitation_token',100)->nullable();
            $table->string('job_title')->nullable();
            $table->text('bio')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->boolean('active')->default(1);
            $table->boolean('verify-email')->default(false);
            $table->string('verify_token',100)->nullable();
            $table->unsignedInteger('city_id')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('hourly_rate')->default(0);
            $table->decimal('balance', 19, 4)->default(0,0);
            $table->time('avg_response_time')->default(0);
            $table->string('personal_website')->nullable();
            $table->unsignedInteger('security_question_id')->nullable();
            $table->string('security_custom_question')->nullable();
            $table->string('security_answer')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
