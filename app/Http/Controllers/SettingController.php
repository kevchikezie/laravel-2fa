<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TwoFactorAuthenticationService;

class SettingController extends Controller
{
	private $twoFactorAuthenticationService;

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TwoFactorAuthenticationService $twoFactorAuthenticationService)
    {
        $this->middleware('auth');
		$this->twoFactorAuthenticationService = $twoFactorAuthenticationService;
    }

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
     * Generate 2FA QR code and secret
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function generate2fa()
    {
    	$data = $this->twoFactorAuthenticationService->generate();

        return view('register_2fa', compact('data'));
    }

    /**
	 * Enable 2FA for your application
	 *
	 * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function enable2fa(Request $request)
    {
    	$request->validate([
            'secret'  => ['required', 'string'],
            'code' => ['required', 'string'],
        ]);

        if (! $this->twoFactorAuthenticationService->enable($request->toArray())) {
        	return redirect()->back()->with('error', 'Wrong two factor code! Try again.');
        }

        return redirect()->route('settings.index');
    }

    /**
     * Disable two factor authentication
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function disable2fa()
    {
    	$this->twoFactorAuthenticationService->disable();

    	return redirect()->route('settings.index');
    }
}
