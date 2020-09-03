<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserRate extends Model
{
    public function generateRates(User $user)
    {
        $hire_date = Carbon::createFromFormat('Y-m', $user->hire_date);
        $today = Carbon::now();

        $months = $today->diffInMonths($hire_date);

        $hourly = 12.00;
        $stop_pay = 6.50;
        $drop_hook = 6.50;
        $pallet = 6.50;
        $stale = 6.50;

        if ($months < 12) {
            $mileage = 0.360;
            $roll_off = 0.0280;
            $pack_out = 0.0395;
        } else if ($months < 24) {
            $mileage = 0.365;
            $roll_off = 0.0284;
            $pack_out = 0.0404;
        } else if ($months < 36) {
            $mileage = 0.370;
            $roll_off = 0.0289;
            $pack_out = 0.0409;
        } else if ($months < 48) {
            $mileage = 0.375;
            $roll_off = 0.0294;
            $pack_out = 0.0414;
        } else if ($months < 60) {
            $mileage = 0.380;
            $roll_off = 0.0299;
            $pack_out = 0.0419;
        } else if ($months < 72) {
            $mileage = 0.385;
            $roll_off = 0.0304;
            $pack_out = 0.0424;
        } else if ($months < 84) {
            $mileage = 0.390;
            $roll_off = 0.0309;
            $pack_out = 0.0429;
        } else if ($months < 96) {
            $mileage = 0.395;
            $roll_off = 0.0314;
            $pack_out = 0.0434;
        } else if ($months >= 96) {
            $mileage = 0.400;
            $roll_off = 0.0317;
            $pack_out = 0.0439;
        }

        if (UserRate::where('user_id', $user->id)->exists()) {
            // exists, update it
            DB::table('user_rates')->where('user_id', $user->id)->update([
                'user_id' => $user->id,
                'months' => $months,
                'mileage' => $mileage,
                'roll_off' => $roll_off,
                'pack_out' => $pack_out,
                'hourly' => $hourly,
                'stop_pay' => $stop_pay,
                'drop_hook' => $drop_hook,
                'pallet' => $pallet,
                'stale' => $stale,
            ]);
        } else {
            // doesn't exist, create it
            DB::table('user_rates')->insert([
                [
                    'user_id' => $user->id,
                    'months' => $months,
                    'mileage' => $mileage,
                    'roll_off' => $roll_off,
                    'pack_out' => $pack_out,
                    'hourly' => $hourly,
                    'stop_pay' => $stop_pay,
                    'drop_hook' => $drop_hook,
                    'pallet' => $pallet,
                    'stale' => $stale,
                ],
            ]);
        }
    }
}
