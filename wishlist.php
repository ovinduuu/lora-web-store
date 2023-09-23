<?php include 'includes/header.php'; ?>
<?php include 'includes/db.php'; ?>

<?php
if(!isset($_SESSION['userID'])){
    header("Location: login.php");
    exit();
}
$userID = $_SESSION['userID'];


if(isset($_GET['add'])){
    $iteamID = $_GET['add'];
    $sql = "SELECT * FROM `wishlist` WHERE userID=$userID AND productID=$iteamID;";
    $result = $connection->query($sql);

    if($result->num_rows > 0) {
        header("Location: wishlist.php");
        exit();
    }
    
    $sql = "INSERT INTO `wishlist`(`ID`, `productID`, `userID`) VALUES (NULL,$iteamID,$userID)";

    if ($connection->query($sql) === TRUE) {
        header("Location: wishlist.php");
        exit();
    } else {
        header("Location: wishlist.php");
        exit();
    }
}

$query    = "SELECT wishlist.ID, products.img, products.productName, products.productPrice FROM wishlist INNER JOIN products ON wishlist.productID=products.ID WHERE userID=$userID;";
$result = $connection->query($query);

if($result->num_rows > 0) {
?>
<!--wishlist area start -->
<div class="wishlist_area mt-100">
        <div class="container">
            <form action="#">
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc wishlist">
                            <div class="cart_page table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product_thumb">Image</th>
                                            <th class="product_name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product_total">Add To Cart</th>
                                            <th class="product_remove">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        while($row = $result->fetch_assoc()){
                                    ?>
                                        <tr>
                                            <td class="product_thumb"><a href="#"><img src="assets/img/product/<?php echo $row['img'];?>.jpg" alt=""></a></td>
                                            <td class="product_name"><a href="#"><?php echo $row['productName'];?></a></td>
                                            <td class="product-price"><?php echo $row['productPrice'];?></td>
                                            <td class="product_total"><a href="#">Add To Cart</a></td>
                                            <td class="product_remove"><a href="includes/deleteFromWishlist.php?remove=<?php echo $row['ID'];?>"><i class="fa fa-trash-o"></i></a></td>


                                        </tr>
                                    <?php
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--wishlist area end -->

    <?php
}  else {
?>
<div class="shopping_cart_area mt-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="coupon_inner" align=center>
                    <p>There are no items in this cart</p>
                    <form action="shop.php">
                        <button type="submit">CONTINUE SHOPPING</button>
                    </form>
                    <br><br><br>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
}
    include_once 'includes/footer.php'; 
?>