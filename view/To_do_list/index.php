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
       <td class="center"><a href="<?= URL ?>To_do_list/editPatientPage/<?= $patient['patient_id'] ?>">edit</a></td>
       <td class="center"><a href="<?= URL ?>To_do_list/deletePatients/<?= $patient['patient_id'] ?>">delete</a></td>
     </tr>
    <?php } ?>
    </tbody>
  </table>
</main>
