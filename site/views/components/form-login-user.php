<form autocomplete="off"
     hx-post="/do_login"
      hx-trigger="submit">

    <label>Username</label>
    <input name="user" type="text" maxlength="20" required>



    <label>Password</label>
    <input name="pass" type="password" maxlength="20" required>
    <input type="submit" value="Login">
</form>
<button
    hx-get="/refresh"
    hx-trigger="click">Back</button>