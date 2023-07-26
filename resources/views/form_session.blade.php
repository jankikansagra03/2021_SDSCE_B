<form action="session_store" method="post">
    @csrf
    Username:: <input type="text" name="uname" />
    <br>
    password:: <input type="text" name="pwd" id="pwd1">
    <br>
    <input type="submit" value="Login">
</form>
