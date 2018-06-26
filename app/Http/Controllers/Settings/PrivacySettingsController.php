<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrivacySettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('settings.privacy')
            ->withUser(request()->user());
    }

    public function update(Request $request)
    {
        return redirect()->route('settings.privacy');
    }
}
