<div class="nav">
    <ul>
        <li><a href="/home">Home</a></li>
        @if(session() -> has('logged')&& session('logged')['name'])
            <li><a href="/upload">UploadBlog</a></li>
            <li><a href="/logout">Logout</a></li>
            <li><a href="/">{{session('logged')['name']}}</a></li>   
        @else
            <li><a href="/register">Register</a></li>
            <li><a href="/login">Login</a></li>
        @endif
    </ul>

</div>