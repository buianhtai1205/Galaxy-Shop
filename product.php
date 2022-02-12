<?php 
    require_once './admin/connect.php';
    
    $sql = "SELECT * FROM products";
    $results = mysqli_query($connect, $sql);

?>
<?php foreach($results as $each): ?>
    <div class="col l-3 m-4 c-6">
        <div class="product" >
            <div style="height: 120px; padding: 6px; display: block;">
                <img style="height: 110px; margin: auto;" src="./admin/products/images/<?php echo $each['image']; ?>" alt="">
            </div>
            <h3><?php echo $each['name']; ?></h3>
            <h4>Giá: <?php echo $each['price']; ?> $</h4>
            <a href="show.php">Xem chi tiết</a>
            <a href="add_product_in_cart.php?id=<?php echo $each['id']; ?>">Thêm vào giỏ hàng</a>                                       
        </div>
    </div>
<?php endforeach; ?>