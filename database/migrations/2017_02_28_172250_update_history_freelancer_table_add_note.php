<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateHistoryFreelancerTableAddNote extends Migration
{
    public function up()
    {
        if (Schema::hasTable('history_freelancers')) {
            Schema::table('history_freelancers', function($table) {
                DB::statement('ALTER TABLE history_freelancers ADD notes TEXT AFTER end_date');
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
        //
    }
}
