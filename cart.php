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
    $sql = "SELECT * FROM `cart` WHERE userID=$userID AND productID=$iteamID;";
    $result = $connection->query($sql);

    if($result->num_rows > 0) {
        header("Location: cart.php");
        exit();
    }
    
    $sql = "INSERT INTO `cart`(`productID`, `userID`) VALUES ($iteamID,$userID)";

    if ($connection->query($sql) === TRUE) {
        header("Location: cart.php");
        exit();
    } else {
        header("Location: cart.php");
        exit();
    }
}
$query    = "SELECT cart.ID, products.ID AS productID, products.img, products.productName, products.discountPrice, products.memberDiscountPrice, products.itemsAvailable FROM cart INNER JOIN products ON cart.productID=products.ID WHERE userID=$userID;";
$result = $connection->query($query);

if($result->num_rows > 0) {
?>
<div class="shopping_cart_area mt-100">
        <div class="container">
            <form action="#">
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="cart_page table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product_thumb">Image</th>
                                            <th class="product_name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product_quantity">Quantity</th>
                                            <th class="product_total">Total</th>
                                            <th class="product_remove">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    <?php
                                        $counter = 0;
                                        $sub_total = 0;
                                        while($row = $result->fetch_assoc()){
                                            $price=$row['discountPrice'];
                                            if(isset($_SESSION['userID'])){
                                                $price=$row['memberDiscountPrice'];
                                            }
                                            $sub_total += $price;
                                    ?>
                                        <tr>
                                            <td class="product_thumb">
                                                <a href=""><img src="assets/img/product/<?php echo $row['img'];?>.jpg" alt=""></a>
                                            </td>
                                            <td class="product_name"><a href="#"><?php echo $row['productName'];?></a></td>
                                            <td class="product-price">LKR <?php echo $price;?></td>
                                            <td class="product_quantity"><label>Quantity</label>
                                            <input min="1" max="<?php echo $row['itemsAvailable'];?>" value="1" type="number" id="<?php echo "nameValidation".$counter;?>" name="<?php echo "nameValidation".$price;?>"></td>
                                            
                                            <td class="product_total"><div id="<?php echo "total".$counter;?>">LKR <?php echo $price;?></div></td>
                                            <input type="hidden" name="unit_price" id="<?php echo "unit_price".$counter;?>" value="<?php echo $price;?>">
                                            <td class="product_remove"><a href="includes/deleteFromCart.php?remove=<?php echo $row['ID'];?>"><i class="fa fa-trash-o"></i></a></td>
                                        </tr>
                                        <script>
                                            $(function() {
                                                $('#<?php echo "nameValidation".$counter;?>').on('input', function() {
                                                    var nameValisession = $(this).val();
                                                    $('#<?php echo "total".$counter;?>').text("LKR "+(nameValisession*<?php echo $price;?>).toFixed(2));
                                                    sessionStorage.setItem("nameValiSession", nameValisession);
                                                }); 
                                            });
                                        </script>
                                    <?php
                                        $counter++;
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="cart_submit">
                                <button type="submit">update cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="coupon_area">
                    <div class="row">
                        <div class="col-6"></div>
                        <div class="col-6">
                            <div class="coupon_code right">
                                <h3>Cart Totals</h3>
                                <div class="coupon_inner">
                                    <div class="cart_subtotal">
                                        <p>Subtotal (LKR)</p>
                                        <p class="cart_amount" id="cart_sub_total">LKR <?php echo sprintf('%0.2f', $sub_total); ?></p>
                                    </div>
                                    <div class="cart_subtotal ">
                                        <p>Shipping</p>
                                        <p class="cart_amount"><span>Flat Rate:</span>LKR 255</p>
                                    </div>
                                    <a href="#">Calculate shipping</a>

                                    <div class="cart_subtotal">
                                        <p>Total</p>
                                        <p class="cart_amount" id="grand_total">LKR <?php echo sprintf('%0.2f', $sub_total - 255); ?></p>
                                    </div>
                                    <div class="checkout_btn">
                                        <a href="#">Proceed to Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php
} else {
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

<script>
    for (let index = 0; index < <?php echo $counter;?>; index++) {
        $('#nameValidation'+index).on('change', function() {
            let tot = 0;
            for (let index1 = 0; index1 < <?php echo $counter;?>; index1++) {
                numberValue = $('#nameValidation'+index1).val()
                unitPrice = $('#unit_price'+index1).val()
                tot += numberValue * unitPrice
            }
            $('#cart_sub_total').text("LKR "+tot.toFixed(2))
            $('#grand_total').text("LKR "+(tot - 255).toFixed(2))
        })
    }
</script>