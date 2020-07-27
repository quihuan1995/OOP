<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath .'/../config/database.php');
include_once($filepath .'/../helper/format.php');

class CartController
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm= new Format();
    }
    public function add_cart($quantity,$id){
        $quantity = $this->fm->validation($quantity);
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
        $id = mysqli_real_escape_string($this->db->link, $id);
        $cart_session = session_id();

        $query = "select * from product where prd_id='$id'";
        $data = $this->db->select($query)->fetch_assoc();
        
        $prd_name = $data['prd_name'];
        $prd_image=$data['prd_image'];
        $prd_price=$data['prd_price'];

        $query_cart = "insert into cart(prd_id,prd_name,quantity,cart_session,prd_image,prd_price) 
                    values ('$id','$prd_name','$quantity','$cart_session','$prd_image','$prd_price')";
        $data_cart=$this->db->insert($query_cart);
        header('location:cart.php');
    }
}
?>