<?php
include_once('header.php');
include_once('../controllers/CategoryController.php');

$cat = new CategoryController();
$show_cat = $cat->show_category();

if(isset($_GET['del_id'])){
$id=$_GET['del_id'];
$del_cat= $cat->del_category($id);
} 

?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Quản lý danh mục</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Quản lý danh mục</h1>
        </div>
    </div>
    <!--/.row-->
    <?php
    if(isset($del_cat)){
        echo $del_cat;
    }
    ?>
    <div id="toolbar" class="btn-group">
        <a href="add_category.php" class="btn btn-success">
            <i class="glyphicon glyphicon-plus"></i> Thêm danh mục
        </a>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table data-toolbar="#toolbar" data-toggle="table">

                        <thead>
                            <tr>
                                <th data-field="id" data-sortable="true">ID</th>
                                <th>Tên danh mục</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if ($show_cat) {
                                    while ($data= $show_cat->fetch_array()) {
                            ?>
                            <tr>
                                <td><?php echo $data['cat_id']; ?></td>
                                <td><?php echo $data['cat_name']; ?></td>
                                <td class="form-group">
                                    <a href="edit_category.php?cat_id=<?php echo $data['cat_id']; ?>"
                                        class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                    <a onclick=" return confirm('want to del ?')"
                                        href="?del_id=<?php echo $data['cat_id']; ?>" class="btn btn-danger"><i
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

<script src="../publics/admin/js/jquery-1.11.1.min.js"></script>
<script src="../publics/admin/js/bootstrap.min.js"></script>
<script src="../publics/admin/js/bootstrap-table.js"></script>

<?php
include_once('footer.php');
?>