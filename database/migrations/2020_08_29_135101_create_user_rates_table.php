<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_rates', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('months')->default(0);
            $table->float('milage', 4, 3)->default(0.360);
            $table->float('rolloff', 5, 4)->default(0.0280);
            $table->float('packout', 5, 4)->default(0.0395);
            $table->float('hourly', 4, 2)->default(12.00);
            $table->float('stoppay', 4, 2)->default(06.50);
            $table->float('drophook', 4, 2)->default(06.50);
            $table->float('palet', 4, 2)->default(06.50);
            $table->float('stale', 4, 2)->default(06.50);
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
        Schema::dropIfExists('user_rates');
    }
}
