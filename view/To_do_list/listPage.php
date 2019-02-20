<main>
  <h2><?= $idL ?></h2>
  <table id="myTable">
    <thead>
      <tr>
        <th>Task</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
      foreach ($tasks as $task) {
     ?>
     <tr>
       <td><?= $task['task'] ?></td>
       <td><?= $task['status'] ?></td>
       <td class="center"><a href="<?= URL ?>To_do_list/editPatientPage/<?= $patient['patient_id'] ?>">edit</a></td>
       <td class="center"><a href="<?= URL ?>To_do_list/deletePatients/<?= $patient['patient_id'] ?>">delete</a></td>
     </tr>
    <?php } ?>
    </tbody>
  </table><br>
  <a href="<?= URL ?>To_do_list/addTaskspage/<?= $idL ?>">Add tasks</a>
</main>
