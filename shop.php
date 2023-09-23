<?php 
ob_start();
include_once 'includes/header.php';

include_once 'includes/db.php';

$query = "SELECT * FROM products";

if(isset($_GET['category'])){
    $category = $_GET['category'];
    $query = "SELECT * FROM `products` WHERE `category` = '$category' ";

}

$results_per_page = 12;
$result = mysqli_query($connection, $query);
$number_of_result = mysqli_num_rows($result);
$number_of_page = ceil ($number_of_result / $results_per_page);

if (!isset ($_GET['page']) ) {  
    $page = 1;  
} else {  
    $page = $_GET['page'];
}

$page_first_result = $results_per_page*($page-1);
$end = $page_first_result+1+$results_per_page;

if($end>$number_of_result){
    $end = $number_of_result;
}

?>
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <h3>Shop</h3>
                    <ul>
                        <li><a href="index.php">home</a></li>
                        <li>Shop</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="shop_area shop_fullwidth mt-100 mb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="shop_toolbar_wrapper">
                        <div class="shop_toolbar_btn">

                            <button data-role="grid_3" type="button" class=" btn-grid-3" data-bs-toggle="tooltip"
                                title="3"></button>

                            <button data-role="grid_4" type="button" class=" btn-grid-4" data-bs-toggle="tooltip"
                                title="4"></button>

                            <button data-role="grid_list" type="button" class="active btn-list" data-bs-toggle="tooltip"
                                title="List"></button>
                        </div>
                        <div class="page_amount">
                            <p>Showing <?php echo $page_first_result+1 ?>–<?php echo $end; ?> of <?php echo $number_of_result?> results</p>
                        </div>
                    </div>
                    <div class="row shop_wrapper grid_list">
                        <?php include 'shop_sort.php'; ?>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
<?php include_once 'includes/footer.php'; ?>