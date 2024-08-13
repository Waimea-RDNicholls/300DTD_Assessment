<form   hx-put="/do_edit/<?= $id ?>"
        hx-trigger="submit"
        hx-target="#userinfo">





    <label>Type</label>
    <?php
    require_once 'lib/db.php';
    $db = connectToDB();
    $query = 'SELECT description, preferences FROM users WHERE id = ?';

    try {
        $stmt = $db->prepare($query);
        $stmt->execute([$id]);
        $user = $stmt->fetch();
    }   
    catch (PDOException $e) {
        consoleLog($e->getMessage(), 'DB Connect', ERROR);
        die('There was an error when connecting to the database');
    }


        $preferences = $user['preferences'];
        $desc = $user['description'];
        ?>
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

    <label>Boardgame</label>
    <input name="preference" type="text" maxlength="40" required value="<?=$preferences  ?>">

    <label>Description</label>
    <input name="desc" type="text" maxlength="200" required value="<?=$desc  ?>">

    <input type="submit" value="Edit">

    <button hx-get="/userdetails"
    hx-trigger="click"
    hx-target="#view-details"
    hx-swap="innerHTML">Back</button>