<main>
  <h2><?= $list_name ?></h2>
  <table id="myTable">
    <form action="<?= URL ?>To_do_list/showStatus/<?= $idL ?>/<?= $list_name ?>" method="post">
      <select required name="status">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
      </select>
      <input type="submit" value="get">
    </form>
    <thead>
      <tr>
        <th onclick="sortMyTable(), console.log('1')">Status</th>
        <th>Task</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach ($tasks as $task) {
       ?>
       <tr>
         <td><?= $task['object_status'] ?></td>
         <td><?= $task['object_description'] ?></td>
         <td class="center"><a href="<?= URL ?>To_do_list/editTasksPage/<?= $idL ?>/<?= $task['object_id'] ?>/<?= $task['object_description'] ?>/<?= $task['object_status'] ?>/<?= $list_name ?>">edit</a></td>
         <td class="center"><a href="<?= URL ?>To_do_list/deleteTasks/<?= $idL ?>/<?= $task['object_id'] ?>/<?= $list_name ?>">delete</a></td>
       </tr>
      <?php } ?>
    </tbody>
  </table><br>
  <a href="<?= URL ?>To_do_list/addTaskspage/<?= $idL ?>/<?= $list_name ?>">Add tasks</a>
</main>
<script type="text/javascript">
  function sortMyTable() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.getElementById("myTable");
    switching = true;
    while (switching) {
      switching = false;
      rows = table.rows;
      for (i = 1; i < (rows.length - 1); i++) {
        shouldSwitch = false;
        x = rows[i].getElementsByTagName("TD")[0];
        y = rows[i + 1].getElementsByTagName("TD")[0];
        if (Number(x.innerHTML) > Number(y.innerHTML)) {
          shouldSwitch = true;
          break;
        }
      }
      if (shouldSwitch) {
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
      }
    }
  }
</script>
