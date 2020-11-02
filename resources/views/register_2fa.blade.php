@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Two Factor Authentication</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h5>Set up your two factor authentication</h5>
                    <p class="mt-4">Set up your two factor authentication by scanning the barcode below on your authenticator app. Alternatively, you can use  this code <code>{{ $secret }}</code></p>
                    <div>
                        <img src="{{ $QrImage }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
