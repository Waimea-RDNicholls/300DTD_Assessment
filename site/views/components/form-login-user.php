<!--Login form -->
<form autocomplete="off"
    hx-post="/do_login"
    hx-trigger="submit">

  <label>Username</label>
  <input name="user" type="text" maxlength="20" required>



  <label>Password</label>
  <input name="pass" type="password" maxlength="20" required>
  <input type="submit" value="Login">
</form>

<!-- Back button -->
<button
    hx-get="/refresh"
    hx-trigger="click">Back</button>