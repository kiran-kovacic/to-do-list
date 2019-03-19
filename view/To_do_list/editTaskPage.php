<main>
  <h2>Edit Task</h2>
  <form action="<?= URL ?>To_do_list/editTasks/<?= $idL ?>/<?= $task_id ?>/<?= $list_name ?>" method="post">
    <textarea required name="task" rows="4" cols="50"><?= $task_description ?></textarea><br>
    <p>Status</p>
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
    <input type="submit" value="Submit">
  </form>
</main>
