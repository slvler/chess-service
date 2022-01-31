<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('subcategory_id');
            $table->string('image',255);
            $table->text('title');
            $table->text('body')->nullable();
            $table->text('detail')->nullable();
            $table->string('keyword', 255)->nullable();
            $table->tinyInteger('status')->default(0);
            $table->string('seo_url',225);
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
        Schema::dropIfExists('products');
    }
}
