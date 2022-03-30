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
        Schema::create('carts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->default(0);
            $table->integer('product_id')->default(0);
            $table->string('product_title')->nullable();
            $table->integer('product_price')->default(0);
            $table->integer('product_quantity')->default(0);
            $table->integer('total_price')->default(0);
            $table->enum('status',['complete','incomplete'])->default('incomplete');
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
        Schema::dropIfExists('carts');
    }
};
