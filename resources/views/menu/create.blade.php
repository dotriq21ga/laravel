<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <title>Document</title>
</head>
<body>
<div class="container" style="height: auto;">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
        <form class="form" method="POST" action="add" enctype="multipart/form-data">
            @csrf
            <div class="card card-login card-hidden mb-3">
            <div class="card-header card-header-primary text-center">
                <h4 class="card-title"><strong>Thêm Menu</strong></h4>
            </div>
            <div class="card-body ">
                <div class="bmd-form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons">face</i>
                    </span>
                    </div>
                    <input type="text" name="name" class="form-control" placeholder="{{ __('Name...') }}" value="{{ old('name') }}" required>
                </div>
                @if ($errors->has('name'))
                    <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                    <strong>{{ $errors->first('name') }}</strong>
                    </div>
                @endif
                </div>
                <div class="bmd-form-group{{ $errors->has('img') ? ' has-danger' : '' }} mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons >">Ảnh</i>
                    </span>
                    </div>
                    <input type="file" class="form-control" name="img" value="{{ old('img')}}">
                </div>
                @if ($errors->has('img'))
                    <div id="email-error" class="error text-danger pl-3" for="image" style="display: block;">
                    <strong>{{ $errors->first('img') }}</strong>
                    </div>
                @endif
                </div>
            </div>
            <div class="card-footer justify-content-center">
                <button type="submit" class="btn btn-primary btn-lg">Đăng kí</button>
            </div>
            </div>
        </form>
        </div>
    </div>
</div>
</body>
</html>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">