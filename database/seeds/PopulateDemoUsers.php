<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PopulateDemoUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'marclewishershey@gmail.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
    }
}
