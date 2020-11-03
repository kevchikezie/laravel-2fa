@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Settings</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- @if (is_null(\Auth::user())) --}}
                        <h5>You have not enabled two factor authentication</h5>
                        <p class="mt-4">Add additional security to your account using two factor authentication. You will be asked to enter a secure random token during athentication.</p>
                        <a href="{{ route('settings.generate.2fa') }}" role="button" class="btn btn-primary">
                            {{ __('Enable 2FA') }}
                        </a>
                    {{-- @else
                        <h5>Your two factor authentication is enabled</h5>
                        <p class="mt-4">Add additional security to your account using two factor authentication. You will be asked to enter a secure random token during athentication.</p>
                        <form action="{{ route('settings.disable.2fa') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">
                                {{ __('Disable 2FA') }}
                            </button>
                        </form>
                    @endif --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
