@foreach($product as $product)             
    <table>
        <tr>
            <td>
                <img src="{{ url('public/Image/'.$product->img) }}"style="height: 100px; width: 150px;">
            </td>
            <td>
                {{$product->price}}
            </td>
            <td>
                <a href="{{route('get.update_a', ['id' => $product->id])}}">Sửa</a>
            </td>
            <td>
                <form method="post" action="{{route('post.delete_a', ['id' => $product->id])}}">
                    @csrf
                    @method('DELETE')
                    <button type = "submit">Xóa</button>
                </form> 
            </td>
            <td>
                <form method="post" action="{{route('post.trans', ['id' => $product->id])}}">
                    @csrf
                    @method('PUT')
                    <button type = "submit">Mua</button>
                </form> 
            </td>
        </tr>
    </table>
@endforeach