<?php

    if(isset($_GET['category'])){
        $category = $_GET['category'];
        $query = "SELECT * FROM products WHERE category = '".$_GET['category']."' LIMIT " . $page_first_result . ',' . $results_per_page;
    } else {
        if (isset($_POST['search_btn'])) {
            $search_key = $_POST['search_key'];
            $query = "SELECT * FROM products WHERE productName LIKE '%$search_key%' LIMIT " . $page_first_result . ',' . $results_per_page;
        } else {
            $query = "SELECT * FROM products LIMIT " . $page_first_result . ',' . $results_per_page;
        }
        
    }

    $result = mysqli_query($connection, $query);

    if (!$result) {
        printf("Error: %s\n", mysqli_error($connection));
        exit();
    }

    while ($row = mysqli_fetch_array($result)){
        $discounted_price = $row['discountPrice'];
        if(isset($_SESSION['userID'])){
            $discounted_price = $row['memberDiscountPrice'];
        }
?>  
    <div class="col-12 ">
        <article class="single_product">
            <figure>
                <div class="product_thumb">
                    <a class="primary_img" href="">
                        <img src="assets/img/product/<?php echo $row['img'];?>.jpg" alt=""></a>
                    <div class="label_product">
                        <span class="label_sale">-<?php echo $row['discount'];?>%</span>
                    </div>
                    <div class="action_links">
                        <ul>
                            <li class="add_to_cart"><a href="cart.html" title="Add to cart"><i
                                        class="icon-shopping-bag"></i></a></li>
                            <li class="wishlist"><a href="wishlist.php?add=<?php echo $row['ID']?>" title="Add to Wishlist"><i
                                        class="icon-heart"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="product_content grid_content">
                    <div class="product_price_rating">
                        <h4 class="product_name"><a href=""><?php echo $row['productName'];?></a></h4>
                        <div class="price_box">
                            <span class="current_price">LKR <?php echo $discounted_price;?></span>
                            <span class="old_price">LKR <?php echo $row['productPrice'];?></span>
                        </div>
                    </div>
                </div>
                <div class="product_content list_content">
                    <h4 class="product_name"><a href=""><?php echo $row['productName'];?></a>
                    </h4>
                    <div class="price_box">
                        <span class="current_price">LKR <?php echo $discounted_price;?></span>
                        <span class="old_price">LKR <?php echo $row['productPrice'];?></span>
                    </div>
                    <div class="product_desc">
                        <p>LKR <?php echo $row['description'];?></p>
                    </div>
                    <div class="action_links list_action_right">
                        <ul>
                            <li class="add_to_cart"><a href="cart.php?add=<?php echo $row['ID']?>" title="Add to cart">Add to cart</a></li>
                            <li class="wishlist"><a href="wishlist.php?add=<?php echo $row['ID']?>" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                        </ul>
                    </div>
                </div>
            </figure>
        </article>
    </div>
<?php
    }
?>