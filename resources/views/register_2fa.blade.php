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
                    <p class="mt-4">Set up your two factor authentication by scanning the barcode below on your authenticator app. Alternatively, you can use  this code <code>{{ $secret }}</code></p>
                    <div class="mb-3">
                        <img src="{{ $QrImage }}">
                    </div>
                    <form action="#" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">
                            {{ __('Disable 2FA') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
