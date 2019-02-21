<?php

require(ROOT . "model/To_do_listModel.php");

function index()
{
	$tables = getAllTables();

	render("To_do_list/index", array(
		'tables' => $tables)
	);
}

function showList($idL)
{
	$tasks = getTable($idL);

	render("To_do_list/listPage", array(
		'tasks' => $tasks,
		'idL'		=> $idL)
	);
}

function create()
{
	render("To_do_list/create", array()
	);
}

function createTables()
{
	if (createTable()) {
		header("location:" . URL . "To_do_list/index");
		exit();
	} else {
		header("location:" . URL . "error/error_db");
		exit();
	}
}

function addTaskspage($idL)
{
	render("To_do_list/tasks", array(
		'idL'		=> $idL)
	);
}

function addTasks($idL)
{
	if (addTask($idL)) {
		header("location:" . URL . "To_do_list/showList/$idL");
		exit();
	} else {
		header("location:" . URL . "error/error_db");
		exit();
	}
}

function deleteTables($idL)
{
  if (deleteTable($idL)) {
      header("location:" . URL . "To_do_list/index");
      exit();
  } else {
      header("location:" . URL . "error/error_delete");
      exit();
  }
}

function deleteTasks($idL, $idK)
{
  if (deleteTask($idL, $idK)) {
      header("location:" . URL . "To_do_list/showList/$idL");
      exit();
  } else {
      header("location:" . URL . "error/error_delete");
      exit();
  }
}

function editTables($idL)
{
	render("To_do_list/editTable", array(
		'idL'		=> $idL)
	);
}

function editTable($idL)
{
	if (editTableName($idL)) {
      header("location:" . URL . "To_do_list/index");
      exit();
  } else {
      header("location:" . URL . "error/error_db");
      exit();
  }
}

function editClients($idC)
{
    if (editClient($idC)) {
        header("location:" . URL . "Hospital/clients");
        exit();
    } else {
        header("location:" . URL . "error/error_delete");
        exit();
    }
}

function editSpeciesPage($idS)
{
    $species = getSpecie($idS);
    render("hospital/editSpecie" , array(
        'species' => $species,
    ));
}
function editSpecies($idC)
{
    if (editspecie($idC)) {
        header("location:" . URL . "hospital/species");
        exit();
    } else {
        //er is iets fout gegaan..
        header("location:" . URL . "error/error_delete");
        exit();
    }
}

function editPatients($idP)
{
    if (editPatient($idP)) {
        header("location:" . URL . "Hospital/index");
        exit();
    } else {
        //er is iets fout gegaan..
        header("location:" . URL . "error/error_delete");
        exit();
    }
}
