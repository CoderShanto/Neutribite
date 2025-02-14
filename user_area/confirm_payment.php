<!--connect file -->
<?php  
include('../includes/connect.php');
session_start();






 //bla bla

if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
    //echo $order_id;

    $select_data="Select * from `user_orders` where order_id=$order_id";
    $result=mysqli_query($con,$select_data);
    $row_fetch=mysqli_fetch_assoc($result);
    $invoice_number=$row_fetch['invoice_number'];
    $amount_due=$row_fetch['amount_due'];

    // Set session variables for invoice number and amount
    $_SESSION['invoice_number'] = $invoice_number;
    $_SESSION['amount_due'] = $amount_due;
    
}
if(isset($_POST['confirm_payment'])){
       $invoice_number=$_POST['invoice_number'];
       $amount=$_POST['amount'];
       $payment_mode=$_POST['payment_mode'];
       $insert_query="insert into `user_payments` (order_id,invoice_number,amount,payment_mode)
       values($order_id,$invoice_number,$amount,'$payment_mode')";
       $result=mysqli_query($con,$insert_query);
       if($result){

        echo "<h3 class='text-center text-light'>Successfully completed the payment</h3>";
        echo "<script>window.open('confirmation_payment.php','_self')</script>";
       
       }
       $update_orders="update `user_orders` set order_status='Complete' where order_id=$order_id";
       $result_orders=mysqli_query($con,$update_orders);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment page</title>

    <!-- bootstrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body class="bg-secondary">
    
    <div class="container my-5">
    <h1 class="text-center text-light">Confirm Your Payment</h1>
        <form action="" method="post" style="margin-top: 20px;">
            <div class="form-outline my-4 text-center w-50 mx-auto">
            <label for="" class="text-light">Invoice number</label>
                <input type="text" class="form-control w-50 mx-auto" name="invoice_number"
                value="<?php echo  $invoice_number  ?>" >
            </div>

            <div class="form-outline my-4 text-center w-50 mx-auto">
            <label for="" class="text-light">Amount</label>
                <input type="text" class="form-control w-50 mx-auto" name="amount"
                value="<?php echo $amount_due  ?>" >
            </div>

            <div class="form-outline my-4 text-center w-50 mx-auto">
                
              <select name="payment_mode" class="form-control w-50 mx-auto">
                <option>Select Payment Mode</option>
                <option>Bkash</option>
                <option>Nogod</option>
                <option>Rocket</option>
                <option>FastCash</option>
                
              
              </select>
            </div>

            <div class="form-outline my-4 text-center w-50 mx-auto">
                <input type="submit" class="bg-info py-2 px-2 border-0" value="Confirm"
                name="confirm_payment">
            </div>
  

        </form>
    </div>
    
</body>
</html>
