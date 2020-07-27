<?php
include_once('header.php');
include_once('../controllers/CategoryController.php');

$id=$_GET['cat_id'];
$cat = new CategoryController();
$get_cat_id = $cat->getcatbyid($id);
$data = $get_cat_id->fetch_array();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
$cat_name = $_POST['cat_name'];
$editcat= $cat->edit_category($cat_name,$id);
}
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li><a href="">Quản lý danh mục</a></li>
            <li class="active">
                <?php  echo $data['cat_name']; ?>
            </li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh mục:
                <?php  echo $data['cat_name'];  ?>
            </h1>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-8">
                        <form role="form" method="post">
                            <?php
                                if(isset($editcat)){
                                    echo $editcat;
                                }
                            ?>
                            <div class="form-group">
                                <label>Tên danh mục:</label>
                                <input type="text" name="cat_name" value="<?php echo $data['cat_name']; ?>"
                                    class="form-control" placeholder="Tên danh mục...">
                            </div>
                            <button type="submit" name="sbm" class="btn btn-primary">Cập nhật</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                    </div>
                    </form>

                </div>
            </div>
        </div><!-- /.col-->
    </div>
    <!--/.main-->
    <?php
include_once('footer.php');
?>