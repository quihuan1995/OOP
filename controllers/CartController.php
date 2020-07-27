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
        $data = $this->db->select($query)->fetch_array();
        
        $prd_name = $data['prd_name'];
        $prd_image=$data['prd_image'];
        $prd_price=$data['prd_price'];

        $check_cart = "select * from cart where prd_id ='$id' and cart_session ='$cart_session'";
        // if($check_cart){
        //     $msg = "Product Already exits";
        //     return $msg;
        // }else{
            $query_cart = "insert into cart(prd_id,prd_name,quantity,cart_session,prd_image,prd_price) 
                    values ('$id','$prd_name','$quantity','$cart_session','$prd_image','$prd_price')";
            $data_cart=$this->db->insert($query_cart);
            header('location:cart.php');
        // }
    }

    public function get_product_cart(){
        $cart_session=session_id();
        $query="select * from cart where cart_session='$cart_session'";
        $data = $this->db->select($query);
        return $data;
    }

    public function update_cart($quantity,$cart_id){
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
        $cart_id = mysqli_real_escape_string($this->db->link, $cart_id);
        $query = "update cart set quantity ='$quantity' where cart_id='$cart_id'";
        $data = $this->db->update($query);
        if($data){
            $msg = '	<div class="alert alert-success">Update Success</div>';
            return $msg;
            header('location:cart.php');
        }
    }

    public function del_cart($cart_id){
        $cart_id = mysqli_real_escape_string($this->db->link, $cart_id);
        $query="delete from cart where cart_id='$cart_id'";
        $data = $this->db->delete($query);
        if($data){
            $msg = '	<div class="alert alert-success">Delete Success</div>';
            return $msg;
            header('location:cart.php');
        }
    }

    public function check_cart(){
        $cart_session = session_id();
        $query = "select * from cart where cart_session='$cart_session'";
        $data= $this->db->select($query);
        return $data;
    }
}
?>