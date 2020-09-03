<?php

namespace App\Http\Controllers\Drivers\Profile;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmailVerificationEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('sections.drivers.profile.index');
    }

    public function index_post(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'hire_date' => 'required',
        ], [
            'name.required' => 'Your name is required',
            'email.required' => 'Your email is required',
            'hire_date.required' => 'Your hire date is required',
        ]);

        $user = Auth::user();
        $user->name = $data['name'];
        if ($data['email'] != $user->email) {
            $user->email = $data['email'];
            $user->email_verified_at = null;
            SendEmailVerificationEmail::dispatch($user);
        }
        $user->hire_date = $data['hire_date'];
        $user->save();

        return redirect()->back()->with('success', 'Your profile has been updated.');
    }

    public function password()
    {
        return view('sections.drivers.profile.password');
    }

    public function password_post(Request $request)
    {
        $data = $request->validate([
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ], [
            'password.required' => 'Your password is required.',
            'password.confirmed' => 'Your passwords do not match.',
        ]);

        $user = Auth::user();
        $user->password = Hash::make($data['password']);
        $user->save();

        return redirect()->back()->with('success', 'You have successfully changed your password.');
    }

    public function settings()
    {
        $settings = Auth::user()->settings;
        return view('sections.drivers.profile.settings', compact('settings'));
    }

    public function settings_post(Request $request)
    {
        $settings = $request->validate([
            'date_verbiage' => 'string',
            'dispatch_count' => 'required|integer',
        ]);

        if ($request->date_verbiage) {
            $settings['date_verbiage'] = 1;
        } else {
            $settings['date_verbiage'] = 0;
        }

        Auth::user()->settings()->update($settings);

        return redirect()->back()->with('success', 'Your settings have been updated.');
    }
}
