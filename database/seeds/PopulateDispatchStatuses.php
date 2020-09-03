<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PopulateDispatchStatuses extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dispatch_statuses')->insert([
            ['name' => 'Draft', 'color' => 'gray', 'driver_default' => 0, 'driver_hidden' => 0],
            ['name' => 'Active', 'color' => 'indigo', 'driver_default' => 1, 'driver_hidden' => 0],
            ['name' => 'Pending', 'color' => 'teal', 'driver_default' => 0, 'driver_hidden' => 1],
            ['name' => 'Confirmed', 'color' => 'blue', 'driver_default' => 0, 'driver_hidden' => 1],
            ['name' => 'Paid', 'color' => 'green', 'driver_default' => 0, 'driver_hidden' => 1],
            ['name' => 'Cancelled', 'color' => 'yellow', 'driver_default' => 0, 'driver_hidden' => 1],
            ['name' => 'Deleted', 'color' => 'red', 'driver_default' => 0, 'driver_hidden' => 1],
        ]);
    }
}
