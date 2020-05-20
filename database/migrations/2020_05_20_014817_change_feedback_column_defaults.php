<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeFeedbackColumnDefaults extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('feedback', function (Blueprint $table) {
            $table->boolean('active')->default(true)->change();
            $table->dropColumn('updated_at');
            $table->dropColumn('created_at');
        });

        Schema::table('feedback', function (Blueprint $table) {
            $table->timestamp('updated_at')->nullable(false)->default('now()');
            $table->timestamp('created_at')->nullable(false)->default('now()');
        });
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
