<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath .'/../config/database.php');
include_once($filepath .'/../helper/format.php');

class CustomerController
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm= new Format();
    }
    public function create_customer($data){
        $name = mysqli_real_escape_string($this->db->link,$data['name']);
        $phone = mysqli_real_escape_string($this->db->link,$data['phone']);
        $email = mysqli_real_escape_string($this->db->link,$data['email']);
        $address = mysqli_real_escape_string($this->db->link,$data['address']);
        $password = mysqli_real_escape_string($this->db->link,md5($data['password']));

        if($name=="" || $phone=="" || $email==""|| $address=="" || $password=="" ){
            $alert = '	<div class="alert alert-danger">Fiels must not be empty</div>';
            return $alert; 
        }else{
            $check_mail="select * from customer where email='$email' limit 1";
            $recuse_check = $this->db->select($check_mail);
            if($recuse_check){
                $alert = '	<div class="alert alert-danger">Email Exits</div>';
                return $alert; 
            }else{
                $query = "INSERT INTO customer(name,phone,email,address,password) 
                        VALUES ('$name','$phone','$email','$address','$password') ";
                $data = $this->db->insert($query);
            }
            if($data){
                $alert = '	<div class="alert alert-success">Create Customer Success</div>';
                return $alert; 
            }
        }
    }

    public function login_customer($data){
        $email =  $data['email'];
		$password = md5($data['password']);
        if( empty($email) || empty($password) ){
            $alert = '	<div class="alert alert-danger">Mail and Pass must not be empty</div>';
            return $alert; 
        }else{
            $check_login="select * from customer where email='$email' and password='$password'";
            $recuse_check = $this->db->select($check_login);
            if($recuse_check != false){
                $value=$recuse_check->fetch_array();
                session::set('customer_login',true);
                session::set('customer_id',$value['customer_id']);
                session::set('customer_name',$value['name']);
                header('location:index.php');
            }else{
                $alert = '	<div class="alert alert-danger">Wrong Email or Password</div>';
                return $alert; 
            } 
        }
    }

    public function show_customer($id){
        $query = "select * from customer where customer_id = '$id' ";
        $data = $this->db->select($query);
        return $data;
    }
}
?>