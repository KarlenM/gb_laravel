<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeFeedbackColumnDefaults2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('feedback', function (Blueprint $table) {
            $table->dropColumn('updated_at');
            $table->dropColumn('created_at');
        });

        Schema::table('feedback', function (Blueprint $table) {
            $table->timestamp('updated_at')->nullable(false)->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamp('created_at')->nullable(false)->default(\DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        {
            Schema::table('feedback', function (Blueprint $table) {
                $table->dropColumn('updated_at');
                $table->dropColumn('created_at');
                $table->timestamp('updated_at');
                $table->timestamp('created_at');
            });
    }
}
