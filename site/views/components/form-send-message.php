

<?var_dump($id);?>
<form hx-post="/send_message"
      hx-trigger="submit">

    <label>Title</label>
    <input name="title" type="text" required>

    <input type="hidden" name="sender" value="<?= $_SESSION['user']['id'] ?>">

    <input type="hidden" name="target" value="<?= $id ?>">

    <label>Text</label>
    <input name="text" type="text" required>
    <input type="submit" value="Send">