<?php

namespace App\Services;

class TwoFactorAuthenticationService
{
	/**
	 * Generate the two fator authentication QR code and secret
	 *
	 * @return array
	 */
	public function generate()
	{
		$google2fa = app('pragmarx.google2fa');
    	$google2faSecret = $google2fa->generateSecretKey();

    	$QrImage = $google2fa->getQRCodeInline(
            config('app.name'),
            \Auth::user()->email,
            $google2faSecret
        );

        return ['QrImage' => $QrImage, 'secret' => $google2faSecret];
	}

	/**
	 * Enable two factor authentication and save to database
	 *
	 * @param  array  $data
	 * @return bool
	 */
	public function enable($data)
	{
		$google2fa = app('pragmarx.google2fa');

        if (! $google2fa->verifyKey($data['secret'], $data['code'])) return false;

        \Auth::user()->update(['google2fa_secret' => $data['secret']]);

        return true;
	}

	/**
	 * Disable two factor authentication
	 *
	 * @return avoid
	 */
	public function disable()
	{
		\Auth::user()->update(['google2fa_secret' => null]);
	}
}