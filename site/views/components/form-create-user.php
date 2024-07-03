<form hx-post="/do_register"
      hx-trigger="submit">

    <label>Username</label>
    <input name="user" type="text" required>



    <label>Password</label>
    <input name="pass" type="text" required>

    <label>Type</label>
    <select name="type" required> <option value="1">Casual</option>
    <option value="2">Competitive</option>
    </select>

    <label>Continent</label>
    <select name="continent" required> <option value="1">Oceania</option>
    <option value="2">Asia</option>
    <option value="3">Africa</option>
    <option value="4">Europe</option>
    <option value="5">North America</option>
    <option value="6">South America</option>
    </select>

    <label>Preferences</label>
    <input name="preference" type="text" required>

    <label>Description</label>
    <input name="desc" type="text" required>

    <input type="submit" value="Sign Up!">