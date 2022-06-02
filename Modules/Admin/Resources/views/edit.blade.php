@foreach($user as $user)
<form action="{{route('update',['id' => $user->id])}}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name ='name' value = {{$user->name}} >
    <br>
    <input type="text" name = 'email' value = {{$user->email}} >
    <br>
    <button type="submit" class="btn btn-primary btn-lg">Sửa</button>
</form>
@endforeach
