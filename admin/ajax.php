<?php

ob_start();
$action = $_GET['action'];
include 'action_class.php';
$crud = new Action();

if($action == 'register'){
	$res = $crud->register();
	echo json_encode($res);
}