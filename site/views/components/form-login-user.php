


<form hx-post="/do_login"
      hx-trigger="submit">

    <label>Username</label>
    <input name="user" type="text" maxlength="20" required>



    <label>Password</label>
    <input name="pass" type="text" maxlength="20" required>
    <input type="submit" value="Login">
</form>
<button
HX-Refresh="true"
    hx-trigger="click">Back</button>