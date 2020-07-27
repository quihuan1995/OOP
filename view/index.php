<?php
include_once('header.php');

?>


<!--	Feature Product	-->
<div class="products">
    <h3>Sản phẩm nổi bật</h3>
    <div class="product-list card-deck">
        <?php
        $featured_prd=$prd->featured_product();
        if ($featured_prd) {
            while ($data=$featured_prd->fetch_array()) {
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
<!--	End Feature Product	-->


<!--	Latest Product	-->
<div class="products">
    <h3>Sản phẩm mới</h3>
    <div class="product-list card-deck">
        <?php
        $latest_prd=$prd->latest_product();
        if ($latest_prd) {
        while ($data=$latest_prd->fetch_array()) {
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
<!--	End Latest Product	-->

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