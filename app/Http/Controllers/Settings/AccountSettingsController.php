<?php

namespace App\Http\Controllers\Settings;

use App\Rules\AlphaSpace;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountSettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('settings.account')
            ->withUser(request()->user());
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => ['nullable', 'min:3', 'max:32', new AlphaSpace],
            'email' => 'required|email|unique:users,id,' . $request->user()->id,
        ]);

        $request->user()->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        return redirect()->route('settings.account');
    }
}
