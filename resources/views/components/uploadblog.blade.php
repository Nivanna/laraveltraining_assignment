<div class="card">
    <div class="card--main">
        <h3>Upload Blog</h3>
        <form action="upload" method="POST" enctype="multipart/form-data" >
            @csrf
            <label for="title">Title</label>
            <input type="text" id="title" name="title" placeholder="Pleaser enter your Blog Title">
            <label for="description">Description</label>
            <input type="text" id="description" name="description" placeholder="Pleaser enter your Blog Description">
            {{-- <input type="file" name="file"> --}}
            <button type="submit">Upload</button>
        </form>
        <a href="/home">Cancel</a>
    </div>
</div>