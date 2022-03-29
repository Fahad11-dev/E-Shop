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
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default(0);
            $table->integer('cart_id')->default(0);
            $table->string("phone")->nullable();
            $table->string("country")->nullable();
            $table->string("state")->nullable();
            $table->string("address")->nullable();
            $table->string("postal_code")->nullable();
            $table->string("company")->nullable();
            $table->enum("status",['cancel','approve','pending'])->default('pending');
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
        Schema::dropIfExists('checkouts');
    }
};
