@extends('../layout')
@section('heading')
    @include('../components/sidebar')
@endsection
@section('body')
    <div class="container">
        <div class="grobal">
           {{$blog}}
        </div>
    </div>
@endsection