@extends('../layout')
@section('heading')
    @include('../components/sidebar')
@endsection
@section('body')
    <div class="container">
        <div class="grobal">
           <div class="data--container">
               <img src="{{asset('images/'.$blog['image_path'])}}" alt="cover_image">
               <h3>{{$blog['title']}} </h3>
               <span>( posted by {{$blog -> user -> name}} )</span>
               <p>{!!$blog['description']!!}</p>
               <a href="{{url() -> previous()}}">GoBack</a>
               @if (session('logged'))
                    @if (session('logged')['user_id'] == $blog['user_id'])
                        <div class="data--container-btn">
                            <button><a href="/edit/{{$blog['id']}}">Edit</a></button>
                            <button><a href="/delete/{{$blog['id']}}">Delete</a></button>
                        </div>
                    @endif
               @endif
           </div>
        </div>
    </div>
@endsection