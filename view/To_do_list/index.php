<main>
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
       <td><a href="<?= URL ?>To_do_list/showList/<?= $table['list_id'] ?>/<?= $table['list_name'] ?>"><?= $table['list_name'] ?></a></td>
       <td class="center"><a href="<?= URL ?>To_do_list/editLists/<?= $table['list_id'] ?>">edit</a></td>
       <td class="center"><a href="<?= URL ?>To_do_list/deleteLists/<?= $table['list_id'] ?>">delete</a></td>
     </tr>
    <?php } ?>
    </tbody>
  </table>
</main>
