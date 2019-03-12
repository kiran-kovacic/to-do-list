<?php

require(ROOT . "model/To_do_listModel.php");

function index()
{
	$tables = getAllTableNames();

	render("To_do_list/index", array(
		'tables' => $tables)
	);
}

function showList($idL, $list_name)
{
	$tasks = getTableName($idL);

	render("To_do_list/listPage", array(
		'tasks' 		=> $tasks,
		'idL'				=> $idL,
		'list_name'	=> $list_name)
	);
}

function create()
{
	render("To_do_list/create", array()
	);
}

function createLists()
{
	if (createList()) {
		header("location:" . URL . "To_do_list/index");
		exit();
	} else {
		header("location:" . URL . "error/error_db");
		exit();
	}
}

function addTaskspage($idL, $list_name)
{
	render("To_do_list/tasks", array(
		'idL'				=> $idL,
		'list_name'	=> $list_name)
	);
}

function addTasks($idL, $list_name)
{
	if (addTask($idL)) {
		header("location:" . URL . "To_do_list/showList/$idL/$list_name");
		exit();
	} else {
		header("location:" . URL . "error/error_db");
		exit();
	}
}

function deleteLists($idL)
{
  if (deleteList($idL)) {
      header("location:" . URL . "To_do_list/index/$idL");
      exit();
  } else {
      header("location:" . URL . "error/error_delete");
      exit();
  }
}

function deleteTasks($idL, $idT, $list_name)
{
  if (deleteTask($idT)) {
      header("location:" . URL . "To_do_list/showList/$idL/$list_name");
      exit();
  } else {
      header("location:" . URL . "error/error_delete");
      exit();
  }
}

function editLists($idL)
{
	render("To_do_list/editList", array(
		'idL'		=> $idL)
	);
}

function editList($idL)
{
	if (editListName($idL)) {
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
