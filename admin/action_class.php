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

		// check if username already exist
		$customer = $this->db->query("SELECT * FROM customers WHERE username = '$username' AND id != '$id' AND deleted_at IS NULL");
		if($customer->num_rows > 0) {
			return 2;
		}
        
		$data = " first_name = '$first_name' ";
		$data .= ", last_name = '$last_name' ";
		$data .= ", password = '$password' ";
		$data .= ", contact_num = '$contact_num' ";
		$data .= ", address = '$address' ";
		$data .= ", email = '$email' ";
		$data .= ", username = '$username' ";
		$data .= ", gender = '$gender' ";

		if($_FILES['image']['tmp_name'] != ''){
			// delete image
			if(file_exists('uploads/profiles/'.$profile_img) && $profile_img != '') {
				unlink('uploads/profiles/'.$profile_img);
			} 

			$img_name = strtotime(date('y-m-d H:i:s')).'_'.$_FILES['image']['name'];
			$move = move_uploaded_file($_FILES['image']['tmp_name'],'uploads/profiles/'. $img_name);
			$data .= ", profile_img = '$img_name' ";
		}
		
		$this->db->query("UPDATE customers set ".$data." WHERE id=".$id);

        return 1;
    }

	public function save_feedback() {
		extract($_POST);
		$data = " customer_id = '$customer_id' ";
		$data .= ", comment = '$comment' ";
		$data .= ", rating = '$rating' ";

		$this->db->query("INSERT INTO feedbacks set ".$data);

		return 0;
	}

	public function update_site_settings() {
		extract($_POST);
		$data = " hotel_name = '$hotel_name' ";
		$data .= ", email = '$email' ";
		$data .= ", contact = '$contact' ";
		$data .= ", about_content = '$about_content' ";

		if($_FILES['image']['tmp_name'] != ''){
			// delete image
			if(file_exists('uploads/cover_photo/'.$img) && $img != '') {
				unlink('uploads/cover_photo/'.$img);
			} 

			$fname = strtotime(date('y-m-d H:i:s')).'_'.$_FILES['image']['name'];
			$move = move_uploaded_file($_FILES['image']['tmp_name'],'uploads/cover_photo/'. $fname);
			$data .= ", cover_img = '$fname' ";
		}
		
		$this->db->query("UPDATE system_settings set ".$data." WHERE id=$id");

		return 0;
	}

	public function delete_appointment() {
		extract($_POST);
		$this->db->query("DELETE FROM appointments where id = ".$id);
		return 1;
	}

	public function delete_services() {
		extract($_POST);
		$this->db->query("DELETE FROM services where id = ".$id);

		// delete image
		if(file_exists('uploads/'.$img) && $img != '') {
			unlink('uploads/'.$img);
		} 
		return 1;
	}

	public function update_services() {
		extract($_POST);
		$data = " name = '$name' ";
		$data .= ", price = '$price' ";
		$data .= ", category_id = '$category_id' ";
		$data .= ", description = '$description' ";

		if($_FILES['image']['tmp_name'] != ''){
			// delete image
			if(file_exists('uploads/'.$img) && $img != '') {
				unlink('uploads/'.$img);
			} 

			$fname = strtotime(date('y-m-d H:i:s')).'_'.$_FILES['image']['name'];
			$move = move_uploaded_file($_FILES['image']['tmp_name'],'uploads/'. $fname);
			$data .= ", img_path = '$fname' ";
		}
		
		$this->db->query("UPDATE services set ".$data." WHERE id=$id");

		return 0;
	}

	public function add_services() {
		extract($_POST);
		$data = " name = '$name' ";
		$data .= ", price = '$price' ";
		$data .= ", category_id = '$category_id' ";
		$data .= ", description = '$description' ";

		if($_FILES['image']['tmp_name'] != ''){
			$fname = strtotime(date('y-m-d H:i:s')).'_'.$_FILES['image']['name'];
			$move = move_uploaded_file($_FILES['image']['tmp_name'],'uploads/'. $fname);
			$data .= ", img_path = '$fname' ";
		}
		
		$this->db->query("INSERT INTO services set ".$data);

		return 0;
	}

	public function add_appointment() {
		extract($_POST);

		// check if weekends
		$weekDay = date('w', strtotime($appointment_date));
		if($weekDay == 0 || $weekDay == 6) {
			return 2;
		}

		// check if time range is correct
		if(strtotime($from_time) > strtotime($to_time)) {
			return 3;
		}

		$data = " customer_id = '$customer_id' ";
		if(isset($services_id)) {
			$data .= ", services_id = '$services_id' ";
		}
		$data .= ", appointment_date = '$appointment_date' ";
		$data .= ", from_time = '$from_time' ";
		$data .= ", to_time = '$to_time' ";
		
		$this->db->query("INSERT INTO appointments set ".$data);

		return 1;
	}

	public function add_products() {
		extract($_POST);
		$data = " name = '$name' ";
		$data .= ", price = '$price' ";
		$data .= ", description = '$description' ";
		$data .= ", category_id = '$category_id' ";
		$data .= ", status = '$status' ";
		
		$this->db->query("INSERT INTO products set ".$data);
	}

	public function add_user() {
		extract($_POST);

		// check if username already exist
		$user = $this->db->query("SELECT * FROM users WHERE username = '$username'");
		if($user->num_rows > 0) {
			return 2;
		}

		$data = " name = '$name' ";
		$data .= ", username = '$username' ";
		$data .= ", password = '$password' ";
		$data .= ", type = '$type' ";
		
		$this->db->query("INSERT INTO users set ".$data);

		return 1;
	}

	public function update_user() {
		extract($_POST);

		// check if username already exist
		$user = $this->db->query("SELECT * FROM users WHERE username = '$username' AND id != '$id'");
		if($user->num_rows > 0) {
			return 2;
		}

		$data = " name = '$name' ";
		$data .= ", username = '$username' ";
		if($password) {
			$data .= ", password = '$password' ";
		}
		$data .= ", type = '$type' ";
		
		$this->db->query("UPDATE users set ".$data." WHERE id=$id");

		return 1;
	}

	public function update_products() {
		extract($_POST);
		$data = " name = '$name' ";
		$data .= ", price = '$price' ";
		$data .= ", description = '$description' ";
		$data .= ", category_id = '$category_id' ";
		$data .= ", status = '$status' ";
		
		$this->db->query("UPDATE products set ".$data." WHERE id=$id");
	}

	public function delete_products() {
		extract($_POST);
		$this->db->query("DELETE FROM products where id = ".$id);
		return 1;
	}

	public function delete_user() {
		extract($_POST);
		$this->db->query("DELETE FROM users where id = ".$id);
		return 1;
	}

	public function update_appointment() {
		extract($_POST);

		// check if weekends
		$weekDay = date('w', strtotime($appointment_date));
		if($weekDay == 0 || $weekDay == 6) {
			return 2;
		}

		// check if time range is correct
		if(strtotime($from_time) > strtotime($to_time)) {
			return 3;
		}

		$data = " customer_id = '$customer_id' ";
		$data .= ", services_id = '$services_id' ";
		$data .= ", appointment_date = '$appointment_date' ";
		$data .= ", from_time = '$from_time' ";
		$data .= ", to_time = '$to_time' ";
		$data .= ", status = '$status' ";
		
		$this->db->query("UPDATE appointments set ".$data." WHERE id=$id");

		return 1;
	}

	public function delete_customer() {
        extract($_POST);
		// delete image
		if(file_exists('uploads/profiles/'.$img) && $img != '') {
			unlink('uploads/profiles/'.$img);
		} 

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
		extract($_POST);

		// check if username already exist
		$customer = $this->db->query("SELECT * FROM customers WHERE username = '$username' AND deleted_at IS NULL");
		if($customer->num_rows > 0) {
			return 2;
		} 
			
		$data = " first_name = '$fname' ";
		$data .= ", last_name = '$lname' ";
		$data .= ", password = '$password' ";
		$data .= ", contact_num = '$contact_num' ";
		$data .= ", address = '$address' ";
		$data .= ", email = '$email' ";
		$data .= ", username = '$username' ";
		$data .= ", gender = '$gender' ";

		if($_FILES['image']['tmp_name'] != ''){
			$img_name = strtotime(date('y-m-d H:i:s')).'_'.$_FILES['image']['name'];
			$move = move_uploaded_file($_FILES['image']['tmp_name'],'uploads/profiles/'. $img_name);
			$data .= ", profile_img = '$img_name' ";
		}
		
		$this->db->query("INSERT INTO customers set ".$data);
		
		return 1;
	
			
    }

}