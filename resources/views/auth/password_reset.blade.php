<form method="POST" action="{{route('reset-password')}}">
    @csrf
    @method('PUT')
    <input type="password" name ='password_old' >
    <br>
    <input type="password" name = 'password' >
    <br>
    <input type="password" name = 'password_confirmation' >
    <br>
    <button type="submit" class="btn btn-primary btn-lg">Đổi mật khẩu</button>
</form>