@extends('blog::layouts.master')

@section('content')
    @foreach($blog as $blog)    
        <table>
            <tr>
                {{$blog->title}}
            </tr>
            <tr>
                <img src="{{ url('public/Image/'.$blog->img) }}" alt="không có ảnh">
            </tr>
            <form method ='POST' action="{{route('xoa-tin-tuc',['id' => $blog->id])}}">
                @csrf
                @method('delete')
                <button type = "submit">Xóa</button>
            </form>
        </table>              
    @endforeach
@endsection
