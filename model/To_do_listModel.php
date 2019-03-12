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
    $newTableName = ucwords($_POST["table_name"]);
    if ($newTableName === null || $idL === null) {
        return false;
        exit();
    }
    $db = openDatabaseConnection();
    $sql = "RENAME TABLE $idl TO $newTableName";
    $query = $db->prepare($sql);
    $query->execute();

    $db = null;
    return true;
}

function editSpecie($idS)
{
    $species_description = isset($_POST["species_description"]) ? $_POST["species_description"] : null;

    if ($species_description === null) {
      return false;
      exit();
  }

    $db = openDatabaseConnection();

    $sql = "UPDATE `species`
        SET species_description = :species_description
        WHERE species_id = :idS";

    $query = $db->prepare($sql);
    $query->execute(array(
        ":species_description" => $species_description,
        ":idS" => $idS,
    ));

    $db = null;
    return true;
}

function editPatient($idP)
{
    $petName = ucwords($_POST["pet_name"]);
    $patient_name = isset($petName) ? $petName : null;
    $client_id = isset($_POST["client_id"]) ? $_POST["client_id"] : null;
    $gender_id = isset($_POST["gender_id"]) ? $_POST["gender_id"] : null;
    $species_id = isset($_POST["specie_id"]) ? $_POST["specie_id"] : null;
    $patient_status = isset($_POST["patient_status"]) ? $_POST["patient_status"] : null;

    if ($patient_name === null || $client_id === null || $gender_id === null || $species_id === null || $patient_status === null) {
      return false;
      exit();
    }

    $db = openDatabaseConnection();

    $sql = "UPDATE `patients`
        SET patient_name = :patient_name, client_id = :client_id, gender_id = :gender_id, species_id = :species_id, patient_status = :patient_status
        WHERE patient_id = :idP";

    $query = $db->prepare($sql);
    $query->execute(array(
        ":patient_name" => $patient_name,
        ":client_id" => $client_id,
        ":gender_id" => $gender_id,
        ":species_id" => $species_id,
        ":patient_status" => $patient_status,
        ":idP" => $idP,
    ));

    $db = null;
    return true;
}
