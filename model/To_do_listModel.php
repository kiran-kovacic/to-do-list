<?php
function getAllTableNames()
{
  $db = openDatabaseConnection();
  $sql = "SELECT `list_id`, `list_name` FROM `lists`";
  $query = $db->prepare($sql);
  $query->execute();

  $db = null;
  return $query->fetchAll();
}

function getTableName($idL)
{
    $db = openDatabaseConnection();
    $sql = "SELECT `object_description`, `object_status`, `object_id` FROM `objects` WHERE `list_id` = :idL";
    $query = $db->prepare($sql);
    $query->execute(array(
        ":idL" => $idL
    ));

    $db = null;
    return $query->fetchAll();
}

function createList()
{
    $list_name = ucwords($_POST["list_name"]);
    if ($list_name === null) {
        return false;
        exit();
    }
    $db = openDatabaseConnection();
    $sql = "INSERT INTO `lists` (`list_name`)
    VALUES (:list_name)";
    $query = $db->prepare($sql);
    $query->execute(array(
        ":list_name" => $list_name,
    ));

    $db = null;
    return true;
}

function addTask($idL)
{
  $task = ucwords($_POST["task"]);
  $status = ucwords($_POST["status"]);
  if ($task === null || $status === null) {
      return false;
      exit();
  }
  $db = openDatabaseConnection();
  $sql = "INSERT INTO `objects` (`object_description`, `object_status`, `list_id`)
  VALUES (:task, :status, :idL)";
  $query = $db->prepare($sql);
  $query->execute(array(
      ":task" => $task,
      ":status" => $status,
      ":idL" => $idL
  ));

  $db = null;
  return true;
}

function deleteList($idL)
{
  if ($idL === null) {
      return false;
      exit();
  }
  $db = openDatabaseConnection();
  $sql = "DELETE `lists` , `objects` FROM `lists` INNER JOIN `objects`
          WHERE `lists`.`list_id` = `objects`.`list_id` and `lists`.`list_id` = :idL";
  $query = $db->prepare($sql);
  $query->execute(array(
      ":idL" => $idL
  ));

  $db = null;
  return true;
}

function deleteTask($idT)
{
    if ($idT === null) {
        return false;
        exit();
    }
    $db = openDatabaseConnection();
    $sql = "DELETE FROM `objects` WHERE `object_id` = :idT";
    $query = $db->prepare($sql);
    $query->execute(array(
        ":idT" => $idT
    ));

    $db = null;
    return true;
}

function editListName($idL)
{
    $newTableName = ucwords($_POST["list_name"]);
    if ($newTableName === null || $idL === null) {
        return false;
        exit();
    }
    $db = openDatabaseConnection();
    $sql = "UPDATE `lists` SET list_name = :newTableName WHERE list_id = :idL";
    $query = $db->prepare($sql);
    $query->execute(array(
        ":newTableName" => $newTableName,
        ":idL" => $idL,
    ));

    $db = null;
    return true;
}

function editTask($task_id)
{
    $task = ucwords($_POST["task"]);
    $status = ucwords($_POST["status"]);
    if ($task === null || $status === null) {
        return false;
        exit();
    }
    $db = openDatabaseConnection();
    $sql = "UPDATE `objects` SET object_description = :task, object_status = :status WHERE object_id = :task_id";
    $query = $db->prepare($sql);
    $query->execute(array(
        ":task" => $task,
        ":status" => $status,
        ":task_id" => $task_id,
    ));

    $db = null;
    return true;
}
