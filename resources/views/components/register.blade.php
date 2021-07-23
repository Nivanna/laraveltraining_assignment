<div class="card">
    <div class="card--main">
        <h3>Register</h3>
        <form action="register" method="POST">
            @csrf
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Pleaser enter your name">
            <label for="useremail">Useremail</label>
            <input type="text" id="useremail" name="useremail" placeholder="Pleaser enter your email">
            <label for="userpassword">Userpassword</label>
            <input type="text" id="userpassword" name="userpassword" placeholder="Pleaser enter your password">
            <span><a href="login">Already have account</a></span>
            <button type="submit">Register</button>
        </form>
    </div>
</div>