<main>
  <h2>Edit table</h2>
  <form action="<?= URL ?>To_do_list/editList/<?= $idL ?>" method="post">

    <p>New tabel name</p>
    <input required type="text" name="list_name" value="<?= $list_name ?>">

    <input type="submit" value="Submit">
  </form>
</main>
