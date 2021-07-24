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
                <textarea id="description" name="description" cols="30" rows="10">{!!$blog['description']!!}</textarea>
                <input type="file" name="image" value="hlleo">
                <button type="submit">Update</button>
            </form>
            <a href="/">Cancel</a>
        </div>
    </div>
@endsection
@section('script')
    <script>
        ClassicEditor
            .create( document.querySelector( '#description' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection