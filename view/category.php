<?php
include_once('header.php');  
$id=$_GET['cat_id'] ; 

$cat_name = $cat->get_prdname_by_cat($id);
$data= $cat_name->fetch_array();
?>

<!--	List Product	(hiện có 186 sản phẩm)-->
<div class="products">
    <h3><?php echo $data['cat_name']; ?> </h3>
    <div class="product-list card-deck">
        <?php
        $get_product_by_cat = $cat->get_product_by_cat($id);
        if ($get_product_by_cat) {
            while ($data=$get_product_by_cat->fetch_array()) {
                ?>
        <div class="product-item card text-center">
            <a href="product.php?prd_id=<?php echo $data['prd_id']; ?>"><img
                    src="../admin/img/product/<?php echo $data['prd_image']; ?>"></a>
            <h4><a href="product.php?prd_id=<?php echo $data['prd_id']; ?>"><?php echo $data['prd_name']; ?></a>
            </h4>
            <p>Giá Bán: <span><?php echo $data['prd_price']; ?>đ</span></p>
        </div>
        <?php
            }
        }
        ?>
    </div>


</div>
<!--	End List Product	-->

<div id="pagination">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Trang trước</a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Trang sau</a></li>
    </ul>
</div>

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