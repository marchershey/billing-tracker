<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDispatchStopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispatch_stops', function (Blueprint $table) {
            $table->id();
            $table->integer('dispatch_id')->nullable();
            $table->integer('warehouse_id')->nullable();
            $table->integer('position')->nullable();
            $table->integer('type_id')->nullable();
            $table->integer('miles')->nullable();
            $table->integer('drop_hooks')->nullable();
            $table->integer('tray_count')->nullable();
            $table->integer('roll_offs')->nullable();
            $table->integer('pack_outs')->nullable();
            $table->string('different')->nullable();
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
        Schema::dropIfExists('dispatch_stops');
    }
}
