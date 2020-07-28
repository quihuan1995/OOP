<?php
include_once('header.php');
include_once('../controllers/CartController.php');
include_once('../controllers/ProductController.php');

$cart= new CartController();
$show_order = $cart->show_order();
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Danh sách đơn hàng</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách đơn hàng</h1>
        </div>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table data-toolbar="#toolbar" data-toggle="table">

                        <thead>
                            <tr>
                                <th data-field="id" data-sortable="true">Mã Đơn</th>
                                <th data-field="name" data-sortable="true">Ngày đặt</th>
                                <th data-field="product" data-sortable="true">Sản phẩm</th>
                                <th data-field="quantity" data-sortable="true">Số lượng</th>
                                <th data-field="price" data-sortable="true">Đơn Giá</th>
                                <th data-field="address" data-sortable="true">Địa chỉ</th>
                                <th data-field="action" data-sortable="true">Trạng Thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if($show_order){
                                    while($data = $show_order->fetch_array()){
                            ?>
                            <tr>
                                <td><?php echo $data['order_id']; ?></td>
                                <td><?php echo $data['date_order']; ?></td>
                                <td><?php echo $data['prd_name']; ?></td>
                                <td><?php echo $data['quantity']; ?></td>
                                <td><?php echo $data['prd_price']; ?></td>
                                <td>12</td>
                                <td>
                                    <?php
                                        if($data['status']==0){
                                            echo '<a href="#" class="label label-danger">Đang xử lý</a>';
                                        }else{
                                            echo '<span class="label label-success">Đã hoàn thành</span>';
                                        }
                                    ?>
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