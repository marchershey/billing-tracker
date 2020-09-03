<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateDispatchStopTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispatch_stop_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('active')->default(1);
            $table->timestamps();
        });

        DB::table('dispatch_stop_types')->insert([
            ['name' => 'Drop & Hook'],
            ['name' => 'Roll Off'],
            ['name' => 'Pack Out'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dispatch_stop_types');
    }
}
