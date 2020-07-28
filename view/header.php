<?php
ob_start();
include_once('../config/session.php');
    Session::init();
include_once('../config/database.php');
include_once('../helper/format.php');

spl_autoload_register(function($controller){
    include_once('../controllers/'.$controller.'.php');
});
$db = new Database();
$fm = new Format();
$cart = new CartController();
$cat = new CategoryController();
$prd = new ProductController();
$customer = new CustomerController();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Home</title>
    <link rel="stylesheet" href="../publics/css/bootstrap.css">
    <link rel="stylesheet" href="../publics/css/home.css">
    <link rel="stylesheet" href="../publics/css/success.css">
    <link rel="stylesheet" href="../publics/css/search.css">
    <link rel="stylesheet" href="../publics/css/product.css">
    <link rel="stylesheet" href="../publics/css/cart.css">
    <link rel="stylesheet" href="../publics/css/category.css">
    <script src="../publics/js/jquery-3.3.1.js"></script>
    <script src="../publics/js/bootstrap.js"></script>
</head>

<body>

    <!--	Header	-->
    <div id="header">
        <div class="container">
            <div class="row">
                <div id="logo" class="col-lg-3 col-md-3 col-sm-12">
                    <h1><a href="index.php"><img class="img-fluid" src="../publics/images/logo.png"></a></h1>
                </div>
                <div id="search" class="col-lg-6 col-md-6 col-sm-12">
                    <form class="form-inline">
                        <input class="form-control mt-3" type="search" placeholder="Tìm kiếm" aria-label="Search">
                        <button class="btn btn-danger mt-3" type="submit">Tìm kiếm</button>
                    </form>
                </div>
                <div id="cart" class="col-lg-3 col-md-3 col-sm-12">
                    <a class="mt-4 mr-2" href="cart.php">giỏ hàng</a><span class="mt-3">
                        <?php
                        $check_cart = $cart->check_cart();
                        if($check_cart){
                            $qty=session::get('qty');
                            echo $qty;
                        }else{
                            echo 0;
                        }
                        ?>
                    </span>
                </div>
                <div id="cuslog" class="col-lg-3 col-md-3 col-sm-12">
                    <?php
                    //Logout
                    if(isset($_GET['customer_id'])){
                        $delcart = $cart->del_all_cart();
                        session::destroy();
                        header('location:register.php');
                    }

                    //CHeck Login
                    $login_check = session::get('customer_login');
                    if($login_check==false){
                        echo '<a class="mt-4 mr-2" href="register.php">Login</a>';
                    }else{
                        echo '<a class="mt-4 mr-2" href="?customer_id='.Session::get('customer_id').' ">Logout</a>';
                    }
                    ?>

                </div>
            </div>
        </div>
        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <!--	End Header	-->

    <!--	Body	-->
    <div id="body">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <nav>
                        <div id="menu" class="collapse navbar-collapse">
                            <ul>
                                <?php
                                $show_cat = $cat->show_category();
                                if ($show_cat) {
                                    while ($data = $show_cat->fetch_array()) {
                                        ?>
                                <li class="menu-item"><a
                                        href="category.php?cat_id=<?php echo $data['cat_id']; ?>"><?php echo $data['cat_name']; ?></a>
                                </li>

                                <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div id="main" class="col-lg-8 col-md-12 col-sm-12">
                    <!--	Slider	-->
                    <div id="slide" class="carousel slide" data-ride="carousel">

                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            <li data-target="#slide" data-slide-to="0" class="active"></li>
                            <li data-target="#slide" data-slide-to="1"></li>
                            <li data-target="#slide" data-slide-to="2"></li>
                            <li data-target="#slide" data-slide-to="3"></li>
                            <li data-target="#slide" data-slide-to="4"></li>
                            <li data-target="#slide" data-slide-to="5"></li>
                        </ul>

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="../publics/images/slide-1.png" alt="Vietpro Academy">
                            </div>
                            <div class="carousel-item">
                                <img src="../publics/images/slide-2.png" alt="Vietpro Academy">
                            </div>
                            <div class="carousel-item">
                                <img src="../publics/images/slide-3.png" alt="Vietpro Academy">
                            </div>
                            <div class="carousel-item">
                                <img src="../publics/images/slide-4.png" alt="Vietpro Academy">
                            </div>
                            <div class="carousel-item">
                                <img src="../publics/images/slide-5.png" alt="Vietpro Academy">
                            </div>
                            <div class="carousel-item">
                                <img src="../publics/images/slide-6.png" alt="Vietpro Academy">
                            </div>
                        </div>

                        <!-- Left and right controls -->
                        <a class="carousel-control-prev" href="#slide" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#slide" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>

                    </div>
                    <!--	End Slider	-->