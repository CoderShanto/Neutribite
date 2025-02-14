<?php 
if(isset($_GET['edit_products'])){
    $edit_id = $_GET['edit_products'];
    
    // Retrieve product data including category and brand information
    $get_data = "SELECT p.*, c.category_title, b.brand_title
                 FROM `products` p
                 LEFT JOIN `categories` c ON p.category_id = c.category_id
                 LEFT JOIN `brands` b ON p.brand_id = b.brand_id
                 WHERE p.product_id = $edit_id";
    
    $result = mysqli_query($con, $get_data);
    $row = mysqli_fetch_assoc($result);
    
    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    $product_keywords = $row['product_keywords'];
    $category_title = isset($row['category_title']) ? $row['category_title'] : 'Not specified';
    $brand_title = isset($row['brand_title']) ? $row['brand_title'] : 'Not specified';
    $product_image1 = $row['product_image1'];
    $product_image2 = $row['product_image2'];
    $product_image3 = $row['product_image3'];
    $product_price = $row['product_price'];
}

/*
    //fetching category name
    $select_category="Select * from `categories` where category_id =$category_id";
    $result_category=mysqli_query($con,$select_category);
    $row_category=mysqli_fetch_assoc($result_category);
    $category_title=$row_category['category_title'];
    //echo  $category_title."<br>";

    
    //fetching category name
    $select_brand="Select * from `brands` where brand_id=$brand_id";
    $result_brand=mysqli_query($con,$select_brand);
    $row_brand=mysqli_fetch_assoc($result_brand);
    $brand_title=$row_brand['brand_title'];
    //echo  $category_brand."<br>";
//}
*/
?>

<div class="container mt-5 mb-4">
    <h1 class="text-center">Edit Product</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 mx-auto mb-4">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" id="product_title" value="<?php echo $product_title  ?>" name="product_title" class="form-control"
            required="required">
        </div>

        <div class="form-outline w-50 mx-auto my-4">
            <label for="product_desc" class="form-label">Product Description</label>
            <input type="text" id="product_desc" name="product_desc" value="<?php echo $product_description  ?>"  class="form-control"
            required="required">
        </div>

        <div class="form-outline w-50 mx-auto mb-4">
            <label for="product_keywords" class="form-label">Product Keywords</label>
            <input type="text" id="product_keywords" value="<?php echo $product_keywords  ?>" name="product_keywords" class="form-control"
            required="required">
        </div>

        <div class="form-outline w-50 mx-auto mb-4">
        <label for="product_category" class="form-label">Product Category</label>
           <select name="product_category" class="form-select  w-100 mx-auto py-2 px-2">
            <option value="<?php echo $category_title ?>"><?php echo $category_title ?></option>
            <?php   
            $select_category_all="Select * from `categories`";
            $result_category_all=mysqli_query($con,$select_category_all);
            while($row_category_all=mysqli_fetch_assoc($result_category_all)){
                $category_title=$row_category_all['category_title'];
                $category_id=$row_category_all['category_id'];
                echo "<option value='$category_id'>$category_title</option>";

               };
                   
            ?>
           </select>
        </div>

        <div class="form-outline w-50 mx-auto mb-4">
        <label for="product_brands" class="form-label">Product Brands</label>
           <select name="product_brands" class="form-select w-100 m-auto py-2 px-2">
            <option value="<?php echo $brand_title ?>"><?php echo $brand_title ?></option>
            <?php   
            $select_brand_all="Select * from `brands`";
            $result_brand_all=mysqli_query($con,$select_brand_all);
            while($row_brand_all=mysqli_fetch_assoc($result_brand_all)){
                $brand_title=$row_brand_all['brand_title'];
                $brand_id=$row_brand_all['brand_id'];
                echo "<option value='$brand_id'>$brand_title</option>";

            };
                   
            ?>
           </select>
        </div>

        <div class="form-outline w-50 mx-auto mb-4">
            <label for="product_image1" class="form-label">Product Image1</label>
            <div class="d-flex">
            <input type="file" id="product_image1" name="product_image1" class="form-control w-90 m-auto"
            required="required">
            <img src="./product_images/<?php echo  $product_image1?>" alt="" class="product_img">
            </div>
        </div>

        <div class="form-outline w-50 mx-auto mb-4">
            <label for="product_image2" class="form-label">Product Image2</label>
            <div class="d-flex">
            <input type="file" id="product_image2" name="product_image2" class="form-control w-90 m-auto"
            required="required">
            <img src="./product_images/<?php echo  $product_image2?>" alt="" class="product_img">
            </div>
        </div>

        <div class="form-outline w-50 mx-auto mb-4">
            <label for="product_image3" class="form-label">Product Image3</label>
            <div class="d-flex">
            <input type="file" id="product_image3" name="product_image3" class="form-control w-90 m-auto"
            required="required">
            <img src="./product_images/<?php echo  $product_image3?>" alt="" class="product_img">
            </div>
        </div>

        <div class="form-outline w-50 mx-auto my-4">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" id="product_price"  value=<?php echo $product_price  ?> name="product_price" class="form-control"
            required="required">
        </div>

        <div class="w-50 m-auto">
            <input type="submit" name="edit_product" value="Update Product" class="btn btn-info px-3 mb-3">
        </div>


    </form>
</div>

<!--editing products -->
<?php
if(isset($_POST['edit_product'])){
    $product_title=$_POST['product_title'];
    $product_desc=$_POST['product_desc'];
    $product_keywords=$_POST['product_keywords'];
    $product_category=$_POST['product_category'];
    $product_brands=$_POST['product_brands'];
    $product_price=$_POST['product_price'];

    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];

    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];

    //checking if fields empty or not
    if($product_title=='' or $product_desc=='' or $product_keywords=='' or $product_category=='' or
    $product_brands=='' or $product_image1=='' or $product_image2=='' or $product_image3=='' or
    $product_price==''){
        echo "<script>alert('Please fill all the fields and continue the process')</script>";
    }else{
        move_uploaded_file($temp_image1,"./product_images/$product_image1");
        move_uploaded_file($temp_image2,"./product_images/$product_image2");
        move_uploaded_file($temp_image3,"./product_images/$product_image3");
// Escape special characters in the input values
$product_title = mysqli_real_escape_string($con, $_POST['product_title']);
$product_desc = mysqli_real_escape_string($con, $_POST['product_desc']);
$product_keywords = mysqli_real_escape_string($con, $_POST['product_keywords']);
$product_category = mysqli_real_escape_string($con, $_POST['product_category']);
$product_brands = mysqli_real_escape_string($con, $_POST['product_brands']);
$product_price = mysqli_real_escape_string($con, $_POST['product_price']);
$edit_id = mysqli_real_escape_string($con, $_GET['edit_products']);

// Build the update query with escaped values
$update_product = "UPDATE `products` SET 
    product_title = '$product_title',
    product_description = '$product_desc',
    product_keywords = '$product_keywords',
    category_id = '$product_category',
    brand_id = '$product_brands',
    product_image1 = '$product_image1',
    product_image2 = '$product_image2',
    product_image3 = '$product_image3',
    product_price = '$product_price',
    date = NOW()
    WHERE product_id = $edit_id";

// Execute the update query
$result_update = mysqli_query($con, $update_product);

if ($result_update) {
    echo "<script>alert('Product updated successfully')</script>";
    echo "<script>window.open('./insert_product.php','_self')</script>";
} else {
    echo "Error updating product: " . mysqli_error($con);
}

    }
}


?>