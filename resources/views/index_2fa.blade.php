<!DOCTYPE html>
<html>
<head>
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Two Factor Authentication') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('2fa') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="one_time_password" class="col-md-4 col-form-label text-md-right">{{ __('Two factor code') }}</label>

                                <div class="col-md-6">
                                    <input id="one_time_password" type="text" class="form-control" name="one_time_password" required autocomplete="off" autofocus>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Proceed') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>