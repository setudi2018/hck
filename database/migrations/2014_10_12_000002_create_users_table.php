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
            $table->integer('department_id')->unsigned()->nullable();
            $table->foreign('department_id')->references('id')->on('departments');
            $table->string('name')->nullable();
            $table->string('password');
            $table->string('last_name', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->enum('role', ['admin','hr','interviewer']);
            $table->string('profile_photo', 255)->nullable();
            $table->enum('gender', ['male','female','other']);
            $table->integer('age')->nullable();
            $table->date('dob')->nullable();
            $table->string('address', 255)->nullable();
            $table->string('city', 255)->nullable();
            $table->string('state', 255)->nullable();
            $table->string('country', 255)->nullable();
            $table->string('time_zone', 255)->nullable();
            $table->string('phone', 255)->nullable();
            $table->string('pincode', 255)->nullable();
            $table->string('mobile', 255)->nullable();
            $table->tinyInteger('active')->default(0);
            $table->string('file', 255)->nullable();
            $table->string('date_of_today', 255)->nullable();
            $table->string('post_applied', 255)->nullable();
            $table->string('reference', 255)->nullable();
            $table->string('department', 255)->nullable();
            $table->string('notice_period', 255)->nullable(); 
            $table->string('nationality', 255)->nullable();
            $table->string('blood_group', 255)->nullable();
            $table->string('expected_ctc', 255)->nullable();
            $table->string('current_ctc', 255)->nullable();
            $table->string('res_address', 255)->nullable();
            $table->string('per_address', 255)->nullable();
            $table->string('marital_status', 255)->nullable();
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
