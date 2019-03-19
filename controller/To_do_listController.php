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

function editLists($idL, $list_name)
{
	render("To_do_list/editList", array(
		'idL'				=> $idL,
		'list_name'	=> $list_name)
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

function editTasksPage($idL, $task_id, $task_description, $task_status, $list_name)
{
  render("To_do_list/editTaskPage" , array(
    'idL' 							=> $idL,
		'task_id'						=> $task_id,
		'task_description'	=> $task_description,
		'task_status'				=> $task_status,
		'list_name'					=> $list_name)
  );
}

function editTasks($idL, $task_id, $list_name)
{
    if (editTask($task_id)) {
        header("location:" . URL . "To_do_list/showList/$idL/$list_name");
        exit();
    } else {
        //er is iets fout gegaan..
        header("location:" . URL . "error/error_delete");
        exit();
    }
}
