<?php

ob_start();
$action = $_GET['action'];
include 'action_class.php';
$crud = new Action();

if($action == 'register'){
	$res = $crud->register();
	echo json_encode($res);
}

if($action == 'login'){
	$login = $crud->login();
	if($login)
	echo $login;
}

if($action == 'logout'){
	$logout = $crud->logout();
	if($logout)
	echo $logout;
}

if($action == "save_checkout"){
	$res = $crud->save_checkout();
	if($res)
	echo $res;
}

if($action == "save_check_in"){
	$res = $crud->save_check_in();
	if($res)
	echo $res;
}
