<?php
include_once('header.php');
include_once('../controllers/CategoryController.php');
include_once('../controllers/ProductController.php');

$prd= new ProductController();
$cat= new CategoryController();


$id=$_GET['prd_id'];
$get_prd_id = $prd->getprdbyid($id);
$data_prd = $get_prd_id->fetch_array();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['sbm'])) {
    $editprd= $prd->edit_product($_POST,$_FILES,$id);
}
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li><a href="">Quản lý sản phẩm</a></li>
            <li class="active"><?php echo $data_prd['prd_name']; ?></li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sản phẩm: <?php echo $data_prd['prd_name']; ?></h1>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-6">
                        <form role="form" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text" name="prd_name" required class="form-control"
                                    value="<?php echo $data_prd['prd_name']; ?>" placeholder="">
                            </div>

                            <div class="form-group">
                                <label>Giá sản phẩm</label>
                                <input type="number" name="prd_price" required
                                    value="<?php echo $data_prd['prd_price']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Bảo hành</label>
                                <input type="text" name="prd_warranty" required
                                    value="<?php echo $data_prd['prd_warranty']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Phụ kiện</label>
                                <input type="text" name="prd_accessories" required
                                    value="<?php echo $data_prd['prd_accessories']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Khuyến mãi</label>
                                <input type="text" name="prd_promotion" required
                                    value="<?php echo $data_prd['prd_promotion']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Tình trạng</label>
                                <input type="text" name="prd_new" required value="<?php echo $data_prd['prd_new']; ?>"
                                    type="text" class="form-control">
                            </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Ảnh sản phẩm</label>
                            <input type="file" name="prd_image">
                            <br>
                            <div>
                                <img src="img/product/<?php echo $data_prd['prd_image']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Danh mục</label>
                            <select name="cat_id" class="form-control">
                                <?php
                                $show_cate = $cat->show_category();
                                while($data_cat = $show_cate->fetch_array()){
                                ?>
                                <option <?php
                                if($data_cat['cat_id']==$data_prd['cat_id']){echo 'selected';}
                                ?> value=<?php echo $data_cat['cat_id']; ?>><?php echo $data_cat['cat_name']; ?>
                                </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select name="prd_status" class="form-control">
                                <option <?php if($data_prd['prd_status']==1){echo 'selected'; } ?> value=1>Còn hàng
                                </option>
                                <option <?php if($data_prd['prd_status']==2){echo 'selected'; } ?> value=2>Hết hàng
                                </option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label>Mô tả sản phẩm</label>
                            <textarea name="prd_details" required class="form-control"
                                rows="3"><?php echo $data_prd['prd_details']; ?></textarea>
                        </div>
                        <button type="submit" name="sbm" class="btn btn-primary">Cập nhật</button>
                        <button type="reset" class="btn btn-default">Làm mới</button>
                    </div>
                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->

</div>
<!--/.main-->
<?php
include_once('footer.php');
?>