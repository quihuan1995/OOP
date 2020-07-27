<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/../config/database.php');
include_once($filepath.'/../helper/format.php');

class CategoryController{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm= new Format();    
    }

    public function show_category(){
        $query = "select * from category ";
        $data = $this->db->select($query);
        return $data;
    }

    public function add_category($cat_name){
        $cat_name = $this->fm->validation($cat_name);
        $cat_name = mysqli_real_escape_string($this->db->link,$cat_name);

        if(empty($cat_name)){
            $alert = '	<div class="alert alert-danger">Ko de trong Category</div>';
            return $alert; 
        }else{
            $query = "insert into category(cat_name) values ('$cat_name') ";
            $data = $this->db->insert($query);
            header('location:category.php');
        }
    }

    public function getcatbyid($id){
        $query = "select * from category where cat_id = '$id' ";
        $data = $this->db->select($query);
        return $data;
    }

    public function edit_category($cat_name,$id){
        $cat_name = $this->fm->validation($cat_name);
        $cat_name = mysqli_real_escape_string($this->db->link,$cat_name);
        $id = mysqli_real_escape_string($this->db->link,$id);

            if(empty($cat_name)){
            $alert = '	<div class="alert alert-danger">Ko de trong Category</div>';
            return $alert; 
        }else{
            $query = "update category set cat_name='$cat_name' where cat_id='$id' ";
            $data = $this->db->update($query);
            header('location:category.php');
        }
    }

    public function del_category($id){
        $query = "delete from category where cat_id = '$id' ";
        $data = $this->db->delete($query);
            if($data){
                $alert = '	<div class="alert alert-success">Delete Ok Category</div>';
                return $alert;               
            }else{
                $alert = '	<div class="alert alert-danger">Ko Delete Category</div>';
                return $alert; 
            }
    }
  
    public function get_product_by_cat($id){
        $query = "select * from product where cat_id='$id'";
        $data = $this->db->select($query);
        return $data;
    }
    public function get_prdname_by_cat($id){
        $query = "select product.*,category.cat_name,category.cat_id from product,category where product.cat_id=category.cat_id and product.cat_id='$id'";
        $data = $this->db->select($query);
        return $data;
    }
}
?>