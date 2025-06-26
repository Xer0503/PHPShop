<?php
    require_once '../products/queryProducts.php';
    $pds = new QueryProducts();
    $item = $pds->getAllProducts();
?>

<?php if (empty($item)) {?>
    <div class="card mx-auto">
        <div class="card-body d-flex align-items-center justify-content-center">
            <p class="card-title">No Products Available</p>
        </div>
    </div>    
<?php }else{
    foreach($item as $product) {
        $product_id = $product['product_id'];
        $name = $product['product_name'];
        $description = $product['product_description'];
        $price = $product['product_price'];
        $stock = $product['product_stock'];
    ?>
<div class="col-12 col-md-4 mb-2">
    <div class="card">
        <div class="card-body">
            <p class="card-title fw-bold"> <?php echo $name ?> </p>
            <p class="card-text"><?php echo $description ?></p>
            <p class="card-text">Price: <?php echo $price ?></p>
            <p class="card-text">Stock: <?php echo $stock ?></p>
            <div class="d-flex justify-content-evenly px-3">
                <a class="btn btn-success w-100" href="#">Buy</a>
                <a class="btn btn-warning w-100" href="#">Cart</a>
            </div>
        </div>
    </div>
</div>
<?php }} ?>