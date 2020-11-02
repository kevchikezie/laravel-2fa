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

    /**
     * Enable 2FA on your application
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function enable2fa()
    {
    	$google2fa = app('pragmarx.google2fa');
    	$google2faSecret = $google2fa->generateSecretKey();

    	$QrImage = $google2fa->getQRCodeInline(
            config('app.name'),
            \Auth::user()->email,
            $google2faSecret
        );

        \Auth::user()->update(['google2fa_secret' => $google2faSecret]);

        return view('register_2fa', ['QrImage' => $QrImage, 'secret' => $google2faSecret]);
    }

    /**
     * Disable two factor authentication
     *
     */
    public function disable2fa()
    {
    	\Auth::user()->update(['google2fa_secret' => null]);

    	return redirect()->route('settings.index');
    }
}
