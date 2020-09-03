<?php

namespace App\Http\Controllers\Setup;

use App\Events\SetupStarted;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SetupController extends Controller
{
    public function index()
    {
        if (Auth::user()->setup_completed != 1) {
            return view('sections.setup.index');
        }
        return redirect()->route('index');

    }

    public function processing()
    {
        if (Auth::user()->setup_completed != 1) {
            return view('sections.setup.processing');
        }
        return redirect()->route('index');
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'hire_date' => 'required',
        ]);

        $user = User::find(Auth::user()->id);
        $user->name = $data['name'];
        $user->hire_date = $data['hire_date'];
        $user->setup_completed = 0;
        $user->save();

        event(new SetupStarted($user));

        return redirect('/');
    }
}
