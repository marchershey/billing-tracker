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
            $table->integer('months');
            $table->float('mileage', 4, 3);
            $table->float('roll_off', 5, 4);
            $table->float('pack_out', 5, 4);
            $table->float('hourly', 4, 2);
            $table->float('stop_pay', 4, 2);
            $table->float('drop_hook', 4, 2);
            $table->float('pallet', 4, 2);
            $table->float('stale', 4, 2);
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
