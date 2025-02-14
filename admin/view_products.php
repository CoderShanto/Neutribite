<?php
// Ensure database connection is established
include('../includes/connect.php');
//session_start();

// Initialize variables
$filter_sql = "SELECT * FROM `products` WHERE 1=1";

if(isset($_GET['product_title']) && $_GET['product_title'] != '') {
    $filter_sql .= " AND product_title LIKE '%{$_GET['product_title']}%'";
}
if(isset($_GET['min_price']) && $_GET['min_price'] != '') {
    $filter_sql .= " AND product_price >= {$_GET['min_price']}";
}
if(isset($_GET['max_price']) && $_GET['max_price'] != '') {
    $filter_sql .= " AND product_price <= {$_GET['max_price']}";
}
if(isset($_GET['status']) && $_GET['status'] != '') {
    $filter_sql .= " AND status = '{$_GET['status']}'";
}

$result = mysqli_query($con, $filter_sql);
$number = 0;

// Check if any products were found
if(mysqli_num_rows($result) == 0) {
    $no_products_found = true;
} else {
    $no_products_found = false;
}
?>
<?php if(!$no_products_found): ?>
    <h3 class="text-center text-success">All Products</h3>
    <!-- Filter Form -->
    <form method="GET" action="">
        <label for="product_title">Product Title:</label>
        <input type="text" name="product_title" id="product_title">
        <label for="min_price">Minimum Price:</label>
        <input type="text" name="min_price" id="min_price">
        <label for="max_price">Maximum Price:</label>
        <input type="text" name="max_price" id="max_price">
        <label for="status">Status:</label>
        <select name="status" id="status">
            <option value="">All</option>
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
        </select>
        <input type="submit" value="Filter" name="view_products">
    </form>

    <!-- Product Table -->
    <table class="table table-bordered mt-5 text-center">
        <thead class="bg-info">
            <tr>
                <th>Product ID</th>
                <th>Product Title</th>
                <th>Product Image</th>
                <th>Product Price</th>
                <th>Total Sold</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
            <?php
            while($row = mysqli_fetch_assoc($result)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $status = $row['status'];
                $number++;
            ?>
            <tr class='text-center'>
                <td><?php echo $number; ?></td>
                <td><?php echo $product_title; ?></td>
                <td><img src='./product_images/<?php echo $product_image1;?>' class='product_img'/></td>
                <td><?php echo $product_price;?>/-</td>
                <td>
                    <?php
                    $get_count="Select * from `orders_pending` where product_id=$product_id";
                    $result_count=mysqli_query($con,$get_count);
                    $rows_count=mysqli_num_rows($result_count);
                    echo $rows_count;
                    ?>
                </td>
                <td><?php echo $status; ?></td>
                <td><a href='index.php?edit_products=<?php echo  $product_id ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='index.php?delete_product=<?php echo  $product_id ?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
<?php else: ?>
    <h1><p class="text-danger text-center">No products found.</p></h1>
<?php endif; ?>
