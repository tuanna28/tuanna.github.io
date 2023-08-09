<?php
// include_once "../../model/connect.php";
// include_once "../../model/user.php";
// $query = "select * from user";
// $item = getAll($query);
?>
<aside>
    <div class="logo">
        <a href="../index.php"><img src="../src/image/logo.png" alt=""></a>
    </div>
    <div class="menu">
        <ul>
            <li><a href="dashboard" aria-hidden="true">Dashboard</a></li>
            <li><a href="product" aria-hidden="true">Products</a></li>
            <li><a href="category" aria-hidden="true">Category</a></li>
            <li><a href="user" aria-hidden="true"> Users</a></li>
            <li><a href="brand" aria-hidden="true">Brand</a></li>
            <li><a href="size" aria-hidden="true">Size</a></li>
            <li><a href="order" aria-hidden="true">Order</a></li>
        </ul>
    </div>
</aside>
<?php //if($_SESSION["role"] == 2) { echo "onclick=(alert('Bạn_không_phải_quản_lý'))"; } else { echo "href='user.php'"; }?>
<?php //if($_SESSION["role"] == 2) { echo "onclick=(alert('Bạn_không_phải_quản_lý'))"; } else { echo "href='statistical.php'"; }?>
