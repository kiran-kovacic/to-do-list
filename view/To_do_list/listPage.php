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
         <td class="center"><a href="<?= URL ?>To_do_list/editTasksPage/<?= $idL ?>/<?= $task['object_id'] ?>/<?= $task['object_description'] ?>/<?= $task['object_status'] ?>/<?= $list_name ?>">edit</a></td>
         <td class="center"><a href="<?= URL ?>To_do_list/deleteTasks/<?= $idL ?>/<?= $task['object_id'] ?>/<?= $list_name ?>">delete</a></td>
       </tr>
      <?php } ?>
    </tbody>
  </table><br>
  <a href="<?= URL ?>To_do_list/addTaskspage/<?= $idL ?>/<?= $list_name ?>">Add tasks</a>
</main>
<script type="text/javascript">
  const getCellValue = (tr, idx) => tr.children[idx].innerText || tr.children[idx].textContent;
  const comparer = (idx, asc) => (a, b) => ((v1, v2) =>
  v1 !== '' && v2 !== '' && !isNaN(v1) && !isNaN(v2) ? v1 - v2 : v1.toString().localeCompare(v2)
  )(getCellValue(asc ? a : b, idx), getCellValue(asc ? b : a, idx));

  // do the work...
  document.querySelectorAll('th').forEach(th => th.addEventListener('click', (() => {
  const table = th.closest('table');
  Array.from(table.querySelectorAll('tr:nth-child(n+2)'))
      .sort(comparer(Array.from(th.parentNode.children).indexOf(th), this.asc = !this.asc))
      .forEach(tr => table.appendChild(tr) );
  })));
</script>
