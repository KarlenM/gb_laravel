<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableResource extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->mediumText('name')->nullable(false);
            $table->bigInteger('updated_user_id')->unsigned();
            $table->foreign('updated_user_id')->references('id')->on('users');
            $table->bigInteger('created_user_id')->unsigned();
            $table->foreign('created_user_id')->references('id')->on('users');
            $table->ipAddress('ip')->nullable(false);
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
        Schema::dropIfExists('news_resources');
    }
}
