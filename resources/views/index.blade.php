@if(Auth::check())
    <a href="{{route('profile')}}">{{Auth::user()->name}}</a>
    
    <a href="{{route('logout')}}">Đăng xuất</a>
@else
    <a href="{{route('register')}}">Đăng kí</a>
    <a href="{{route('login')}}">Đăng nhập</a>
@endif
<a href="{{route('get.add_a')}}">Thêm tài khoản</a> 
@foreach($menus as $menus)
    <table>
        <tr>
            <td>
                {{$menus->name}}
            </td>
            <td>
                <img src="{{ url('public/Image/'.$menus->img) }}"style="height: 100px; width: 150px;">
            </td>
            <td>
                <a href="{{route('get.update', ['id' => $menus->id])}}">Sửa</a>
            </td>
            <td>
                <form method="post" action="{{route('post.delete', ['id' => $menus->id])}}">
                    @csrf
                    @method('DELETE')
                    <button type = "submit">Xóa</button>
                </form> 
            </td>
            <td>
                <a href="{{route('show', ['id' => $menus->id])}}">Xem</a>
            </td>
        </tr>
    </table>
@endforeach