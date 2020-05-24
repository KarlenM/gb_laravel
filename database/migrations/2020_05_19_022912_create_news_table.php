<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('author')->nullable(false);
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('news_category')->onDelete('cascade');
            $table->string('title')->nullable(false);
            $table->string('img')->nullable(false);
            $table->longText('text')->nullable(false);
            $table->boolean('active')->nullable(false)->default(true);
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
        Schema::dropIfExists('news');
    }
}
