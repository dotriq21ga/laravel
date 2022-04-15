<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@foreach($product as $product)
<div class="container" style="height: auto;">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
        <form class="form" method="POST" action="{{route('post.update_a',['id' => $product->id])}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card card-login card-hidden mb-3">
            <div class="card-header card-header-primary text-center">
                <h4 class="card-title"><strong>Thêm Menu</strong></h4>
            </div>
            <select name="menu_id" class="form-select">
            @foreach($menus as $menus)
                    <option  value="{{ $menus->id }}">{{ $menus->name }}</option>
            @endforeach
            </select>
            <div class="card-body ">
                <div class="bmd-form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons">face</i>
                    </span>
                    </div>
                </div>
                Giá
                <input type="text" name = "price" value ={{$product->price}}>
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
                        <i class="material-icons >">Ảnh mới</i>
                    </span>
                    </div>
                    <input type="file" class="form-control" name="img">
                </div>
                </div>

                <div class="bmd-form-group{{ $errors->has('img') ? ' has-danger' : '' }} mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons >">Ảnh cũ</i>
                    </span>
                    </div>
                    <img src="{{ url('public/Image/'.$product->img) }}"style="height: 100px; width: 150px;">
                </div>
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
@endforeach
</body>
</html>