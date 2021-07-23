@extends('../layout')
@section('heading')
    @include('../components/sidebar')
@endsection
@section('body')
    <div class="container">
        <div class="grobal">
            <div class="grobal--header">
                <h2>Welcome to {{$name}}'s Blog</h2>
            </div>
            <div class="grobal--data">
                @foreach ($blogs as $blog)
                    <div class="grobal--data--item">
                        <h2><a href="/home/{{$blog['id']}}">{{$blog['title']}}</a></h2>
                        <p>{{$blog['description']}}</p>
                        <div class="btnWrapper">
                            <a href="/delete/{{$blog['id']}}">Delete</a>
                            <a href="/edit/{{$blog['id']}}">Edit</a>
                        </div>
                    </div>
                @endforeach
                {{-- <span>{{$blogs -> links()}}</span> --}}
            </div>
        </div>
    </div>
@endsection


