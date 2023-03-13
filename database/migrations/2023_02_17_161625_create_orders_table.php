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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('email');
            $table->string('name');
            $table->string('phone');
            $table->string('address');
            $table->integer('governorate_id');
            $table->integer('city');
            $table->string('pincode')->nullable();
            $table->string('company')->nullable();
            $table->text('notes')->nullable();

            $table->string('tracking_no')->nullable();
            $table->enum('status_message', ['in progress', 'out for delivery', 'completed', 'cancelled', 'pending'])->nullable()->default('in progress');
            $table->string('payment_mode')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
