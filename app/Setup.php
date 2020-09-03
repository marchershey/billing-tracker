<?php

namespace App;

use App\Jobs\GenerateUserRates;
use Illuminate\Database\Eloquent\Model;

class Setup extends Model
{
    public function generateRates($user, $hire_date)
    {
        GenerateUserRates::dispatch($user, $hire_date);
    }
}
