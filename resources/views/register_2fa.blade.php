@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Set Up Two Factor Authentication</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h5>You have enabled two factor authentication</h5>
                    <p class="mt-4">Set up your two factor authentication by scanning the barcode below on your authenticator app. Alternatively, you can use  this code <code>{{ $data['secret'] }}</code></p>
                    <div class="mb-3">
                        <img src="{{ $data['QrImage'] }}">
                    </div>
                    <form action="{{ route('settings.enable.2fa') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="code" class="col-md-12 col-form-label">{{ __('Enter OTP from authenticator app') }}</label>
                            <div class="col-md-7">
                                <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" required autocomplete="off">
                            </div>
                        </div>

                        <input type="hidden" name="secret" value="{{ $data['secret'] }}">

                        <button type="submit" class="btn btn-primary">
                            {{ __('Proceed') }}
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
