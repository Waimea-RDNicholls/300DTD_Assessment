<form hx-post="/do_register"
      hx-trigger="submit">

    <label>Username</label>
    <input name="user" type="text" required>



    <label>Password</label>
    <input name="pass" type="text" required>

    <label>Type</label>
    <input name="type" type="int" required>

    <label>Continent</label>
    <input name="continent" type="int" required>

    <label>Preferences</label>
    <input name="preference" type="text" required>

    <label>Description</label>
    <input name="desc" type="text" required>

    <input type="submit" value="Sign Up!">