<?php
function getAllTables()
{
  $db = openDatabaseConnection();
  $sql = "SHOW TABLES";
  $query = $db->prepare($sql);
  $query->execute();

  $db = null;
  return $query->fetchAll();
}

function getTable($idL)
{
    $db = openDatabaseConnection();
    $sql = "SELECT * FROM $idL";
    $query = $db->prepare($sql);
    $query->execute(array(
        ":idL" => $idL
    ));

    $db = null;
    return $query->fetchAll();
}

function createTable()
{
    $list_name = ucwords($_POST["list_name"]);
    if ($list_name === null) {
        return false;
        exit();
    }
    $db = openDatabaseConnection();
    $sql = "CREATE TABLE IF NOT EXISTS $list_name (
            `task_id` int(11) NOT NULL AUTO_INCREMENT,
	          `task` varchar(200) NOT NULL,
            `status` int(20) NOT NULL,
	           PRIMARY KEY (`task_id`)
           ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";
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
  $sql = "INSERT INTO $idL (`task`, `status`)
  VALUES (:task, :status)";
  $query = $db->prepare($sql);
  $query->execute(array(
      ":task" => $task,
      ":status" => $status,
  ));

  $db = null;
  return true;
}

function deleteTable($idL)
{
    if ($idL === '') {
        return false;
        exit();
    }
    $db = openDatabaseConnection();
    $sql = "DROP TABLE $idL";
    $query = $db->prepare($sql);
    $query->execute(array(
        ":idL" => $idL
    ));

    $db = null;
    return true;
}

function deleteTask($idL, $idK)
{
    if ($idL === '' || $idK === '') {
        return false;
    }
    $db = openDatabaseConnection();
    $sql = "DELETE FROM $idL WHERE task_id = $idK";
    $query = $db->prepare($sql);
    $query->execute(array(
        ":idL" => $idL,
        ":idK" => $idK
    ));

    $db = null;
    return true;
}

function editTableName($idL)
{
    $tableName = ucwords($_POST["table_name"]);
    if ($tableName === null) {
        return false;
        exit();
    }
    $db = openDatabaseConnection();
    $sql = "RENAME TABLE $idl TO $tableName";
    $query = $db->prepare($sql);
    $query->execute(array(
      ":tableName" => $tableName,
    ));

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
