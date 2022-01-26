<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('submenus', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('menu_id');
            $table->string('title',255);
            $table->string('body',255);
            $table->text('detail');
            $table->string('keyword', 255);
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
            $table->foreign('menu_id')
                ->references('id')
                ->on('menus')
                ->onDelete('cascade');
        });




    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('submenus');
    }
}
