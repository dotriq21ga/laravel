<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container" style="height: auto;">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
        <form class="form" method="POST" action="login">
            @csrf

            <div class="card card-login card-hidden mb-3">
            <div class="card-header card-header-primary text-center">
                <h4 class="card-title"><strong>Đăng nhập</strong></h4>
            </div>
            <div class="card-body">
                <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons">email</i>
                    </span>
                    </div>
                    <input type="email" name="email" class="form-control" placeholder="{{ __('Email...') }}" value="{{ old('email') }}" required>
                </div>
                @if ($errors->has('email'))
                    <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                    <strong>{{ $errors->first('email') }}</strong>
                    </div>
                @endif
                </div>
                <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons">lock_outline</i>
                    </span>
                    </div>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password..." required>
                </div>
                @if ($errors->has('password'))
                    <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                    <strong>{{ $errors->first('password') }}</strong>
                    </div>
                @endif
                </div>
            </div>
            <div class="card-footer justify-content-center">
                <button type="submit" class="btn btn-primary btn-lg">Đăng nhập</button>
            </div>
            </div>
        </form>
        </div>
    </div>
</div>
</body>
</html>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">