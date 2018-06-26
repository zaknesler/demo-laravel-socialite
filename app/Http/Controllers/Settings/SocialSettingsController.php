<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SocialSettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('settings.social')
            ->withUser(request()->user());
    }

    public function update(Request $request)
    {
        return redirect()->route('settings.social');
    }
}
