<?php

if (!empty($_SESSION['level_admin'])) { ?>
    <ul>
        <li>
        <a href="../manufacturers"> Quản lí nhà sản xuất</a>
        </li>
    </ul>
<?php } ?>

<ul>
    <li>
    <a href="../products"> Quản lí sản phẩm</a>
    </li>
</ul>

<ul>
    <li>
    <a href="../orders"> Quản lí đơn hàng</a>
    </li>
</ul>

<?php
    if (isset($_GET['error'])) {
?>
<span style="color:red">
    <?php
        echo $_GET['error'];
    ?>
</span>
<?php } ?>

<?php
    if (isset($_GET['success'])) {
?>
<span style="color:green">
    <?php
        echo $_GET['success'];
    ?>
</span>
<?php } ?>