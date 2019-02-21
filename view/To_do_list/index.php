<main>
  <h2>Patiënts</h2>
  <table id="myTable">
    <thead>
      <tr>
        <th>List-name</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
      foreach ($tables as $table) {
     ?>
     <tr>
       <td><a href="<?= URL ?>To_do_list/showList/<?= $table['Tables_in_to_do_list'] ?>"><?= $table['Tables_in_to_do_list'] ?></a></td>
       <td class="center"><a href="<?= URL ?>To_do_list/editTables/<?= $table['Tables_in_to_do_list'] ?>">edit</a></td>
       <td class="center"><a href="<?= URL ?>To_do_list/deleteTables/<?= $table['Tables_in_to_do_list'] ?>">delete</a></td>
     </tr>
    <?php } ?>
    </tbody>
  </table>
</main>
