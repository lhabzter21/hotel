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

    public function update_customer() {
        extract($_POST);
		$data = " first_name = '$first_name' ";
		$data .= ", last_name = '$last_name' ";
		$data .= ", password = '$password' ";
		$data .= ", contact_num = '$contact_num' ";
		$data .= ", address = '$address' ";
		$data .= ", email = '$email' ";
		$data .= ", username = '$username' ";
		$data .= ", gender = '$gender' ";
		
		$this->db->query("UPDATE customers set ".$data." WHERE id=".$id);

        return 0;
    }

	public function add_appointment() {
		extract($_POST);
		$data = " customer_id = '$customer_id' ";
		$data .= ", services_id = '$services_id' ";
		$data .= ", appointment_date = '$appointment_date' ";
		$data .= ", from_time = '$from_time' ";
		$data .= ", to_time = '$to_time' ";
		
		$this->db->query("INSERT INTO appointments set ".$data);
	}

	public function update_appointment() {
		extract($_POST);
		$data = " customer_id = '$customer_id' ";
		$data .= ", services_id = '$services_id' ";
		$data .= ", appointment_date = '$appointment_date' ";
		$data .= ", from_time = '$from_time' ";
		$data .= ", to_time = '$to_time' ";
		$data .= ", status = '$status' ";
		
		$this->db->query("UPDATE appointments set ".$data." WHERE id=$id");
	}

	public function delete_customer() {
        extract($_POST);
		$date_today = date('Y-m-d H:i:s');
		$this->db->query("UPDATE customers set `deleted_at` = '$date_today' WHERE id=$id");

        return 0;
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