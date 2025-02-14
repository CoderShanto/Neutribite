<?php include('../includes/connect.php'); 
include('../functions/common_function.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User registration</title>
     <!--!bootstrap css link -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<div class="container-fluid my-3">

<h2 class="text-center">New User Registration</h2>
<div class="row d-flex align-items-center justify-content-center"> <!-- taking form in middle -->
<div class="col-lg-12 col-xl-6">
    <form action="" method="post" enctype="multipart/form-data">
    
    <!-- username field -->
    <div class="form-outline mb-4">
        <label for="user_username" class="form-label">Username</label>
        <input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off"
        required="required" name="user_username"/>
    </div>

    <!-- email field -->
    <div class="form-outline mb-4">
        <label for="user_email" class="form-label">Email</label>
        <input type="email" id="user_email" class="form-control" placeholder="Enter your email" autocomplete="off"
        required="required" name="user_email"/>
    </div>

     <!-- image field -->
     <div class="form-outline mb-4">
        <label for="user_image" class="form-label">User Image</label>
        <input type="file" id="user_image" class="form-control" required="required" name="user_image"/>
    </div>

     <!-- password field -->
     <div class="form-outline mb-4">
        <label for="user_password" class="form-label">Password</label>
        <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off"
        required="required" name="user_password"/>
    </div>

    <!-- confirm password field -->
    <div class="form-outline mb-4">
        <label for="conf_user_password" class="form-label">Confirm Password</label>
        <input type="password" id="conf_user_password" class="form-control" placeholder="Confirm Password" autocomplete="off"
        required="required" name="conf_user_password"/>
    </div>

    <!-- address field -->
    <div class="form-outline mb-4">
        <label for="user_address" class="form-label">Address</label>
        <input type="text" id="user_address" class="form-control" placeholder="Enter your address" autocomplete="off"
        required="required" name="user_address"/>
    </div>

    <!-- contact field -->
    <div class="form-outline mb-4">
        <label for="user_contact" class="form-label">Contact</label>
        <input type="text" id="user_contact" class="form-control" placeholder="Enter your mobile number" autocomplete="off"
        required="required" name="user_contact"/>
    </div>

    <div class="mt-4 pt-2">
        <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="user_register">
        <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account?<a href="user_login.php" class="text-danger">  Login</a></p>
    </div>
    </form>

</div>

</div>

</div>
    
</body>
</html>

<!--php code-->
<?php

if(isset($_POST['user_register'])){

    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $conf_user_password=$_POST['conf_user_password'];
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];
    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];
    $user_ip=getIPAddress();
   

    //select query
    //$select_query=="Select * from `user_table` where username='$user_username'";
    $select_query = "SELECT * FROM `user_table` WHERE username='$user_username' or
    user_email='$user_email'";

    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>alert('User name and email already exist')</script>";
    }else if($user_password!=$conf_user_password){
        echo "<script>alert('Passwords do not match')</script>";
    }
    
    else{


     //insert_query
     move_uploaded_file($user_image_tmp,'./user_images/$user_image');
     $insert_query="insert into `user_table`  (username,user_email,user_password,
     user_image,user_ip,user_address,user_mobile) values('$user_username','$user_email','$hash_password',

    '$user_image','$user_ip','$user_address','$user_contact')";
    $sql_execute=mysqli_query($con,$insert_query);
 

    }

    //selecting cart items
    $select_cart_items="Select * from `cart_details` where ip_address='$user_ip'";
    $result_cart=mysqli_query($con,$select_cart_items);
    $rows_count=mysqli_num_rows($result_cart);
    if($rows_count>0){
        $_SESSION['username']= $user_username;
        echo "<script>alert('You have items in your cart')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    }else{
        echo "<script>window.open('../index.php','_self')</script>";
    }


   
}  



?>