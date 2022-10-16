<?php

ob_start();
$action = $_GET['action'];
include 'action_class.php';
$crud = new Action();

if($action == 'register'){
	$res = $crud->register();
	echo $res;
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

if($action == 'update_customer'){
	$res = $crud->update_customer();
	if($res)
	echo $res;
}

if($action == 'delete_customer'){
	$res = $crud->delete_customer();
	if($res)
	echo $res;
}

if($action == 'add_appointment'){
	$res = $crud->add_appointment();
	if($res)
	echo $res;
}

if($action == 'update_appointment'){
	$res = $crud->update_appointment();
	if($res)
	echo $res;
}

if($action == 'delete_appointment'){
	$res = $crud->delete_appointment();
	if($res)
	echo $res;
}

if($action == 'add_services'){
	$res = $crud->add_services();
	if($res)
	echo $res;
}

if($action == 'delete_services'){
	$res = $crud->delete_services();
	if($res)
	echo $res;
}

if($action == 'update_services'){
	$res = $crud->update_services();
	if($res)
	echo $res;
}

if($action == 'add_products'){
	$res = $crud->add_products();
	if($res)
	echo $res;
}

if($action == 'update_products'){
	$res = $crud->update_products();
	if($res)
	echo $res;
}

if($action == 'delete_products'){
	$res = $crud->delete_products();
	if($res)
	echo $res;
}

if($action == 'add_user'){
	$res = $crud->add_user();
	if($res)
	echo $res;
}

if($action == 'update_user'){
	$res = $crud->update_user();
	if($res)
	echo $res;
}

if($action == 'delete_user'){
	$res = $crud->delete_user();
	if($res)
	echo $res;
}

if($action == 'update_site_settings'){
	$res = $crud->update_site_settings();
	if($res)
	echo json_encode($res);
}

if($action == 'save_feedback'){
	$res = $crud->save_feedback();
	if($res)
	echo $res;
}