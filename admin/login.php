<?php
include_once('../controllers/LoginController.php');
$class = new LoginController();
if($_SERVER['REQUEST_METHOD'] === 'POST'){
$user_mail = $_POST['user_mail'];
$user_pass = $_POST['user_pass'];
$login_check = $class->login_admin($user_mail,$user_pass);
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vietpro Mobile Shop - Administrator</title>

    <link href="../publics/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="../publics/admin/css/datepicker3.css" rel="stylesheet">
    <link href="../publics/admin/css/bootstrap-table.css" rel="stylesheet">
    <link href="../publics/admin/css/styles.css" rel="stylesheet">

    <!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>

    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">Vietpro Mobile Shop - Administrator</div>
                <div class="panel-body">
                    <?php
					if(isset($login_check)){
						echo $login_check;
					}
				?>
                    <form action="login.php" role="form" method="post">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="user_mail" type="email"
                                    autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Mật khẩu" name="user_pass" type="password"
                                    value="">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me">Nhớ tài khoản
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary">Đăng nhập</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->
</body>

</html>