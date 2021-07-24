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
                @if (count($blogs) >0)
                    @foreach ($blogs as $blog)
                        <div class="grobal--data--item">

                            <a href="/home/{{$blog['id']}}"><img src="{{asset('images/'.$blog->image_path)}}" alt="cover_image"></a>
                            <div class="wrapper">
                                <h2><a href="/home/{{$blog['id']}}">{{$blog['title']}}</a>
                                    <span>(posted by {{$blog -> user -> name}}) </span>
                                </h2>
                                <p>{!!Str::limit($blog['description'], 150, '...')!!}</p>
                            </div>
                            <div class="btnWrapper">
                                <button><a href="/edit/{{$blog['id']}}">Edit</a></button>
                                <button><a href="/delete/{{$blog['id']}}">Delete</a></button>
                            </div>
                        </div>
                    @endforeach
                    <span>{{$blogs -> links()}}</span>
                @else
                    <h2>No Post</h2>
                @endif
            </div>
        </div>
    </div>
@endsection


