<?php 
    require_once './admin/connect.php';
    
    $sql = "SELECT * FROM products";
    $results = mysqli_query($connect, $sql);

?>
<?php foreach($results as $each): ?>
    <div class="col l-2-4 m-4 c-6">
        <div class="product" >
            <div style="height: 120px; padding: 6px; display: block; background-color: rgb(23, 184, 248);">
                <img style="height: 110px; margin: auto;" src="./admin/products/images/<?php echo $each['image']; ?>" alt="">
            </div>
            <h3><?php echo $each['name']; ?></h3>
            <h4>Giá: <?php echo $each['price']; ?> $</h4>
            <a href="show.php">Xem chi tiết</a>                                       
        </div>
    </div>
<?php endforeach; ?>