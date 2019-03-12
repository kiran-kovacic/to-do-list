<main>
  <h2><?= $list_name ?></h2>
  <table id="myTable">
    <thead>
      <tr>
        <th>Task</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php
      foreach ($tasks as $task) {
     ?>
     <tr>
       <td><?= $task['object_description'] ?></td>
       <td><?= $task['object_status'] ?></td>
       <td class="center"><a href="<?= URL ?>To_do_list/editPatientPage/<?= $patient['patient_id'] ?>">edit</a></td>
       <td class="center"><a href="<?= URL ?>To_do_list/deleteTasks/<?= $idL ?>/<?= $task['object_id'] ?>/<?= $list_name ?>">delete</a></td>
     </tr>
    <?php } ?>
    </tbody>
  </table><br>
  <a href="<?= URL ?>To_do_list/addTaskspage/<?= $idL ?>/<?= $list_name ?>">Add tasks</a>
</main>
