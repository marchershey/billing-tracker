<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateUserRates extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(User $user)
    {
        DB::table('user_rates')->insert([
            ['user_id', $user->id],
        ]);
    }
}
