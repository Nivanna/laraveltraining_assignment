@extends('../layout')
@section('body')
    <div class="card">
        <div class="card--main">
            <h3>Upload Blog</h3>
            <form action="upload" method="POST" enctype="multipart/form-data" >
                @csrf
                <label for="title">Title</label>
                <input type="text" id="title" name="title" placeholder="Pleaser enter your Blog Title">
                <label for="description">Description</label>
                <textarea id="description" name="description" cols="30" rows="10">Description</textarea>
                <input type="file" name="image" id="file_input">
                <button type="submit">Upload</button>
            </form>
            <a href="/">Go Back</a>
        </div>
    </div>
    @if (Session::has('addPost'))
        <script>
            swal('Congratulation!', 'Adding Success', 'success', {button: 'OK'});
        </script>
    @endif
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