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
        <form class="form" method="POST" action="{{route('them-tin-tuc')}}" enctype="multipart/form-data">
            @csrf
            <div class="card card-login card-hidden mb-3">
            <div class="card-header card-header-primary text-center">
                <h4 class="card-title"><strong>Thêm tin tức</strong></h4>
            </div>
            
            <div class="card-body ">
                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text">
                        <lb >Thể loại</lb>
                    </span>
                    </div>
                    
                    <select name="category" class="form-select">
                    @foreach($menus as $menus)
                    
                        <option  value="{{ $menus->id }}">{{ $menus->name }}</option>

                    @endforeach
                    </select>
                    
                </div>
                <lb>Tiêu đề</lb>
                    <input type="text" name = "title">
                </div>

                <lb>Nội dung</lb>
                    <textarea type="text" name = "content"></textarea>
                </div>

                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons >">Ảnh</i>
                    </span>
                    </div>
                    <input type="file" class="form-control" name="img">
                </div>
                </div>
            </div>
            <div class="card-footer justify-content-center">
                <button type="submit" class="btn btn-primary btn-lg">Thêm</button>
            </div>
            </div>
        </form>
        </div>
    </div>
</div>

</body>
</html>