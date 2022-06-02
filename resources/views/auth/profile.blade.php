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
    {{$product->id}}
    {{$product->price}}
@endforeach
@if(Auth::user()->isAdmin==0)
    @foreach($menus as $menus)
    {{$menus->id}}
    {{$menus->name}}
    @endforeach
@endif
<br>
@foreach($user as $user)
<form action="{{route('update-profile')}}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name ='name' value = {{$user->name}} >
    <br>
    <input type="text" name = 'email' value = {{$user->email}} >
    <br>
    <button type="submit" class="btn btn-primary btn-lg">Sửa</button>
</form>
    
@endforeach

</body>
</html>

