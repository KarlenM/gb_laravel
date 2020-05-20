<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDownloadOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('download_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstname')->nullable(false);
            $table->string('tel')->nullable(false);
            $table->string('email')->nullable(false);
            $table->text('message')->nullable(false);
            $table->boolean('active')->default(true);
            $table->ipAddress('ip')->nullable(false);
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
        Schema::dropIfExists('download_orders');
    }
}
