@extends('../layout')
@section('body')
    <div class="card">
        <div class="card--main">
            <h3>Editing Blog</h3>
            <form action="/edit" method="POST" enctype="multipart/form-data" >
                @csrf
                <input type="hidden" name="id" value="{{$blog['id']}}">
                <label for="title">Title</label>
                <input value="{{$blog['title']}}" type="text" id="title" name="title" placeholder="Pleaser enter your Blog Title">
                <label for="description">Description</label>
                <input value="{{$blog['description']}}" type="text" id="description" name="description" placeholder="Pleaser enter your Blog Description">
                {{-- <input type="file" name="file"> --}}
                <button type="submit">Update</button>
            </form>
            <a href="/">Cancel</a>
        </div>
    </div>
@endsection