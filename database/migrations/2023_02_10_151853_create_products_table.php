<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->unsignedBiginteger('category_id')->nullable();
            $table->string('brand')->nullable();
            $table->integer('original_price');
            $table->integer('selling_price')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('small_desc')->nullable();
            $table->string('long_desc')->nullable();
            $table->string('meta_title')->nullable();
            $table->tinyInteger('trending')->default('0');
            $table->tinyInteger('featured')->default('0');
            $table->tinyInteger('status')->default('1');

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
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
};
