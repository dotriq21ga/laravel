@if(Auth::check())
    <a href="{{route('profile')}}">{{Auth::user()->name}}</a>
    
    <a href="{{route('logout')}}">Đăng xuất</a>
@else
    <a href="{{route('register')}}">Đăng kí</a>
    <a href="{{route('login')}}">Đăng nhập</a>
@endif
<a href="{{route('get.add_a')}}">Thêm tài khoản</a> 
@foreach($name as $name)
    <table>
        <tr>
            <td>
                <p><?=$name->name?></p>
            </td>
            <td>
                <img src="{{ url('public/Image/'.$name->img) }}"style="height: 100px; width: 150px;">
            </td>
            <td>
                <a href="{{route('get.update', ['id' => $name->id])}}">Sửa</a>
            </td>
            <td>
                <form method="post" action="{{route('post.delete', ['id' => $name->id])}}">
                    @csrf
                    @method('DELETE')
                    <button type = "submit">Xóa</button>
                </form> 
            </td>
            <td>
                <a href="{{route('show', ['id' => $name->id])}}">Xem</a>
            </td>
        </tr>
    </table>
@endforeach