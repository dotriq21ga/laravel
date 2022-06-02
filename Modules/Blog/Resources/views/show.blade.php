@foreach($blog as $blog)    
    <table>
        <tr>
            {{$blog->title}}
        </tr>
        <tr>
            <img src="{{ url('public/Image/'.$blog->img) }}" alt="không có ảnh">
        </tr>
        <tr>
            {{$blog->content}}
        </tr>
    </table>              
@endforeach