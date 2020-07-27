<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/../config/database.php');
include_once($filepath.'/../helper/format.php');

class ProductController{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm= new Format();    
    }

    public function show_product(){
        $query = "select * from product INNER JOIN category ON product.cat_id=category.cat_id ";
        $data = $this->db->select($query);
        return $data;
    }

    public function add_product($data,$files){
        $prd_name = mysqli_real_escape_string($this->db->link, $data['prd_name']);
        $prd_price = mysqli_real_escape_string($this->db->link, $data['prd_price']);
        $cat_id = mysqli_real_escape_string($this->db->link, $data['cat_id']);
        $prd_warranty = mysqli_real_escape_string($this->db->link, $data['prd_warranty']);
        $prd_accessories = mysqli_real_escape_string($this->db->link, $data['prd_accessories']);
        $prd_new = mysqli_real_escape_string($this->db->link, $data['prd_new']);
        $prd_promotion = mysqli_real_escape_string($this->db->link, $data['prd_promotion']);
        $prd_status = mysqli_real_escape_string($this->db->link, $data['prd_status']);
    
        $prd_details = mysqli_real_escape_string($this->db->link, $data['prd_details']);

        $permited = array('jpg','jpeg','png','gif');
        $file_name = $_FILES['prd_image']['name'];
        $file_size= $_FILES['prd_image']['size'];
        $file_temp= $_FILES['prd_image']['tmp_name'];
        $div = explode('.',$file_name);
        $file_ext = strtolower(end($div));
        $prd_image = substr(md5(time()),0,10).'.'.$file_ext;
        $upload_image = "img/product/".$prd_image; 

        if($prd_name=="" || $cat_id=="" || $prd_price==""|| $prd_warranty=="" || $prd_accessories=="" || $prd_new=="" || $prd_promotion=="" || $prd_status==""  || $prd_details=="" ||  $file_name==""){
            $alert = '	<div class="alert alert-danger">Fiels must not be empty</div>';
            return $alert; 
        }else{
            move_uploaded_file($file_temp,$upload_image);
            $query = "INSERT INTO product(prd_name,cat_id,prd_price,prd_warranty,prd_accessories,prd_new,prd_promotion,prd_status,prd_details,prd_image) 
                        VALUES ('$prd_name','$cat_id','$prd_price','$prd_warranty','$prd_accessories','$prd_new','$prd_promotion','$prd_status','$prd_details','$prd_image') ";
            $data = $this->db->insert($query);
            header('location:product.php');
        }
    }

    public function getprdbyid($id){
        $query = "select * from product where prd_id = '$id' ";
        $data = $this->db->select($query);
        return $data;
    }

    public function edit_product($data,$files,$id){
        $prd_name = mysqli_real_escape_string($this->db->link, $data['prd_name']);
        $prd_price = mysqli_real_escape_string($this->db->link, $data['prd_price']);
        $cat_id = mysqli_real_escape_string($this->db->link, $data['cat_id']);
        $prd_warranty = mysqli_real_escape_string($this->db->link, $data['prd_warranty']);
        $prd_accessories = mysqli_real_escape_string($this->db->link, $data['prd_accessories']);
        $prd_new = mysqli_real_escape_string($this->db->link, $data['prd_new']);
        $prd_promotion = mysqli_real_escape_string($this->db->link, $data['prd_promotion']);
        $prd_status = mysqli_real_escape_string($this->db->link, $data['prd_status']); 
        $prd_details = mysqli_real_escape_string($this->db->link, $data['prd_details']);

        $permited = array('jpg','jpeg','png','gif');
        $file_name = $_FILES['prd_image']['name'];
        $file_size= $_FILES['prd_image']['size'];
        $file_temp= $_FILES['prd_image']['tmp_name'];
        $div = explode('.',$file_name);
        $file_ext = strtolower(end($div));
        $prd_image = substr(md5(time()),0,10).'.'.$file_ext;
        $upload_image = "img/product/".$prd_image; 

        if($prd_name=="" || $cat_id=="" || $prd_price==""|| $prd_warranty=="" || $prd_accessories=="" || $prd_new=="" || $prd_promotion=="" || $prd_status==""  || $prd_details=="" ){
            $alert = '	<div class="alert alert-danger">Fiels must not be empty</div>';
            return $alert; 
        }else{
            if(!empty($file_name)){                  
                if($file_size > 20480){
                    return '	<div class="alert alert-danger">Image should be less 1MB</div>';
                }elseif(in_array($file_ext,$permited) === false){
                    return '	<div class="alert alert-danger">You can upload only:'.implode(',',$permited).'</div>';
                }
                move_uploaded_file($file_temp,$upload_image);
                $query="update product set  prd_name='$prd_name', 
                                            cat_id='$cat_id', 
                                            prd_price='$prd_price', 
                                            prd_warranty='$prd_warranty',
                                            prd_accessories='$prd_accessories',
                                            prd_new='$prd_new',
                                            prd_promotion='$prd_promotion',
                                            prd_status='$prd_status',
                                            prd_details='$prd_details',
                                            prd_image='$prd_image'
                        where prd_id='$id'";
            }else{
                //Nếu người dùng không chọn ảnh
                    $query="update product set  prd_name='$prd_name', 
                                            cat_id='$cat_id', 
                                            prd_price='$prd_price', 
                                            prd_warranty='$prd_warranty',
                                            prd_accessories='$prd_accessories',
                                            prd_new='$prd_new',
                                            prd_promotion='$prd_promotion',
                                            prd_status='$prd_status',
                                            prd_details='$prd_details'
                        where prd_id='$id'";               
            }
            $data = $this->db->update($query);
            header('location:product.php');
        }
    }
        public function del_product($id){
        $query = "delete from product where prd_id = '$id' ";
        $data = $this->db->delete($query);
            if($data){
                $alert = '	<div class="alert alert-success">Delete Ok Product</div>';
                return $alert;               
            }else{
                $alert = '	<div class="alert alert-danger">Ko Delete Category</div>';
                return $alert; 
            }
    }

    //FRONTEND

    public function featured_product(){
        $query = "select * from product limit 6 ";
        $data = $this->db->select($query);
        return $data;
    }
    public function latest_product(){
        $query = "select * from product where prd_status = 1 limit 6 ";
        $data = $this->db->select($query);
        return $data;
    }
    public function detail_product($id){
        $query = "select * from product INNER JOIN category ON product.cat_id=category.cat_id where product.prd_id='$id'";
        $data = $this->db->select($query);
        return $data;
    }
}
?>