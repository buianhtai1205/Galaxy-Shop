<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client</title>
    <link rel="stylesheet" href="./assets/css/grid.css">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <div id="main">
        <div id="header">
            <a href="">Galaxy_Shop</a>
            <a href="form_signin.php">Đăng nhập</a>
            <a href="form_signup.php">Đăng Ký</a>
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