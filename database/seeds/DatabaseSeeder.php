<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PopulateDemoUsers::class);
        $this->call(PopulateDispatchStatuses::class);
        $this->call(PopulateWarehouses::class);
    }
}
