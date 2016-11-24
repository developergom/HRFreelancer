<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableHistoryFreelancers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('history_freelancers')) {
            Schema::create('history_freelancers', function (Blueprint $table) {
                $table->increments('history_freelancer_id');
                $table->integer('freelancer_id');
                $table->integer('department_id');
                $table->integer('position_id');
                $table->double('honor');
                $table->enum('honor_type', ['daily', 'monthly', 'by project', 'by creation']);
                $table->datetime('start_date');
                $table->datetime('end_date');
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
        Schema::dropIfExists('history_freelancers');
    }
}
