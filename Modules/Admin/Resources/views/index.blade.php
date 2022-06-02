@extends('admin::layouts.master')

@section('content')
    @foreach($user as $user)
        <table>
            <br>
            <th>
                {{$user->name}}
            </th>
            <br>
            <th>
                {{$user->email}}
            </th>
            <br>
            <th>
                <form method="post" action="{{route('delete', ['id' => $user->id])}}">
                    @csrf
                    @method('DELETE')
                    <button type = "submit">Xóa</button>
                </form> 
            </th>
        </table>
        
    @endforeach
@endsection
