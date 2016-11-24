<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFreelancers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('freelancers')) {
            Schema::create('freelancers', function (Blueprint $table) {
                $table->increments('freelancer_id');
                $table->string('name');
                $table->string('email');
                $table->string('phone', 40);
                $table->string('phone_other', 40)->nullable();
                $table->string('place_of_birth');
                $table->date('date_of_birth');
                $table->enum('gender',['Male','Female']);
                $table->enum('last_education', ['SMA/SMK', 'D1', 'D2', 'D3', 'D4', 'S1', 'S2', 'S3']);
                $table->string('npwp', 40);
                $table->string('bank');
                $table->string('bank_branch')->nullable();
                $table->string('bank_account_name');
                $table->string('bank_account_number');
                $table->string('ktp_number');
                $table->string('ktp_city');
                $table->string('ktp_village_id');
                $table->string('ktp_address');
                $table->string('home_city');
                $table->string('home_village_id');
                $table->string('home_address');
                $table->enum('active',['0','1'])->default('1');
                $table->integer('created_by');
                $table->integer('updated_by')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('freelancers');
    }
}
