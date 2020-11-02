<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
	/**
	 * Display the settings page for you to enable 2FA
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
    public function index()
    {
    	return view('settings');
    }
}
