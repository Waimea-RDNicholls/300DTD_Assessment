<!-- Send message form -->
<form autocomplete="off"
    hx-post="/send_message"
    hx-trigger="submit">

  <label>Title</label>
  <input name="title" type="text" maxlength="30" required>

  <input type="hidden" name="sender" value="<?= $_SESSION['user']['id'] ?>">

  <input type="hidden" name="target" value="<?= $id ?>">

  <label>Text</label>
  <input name="text" type="text" maxlength="250" required>
  <input type="submit" value="Send">
  





    <?php
    // Check page history. Given only two ways to get to this form, if user did not come from filter, return to message list.
    if ($_SESSION['page'] == "https://dt.waimea.school.nz/~rdnicholls/300DTD/300DTD_Assessment/site/filter") {
    echo '<button hx-get="/filterlist"
    hx-trigger="click"
    hx-target="#view-filter"
    hx-swap="innerHTML">Back</button>';
    }
    else {
    echo '<button hx-get="/messagelist"
    hx-trigger="click"
    hx-target="#view-messages"
    hx-swap="innerHTML">Back</button>';
    }
  