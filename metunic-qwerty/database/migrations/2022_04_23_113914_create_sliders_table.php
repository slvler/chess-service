<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image', 255);
            $table->string('title',255)->nullable();
            $table->text('desc')->nullable();
            $table->text('keyword')->nullable();
            $table->enum('url', ['0', '1'])->default('0');
            $table->text('url_adress')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('order')->unsigned();
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
        Schema::dropIfExists('sliders');
    }
}
