<?php

require(ROOT . "model/To_do_listModel.php");

// deze functie renderd de index pagina.
function index()
{
	$tables = getAllTableNames();

	render("To_do_list/index", array(
		'tables' => $tables)
	);
}

// deze functie laat een gekozen lijst zien met alle tasks en renderd daarna de listPage pagina.
function showList($idL, $list_name)
{
	$tasks = getTableName($idL);

	render("To_do_list/listPage", array(
		'tasks' 		=> $tasks,
		'idL'				=> $idL,
		'list_name'	=> $list_name)
	);
}

// deze functie renderd de create pagina.
function create()
{
	render("To_do_list/create", array()
	);
}

// deze functie voert eerst de createList functie uit en renderd daarna de index pagina of de error_db pagina.
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

// deze functie renderd tasks pagina.
function addTaskspage($idL, $list_name)
{
	render("To_do_list/tasks", array(
		'idL'				=> $idL,
		'list_name'	=> $list_name)
	);
}

// deze functie voert eerst de addTask functie uit en renderd daarna de showlist pagina of de error_db pagina.
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

// deze functie voert eerst de deleteList functie uit en renderd daarna de index pagina of de error_db pagina.
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

// deze functie voert eerst de deleteTask functie uit en renderd daarna de showList pagina of de error_db pagina.
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

// deze functie renderd de editList pagina.
function editLists($idL, $list_name)
{
	render("To_do_list/editList", array(
		'idL'				=> $idL,
		'list_name'	=> $list_name)
	);
}

// deze functie voert eerst de editList functie uit en renderd daarna de index pagina of de error_db pagina.
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

// deze functie renderd de editTaskPage pagina.
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

// deze functie voert eerst de editTasks functie uit en renderd daarna de showList pagina of de error_db pagina.
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
