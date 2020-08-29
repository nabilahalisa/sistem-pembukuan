<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('name', 50);
            $table->string('phone', 15);
            $table->string('product', 255);
            $table->string('store', 255);
            $table->date('resi');
            $table->date('htuse');
            $table->date('ulasan')->nullable();
            $table->string('ro')->nullable();
            $table->string('ket')->nullable();
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
        Schema::dropIfExists('sale');
    }
}
