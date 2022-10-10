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

    function login(){
		extract($_POST);

        // admin and staff login
		$qry = $this->db->query("SELECT * FROM users where username = '".$username."' and password = '".$password."' ");
		if($qry->num_rows > 0){
			foreach ($qry->fetch_array() as $key => $value) {
				if($key != 'passwors' && !is_numeric($key))
					$_SESSION['login_'.$key] = $value;
			}
			if($_SESSION['login_type'] == 1)
				return 1;
			else
				return 2;
		}else{
            // client login
			$qry2 = $this->db->query("SELECT * FROM customers where username = '".$username."' and password = '".$password."' ");

            if($qry2->num_rows > 0){
                $extract = $qry2->fetch_array();
                $_SESSION['login_name'] =  $extract['first_name']. ' '. $extract['last_name'];
                $_SESSION['login_type'] =  3;
                $_SESSION['login_id'] =  $extract['id'];

                return 3;
                
            } else {
                return 4;
            }

		}
	}

    function logout(){
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("Location: index.php");
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
		$data .= ", username = '$username' ";
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