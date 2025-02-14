<?php
// Ensure database connection is established
include('../includes/connect.php');
//session_start();

// Initialize variables
$filter_sql = "SELECT * FROM `brands` WHERE 1=1";

if(isset($_GET['brand_title']) && $_GET['brand_title'] != '') {
    $filter_sql .= " AND brand_title LIKE '%{$_GET['brand_title']}%'";
}

$result = mysqli_query($con, $filter_sql);
$number = 0;

// Check if any brands were found
if(mysqli_num_rows($result) == 0) {
    $no_brands_found = true;
} else {
    $no_brands_found = false;
}
?>
<?php if(!$no_brands_found): ?>
    <h3 class="text-center text-success">All Brands</h3>
    <!-- Filter Form -->
    <form method="GET" action="">
        <label for="brand_title">Brand Title:</label>
        <input type="text" name="brand_title" id="brand_title">
        <input type="submit" value="Filter" name="view_brands">
    </form>

    <!-- Brands Table -->
    <table class="table table-bordered mt-5">
        <thead class="bg-info">
            <tr class="text-center">
                <th>SL no</th>
                <th>Brand title</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
            <?php
            while($row = mysqli_fetch_assoc($result)) {
                $brand_id = $row['brand_id'];
                $brand_title = $row['brand_title'];
                $number++;
            ?>
            <tr class="text-center">
                <td><?php echo $number; ?></td>
                <td><?php echo  $brand_title; ?></td>
                <td><a href='index.php?edit_brands=<?php echo  $brand_id ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='index.php?delete_brands=<?php echo  $brand_id ?>' type="button" class="text-light" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class='fa-solid fa-trash'></i></a></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No brands found.</p>
<?php endif; ?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h4>Are you sure you want to delete this?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><a href="./index.php?view_brands" class='text-light text-decoration-none'>No</a></button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_brands=<?php echo  $brand_id ?>' class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>
