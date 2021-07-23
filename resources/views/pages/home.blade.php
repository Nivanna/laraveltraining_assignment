@extends('../layout')
@section('heading')
    @include('../components/sidebar')
@endsection
@section('body')
    <div class="container">
        <div class="grobal">
            <div class="grobal--header">
                <h2>Welcome to Our Blog</h2>
            </div>
            <div class="grobal--data">
                @foreach ($blogs as $blog)
                    <div class="grobal--data--item">
                        <h2><a href="/home/{{$blog['id']}}">{{$blog['title']}}</a></h2>
                        <p>{{$blog['description']}}</p>
                    </div>
                @endforeach
                <span>{{$blogs -> links()}}</span>
            </div>
        </div>
    </div>
@endsection