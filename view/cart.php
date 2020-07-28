<?php
include_once('header.php');  

//Add Order - Del Order - Complete
if(isset($_GET['order_id']) && $_GET['order_id'] == 'order'){
    $customer_id = Session::get('customer_id');
    $addorder=$cart->add_order($customer_id);
    $delcart=$cart->del_all_cart();
    header('location:success.php');
}

//Xóa Giỏ Hàng
if(isset($_GET['cart_id'])){
$cart_id=$_GET['cart_id'];
$del_cart= $cart->del_cart($cart_id);
} 

//Cập Nhật Giỏ Hàng
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['sbm'])) {
    $cart_id = $_POST['cart_id'];
    $quantity=$_POST['quantity'];
    $update_cart = $cart->update_cart($quantity,$cart_id);
}

if(!isset($_GET['id'])){
    echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
}

//check login
$login_check = session::get('customer_login');
    if($login_check==false){
        header('location:register.php');
}


?>

<!--	Cart	-->
<div id="my-cart">
    <?php
    if(isset($update_cart)){
    echo $update_cart;
    }
    if(isset($del_cart)){
    echo $del_cart;
    }
    ?>
    <div class="row">
        <div class="cart-nav-item col-lg-7 col-md-7 col-sm-12">Thông tin sản phẩm</div>
        <div class="cart-nav-item col-lg-2 col-md-2 col-sm-12">Tùy chọn</div>
        <div class="cart-nav-item col-lg-3 col-md-3 col-sm-12">Giá</div>
    </div>
    <form method="post">
        <?php
    $get_product_cart = $cart->get_product_cart();
    if ($get_product_cart) {
        $total_cart=0;
        $qty=0;
        while ($data=$get_product_cart->fetch_array()) {
            ?>
        <div class="cart-item row">
            <div class="cart-thumb col-lg-7 col-md-7 col-sm-12">
                <img src="../admin/img/product/<?php echo $data['prd_image']; ?>">
                <h4><?php echo $data['prd_name']; ?></h4>
            </div>

            <div class="cart-quantity col-lg-2 col-md-2 col-sm-12">
                <input type="hidden" id="quantity" name="cart_id" class="form-control form-blue quantity"
                    value="<?php echo $data['cart_id']; ?>" min="1">
                <input type="number" id="quantity" name="quantity" class="form-control form-blue quantity"
                    value="<?php echo $data['quantity']; ?>" min="1">
            </div>
            <div class="cart-price col-lg-3 col-md-3 col-sm-12">
                <b><?php echo $total = $data['prd_price']*$data['quantity']; ?> đ</b><a
                    onclick=" return confirm('want to del ?')" href="?cart_id=<?php echo $data['cart_id']; ?>">Xóa</a>
            </div>
        </div>

        <?php
                $qty = $qty + $data['quantity'];
                $total_cart += $total;
                }
            }
            ?>
        <div class="row">
            <div class="cart-thumb col-lg-7 col-md-7 col-sm-12">
                <?php
                    //Kiểm Tra Giỏ Hàng
                    
                    $check_cart = $cart->check_cart();
                        if($check_cart){
                            ?>
                <button id="update-cart" class="btn btn-success" type="submit" name="sbm">Cập nhật giỏ hàng</button>
            </div>
            <div class="cart-total col-lg-2 col-md-2 col-sm-12"><b>Tổng cộng:</b></div>
            <div class="cart-price col-lg-3 col-md-3 col-sm-12"><b>
                    <?php
                            echo $total_cart .'đ' ;
                            session::set('qty',$qty);
                            session::set('sum',$total_cart);
                            
                        }else{
                            echo '	<div class="alert alert-danger">Empty Cart</div>';
                        }
                        ?>
                </b></div>
        </div>

    </form>

</div>
<!--	End Cart	-->

<!--	Customer Info	-->
<div id="customer">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <table data-toolbar="#toolbar" data-toggle="table">
                    <?php
                        $id=session::get('customer_id');
                        $show_customer = $customer->show_customer($id);
                        if ($show_customer) {
                            $data = $show_customer->fetch_array();
                        }
                        ?>
                    <tr>
                        <td>Name</td>
                        <td>:</td>
                        <td style=""><?php echo $data['name']; ?></td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>:</td>
                        <td style=""><?php echo $data['phone']; ?></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>:</td>
                        <td style=""><?php echo $data['address']; ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td style=""><?php echo $data['email']; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="by-now col-lg-6 col-md-6 col-sm-12">
            <a href="?order_id=order">
                <b>Mua ngay</b>
                <span>Giao hàng tận nơi siêu tốc</span>
            </a>
        </div>
        <div class="by-now col-lg-6 col-md-6 col-sm-12">
            <a href="#">
                <b>Trả góp Online</b>
                <span>Vui lòng call (+84) 0988 550 553</span>
            </a>
        </div>
    </div>


</div>
<!--	End Customer Info	-->

</div>

<?php
include_once('slidebar.php');    
?>
</div>
</div>
</div>
<!--	End Body	-->

<?php
include_once('footer.php');    
?>