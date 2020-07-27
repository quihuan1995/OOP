<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/../config/session.php');
Session::checkLogin();
include_once($filepath.'/../config/database.php');
include_once($filepath.'/../helper/format.php');

class LoginController{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm= new Format();    
    }
    public function login_admin($user_mail,$user_pass){
        $user_mail = $this->fm->validation($user_mail);
        $user_pass = $this->fm->validation($user_pass);

        $user_mail = mysqli_real_escape_string($this->db->link,$user_mail);
        $user_pass = mysqli_real_escape_string($this->db->link,$user_pass);

        if(empty($user_mail) || empty($user_pass)){
            $alert = '	<div class="alert alert-danger">Ko de trong pass hoac mail</div>';
            return $alert; 
        }else{
            $query = "select * from user where user_mail = '$user_mail' and user_pass = '$user_pass'";
            $result = $this->db->select($query);

            if($result != false){
                $value = $result->fetch_assoc();
                Session::set('LoginController',true);
                Session::set('user_id', $value['user_id']);
                Session::set('user_full', $value['user_full']);
                Session::set('user_mail', $value['user_mail']);
                Session::set('user_pass', $value['user_pass']);
                header('location:admin.php');
            }else{
                $alert = '	<div class="alert alert-danger">Tài khoản không hợp lệ !</div>';
                return $alert;
            }
        }
    }
}
?>