<main>
  <h2>Edit clients</h2>
  <form action="<?= URL ?>To_do_list/editTable/<?= $idL ?>" method="post">

    <p>Table name</p>
    <input required type="text" name="table_name" value="<?= $idL ?>">

    <input type="submit" value="Submit">
  </form>
</main>
