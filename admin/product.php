<?php
include_once('header.php');
include_once('../controllers/CategoryController.php');
include_once('../controllers/ProductController.php');

$prd= new ProductController();
$show_prd = $prd->show_product();

if(isset($_GET['del_id'])){
$id=$_GET['del_id'];
$del_prd= $prd->del_product($id);
} 
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Danh sách sản phẩm</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách sản phẩm</h1>
        </div>
    </div>
    <?php
    if(isset($del_prd)){
        echo $del_prd;
    }
    ?>
    <!--/.row-->
    <div id="toolbar" class="btn-group">
        <a href="add_product.php" class="btn btn-success">
            <i class="glyphicon glyphicon-plus"></i> Thêm sản phẩm
        </a>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table data-toolbar="#toolbar" data-toggle="table">

                        <thead>
                            <tr>
                                <th data-field="id" data-sortable="true">ID</th>
                                <th data-field="name" data-sortable="true">Tên sản phẩm</th>
                                <th data-field="price" data-sortable="true">Giá</th>
                                <th>Ảnh sản phẩm</th>
                                <th>Trạng thái</th>
                                <th>Danh mục</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if($show_prd){
                                while ($data = $show_prd->fetch_array()) {
                                    ?>
                            <tr>
                                <td style=""><?php echo $data['prd_id']; ?></td>
                                <td style=""><?php echo $data['prd_name']; ?></td>
                                <td style=""><?php echo $data['prd_price']; ?> vnd</td>
                                <td style="text-align: center"><img width="130" height="180"
                                        src="img/product/<?php echo $data['prd_image']; ?>" />
                                </td>
                                <td>
                                    <?php
                                    if ($data['prd_status'] == 1) {
                                        echo '<span class="label label-success">Còn hàng</span>';
                                    } else {
                                        echo '<span class="label label-danger">Het hàng</span>';
                                    } ?>
                                </td>
                                <td><?php echo $data['cat_name']; ?></td>
                                <td class="form-group">
                                    <a href="edit_product.php?prd_id=<?php echo $data['prd_id']; ?>"
                                        class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                    <a onclick=" return confirm('want to del ?')"
                                        href="?del_id=<?php echo $data['prd_id']; ?>" class="btn btn-danger"><i
                                            class="glyphicon glyphicon-remove"></i></a>
                                </td>
                            </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!--/.row-->
</div>
<!--/.main-->

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-table.js"></script>
<?php
include_once('footer.php');
?>