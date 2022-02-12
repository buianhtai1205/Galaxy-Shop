<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client</title>
    <link rel="stylesheet" href="./assets/css/grid.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/galaxy.css">
    <script src="https://kit.fontawesome.com/c0564c5ed5.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="main">
        <div id="header">
            <a href="index.php" class="title">
                <div class="galaxy">
                    <div class="t t1">galaxyHN</div>
                    <div class="t t2">galaxyHN</div>
                    <div class="t t3">galaxyHN</div>
                    <div class="t t4">galaxyHN</div>
                </div>
            </a>
            <form action="" class="search-bar">
                <input class="search" type="text" placeholder="Tìm kiếm.." name="search">
                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
            <div class="header-info">
                <?php if (empty($_SESSION['id'])) { ?>
                    <a href="form_signin.php">Đăng Nhập</a>
                    <a href="form_signup.php">Đăng Ký</a>
                <?php } else { ?>
                    <a><?php echo $_SESSION['name']; ?></a>
                    <a href="signout.php">Đăng xuất</a>
                <?php } ?>
                <a class="cart" href="view_cart.php">Xem giỏ hàng <i class="fa-solid fa-cart-shopping"></i></a>
            </div>
            
        </div>
        
        <div id="content">
            <div class="grid wide">
                <div class="row sm-gutter">
                    <div class="col l-3 m-0 c-0">
                        <div id="side_bar">

                        </div>
                    </div>
                    <div class="col l-9 m-12 c-12">
                        <div id="products">
                            <div class="row sm-gutter">
                                <div class="col l-12 m-12 c-12">
                                    <div class="nav_bar"></div>
                                </div>
                            </div>
                            <div class="row sm-gutter">
                                <?php include'product.php'; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="footer">
            <a href="">Youtube</a>
            <a href="">Facebook</a>
            <a href="">TikTok</a>
        </div>
    </div>    
</body>
</html>