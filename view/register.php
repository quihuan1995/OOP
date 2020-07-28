<?php
include_once('header.php');

//Register
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sbm'])){
$register= $customer->create_customer($_POST);
}

//Login
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])){
$login= $customer->login_customer($_POST);
}

//Check Login
$login_check = session::get('customer_login');
    if($login_check){
        header('location:cart.php');
    }
?>
<!--	End Slider	-->
<div id="login" style="margin: 52px;background-color: white;padding: 54px;">
    <?php
    if(isset($login)){
        echo $login;
    }
    ?>
    <form role="form" method="post">
        <fieldset>
            <div class="form-group">
                <input class="form-control" placeholder="E-mail" name="email" type="email">
            </div>
            <div class="form-group">
                <input class="form-control" placeholder="Mật khẩu" name="password" type="password" value="">
            </div>
            <div class="checkbox">
                <label>
                    <input name="remember" type="checkbox" value="Remember Me">Nhớ tài khoản
                </label>
            </div>
            <button type="submit" name="login" class="btn btn-primary">Đăng nhập</button>
        </fieldset>
    </form>
</div>

<!--	Customer Info	-->
<div id="customer">
    <?php
    if(isset($register)){
        echo $register;
    }
    ?>
    <form method="post">
        <div class="row">

            <div id="customer-name" class="col-lg-4 col-md-4 col-sm-12">
                <input placeholder="Họ và tên (bắt buộc)" type="text" name="name" class="form-control">
            </div>
            <div id="customer-phone" class="col-lg-4 col-md-4 col-sm-12">
                <input placeholder="Số điện thoại (bắt buộc)" type="text" name="phone" class="form-control">
            </div>
            <div id="customer-mail" class="col-lg-4 col-md-4 col-sm-12">
                <input placeholder="Email (bắt buộc)" type="text" name="email" class="form-control">
            </div>
            <div id="customer-mail" class="col-lg-4 col-md-4 col-sm-12">
                <input placeholder="pasword (bắt buộc)" type="text" name="password" class="form-control">
            </div>
            <div id="customer-add" class="col-lg-12 col-md-12 col-sm-12">
                <input placeholder="Địa chỉ nhà riêng hoặc cơ quan (bắt buộc)" type="text" name="address"
                    class="form-control">
            </div>

        </div>
        <div class="row">
            <div class="by-now col-lg-6 col-md-6 col-sm-12">
                <input type="submit" value="ĐĂNG KÝ" name="sbm" id="submit">

            </div>

        </div>
    </form>
</div>


<!--	End Customer Info	-->
</div>
<?php
include_once('slidebar.php');    
?>
</div>
</div>
</div>
<?php
include_once('footer.php');
?>