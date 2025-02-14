<?php 
include('./includes/connect.php'); 

// Check if user_id is set
if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];
}

// Get IP address
function getIPAddress() {
    // Code to get IP address
    return '127.0.0.1'; // Replace this with your code to get IP address
}

$get_ip_address = getIPAddress();
$total_price = 0;
$cart_query_price = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_address'";
$result_cart_price = mysqli_query($con, $cart_query_price);
$invoice_number = mt_rand();
$status = 'pending';
$count_products = 0;
$ordered_products = array();

while($row_price = mysqli_fetch_array($result_cart_price)){
    $product_id = $row_price['product_id'];
    $select_product = "SELECT * FROM `products` WHERE product_id=$product_id";
    $run_price = mysqli_query($con, $select_product);
    
    while($row_product_price = mysqli_fetch_array($run_price)){
        $product_name = $row_product_price['product_name']; // Get product name
        $total_price += $product_price;
        $count_products++;
        $ordered_products[] = $product_name; // Store product name for display
    }
}

// Insert order details into database
$insert_orders = "INSERT INTO `user_orders` (user_id, amount_due, invoice_number, total_products, order_date, order_status) VALUES ($user_id, $total_price, $invoice_number, $count_products, NOW(), '$status')";
$result_query = mysqli_query($con, $insert_orders);

if($result_query){
    // Display success message and redirect to profile page
    echo "<script>alert('Orders are submitted successfully')</script>";
    echo "<script>window.open('profile.php?my_orders','_self')</script>";
}

// Delete items from cart
$empty_cart = "DELETE FROM `cart_details` WHERE ip_address='$get_ip_address'";
$result_delete = mysqli_query($con, $empty_cart);

// Insert pending orders
$insert_pending_orders = "INSERT INTO `orders_pending` (user_id, invoice_number, product_id, quantity, order_status) VALUES ($user_id, $invoice_number, $product_id, $quantity, '$status')";
$result_pending_orders = mysqli_query($con, $insert_pending_orders);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordered Products</title>
</head>
<body>
    <h2>Your Ordered Products</h2>
    <table border="1">
        <tr>
            <th>Product Name</th>
        </tr>
        <?php foreach ($ordered_products as $product_name) { ?>
            <tr>
                <td><?php echo $product_name; ?></td>
            </tr>
        <?php } ?>
    </table>

    <!-- Donation Option -->
    <h2>Donate Your Ordered Products</h2>
    <form method="post" action="donate.php">
        <input type="checkbox" name="donate" value="yes"> Yes, I want to donate my ordered products to an NGO for poor and hungry people<br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
