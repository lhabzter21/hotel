<?php

session_start();

class Action {
    private $db;

	public function __construct() {
		ob_start();
   	    include 'db_connect.php';
    
        $this->db = $conn;
	}

	public function __destruct() {
	    $this->db->close();
	    ob_end_flush();
	}

    public function register() {
        $requests = $_POST;
        $validate = $this->validation($requests);

        if(count($validate) > 0) {
            return [
                'success' => 0,
                'data' => $validate
            ];
        }

        extract($_POST);
		$data = " first_name = '$fname' ";
		$data .= ", last_name = '$lname' ";
		$data .= ", password = '$password' ";
		$data .= ", contact_num = '$contact_num' ";
		$data .= ", address = '$address' ";
		$data .= ", email = '$email' ";
		$data .= ", gender = '$gender' ";
		
		$this->db->query("INSERT INTO customers set ".$data);
		
        return [
            'success' => 1,
            'data' => []
        ];
    }

    // returning of empty post requests
    private function validation($requests) {
        $empty_arr = [];
        foreach($requests as $index => $value ) {
            if($value == '') {
                array_push($empty_arr, $index);
            }
        }

        return $empty_arr;
    }
}