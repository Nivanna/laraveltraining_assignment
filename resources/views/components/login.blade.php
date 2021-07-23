<div class="card">
    <div class="card--main">
        <h3>Login</h3>
        <form action="login" method="POST">
            @csrf
            <label for="useremail">Useremail</label>
            <input type="text" id="useremail" name="useremail" placeholder="Pleaser enter your email">
            <label for="userpassword">Userpassword</label>
            <input type="text" id="userpassword" name="userpassword" placeholder="Pleaser enter your password">
            <span><a href="register">Don't have account</a></span>
            <button type="submit">Login</button>
        </form>
    </div>
</div>