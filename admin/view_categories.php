<?php
// Ensure database connection is established
include('../includes/connect.php');
//session_start();

// Initialize variables
$filter_sql = "SELECT * FROM `categories` WHERE 1=1";

if(isset($_GET['category_title']) && $_GET['category_title'] != '') {
    $filter_sql .= " AND category_title LIKE '%{$_GET['category_title']}%'";
}

$result = mysqli_query($con, $filter_sql);
$number = 0;

// Check if any categories were found
if(mysqli_num_rows($result) == 0) {
    $no_categories_found = true;
} else {
    $no_categories_found = false;
}
?>
<?php if(!$no_categories_found): ?>
    <h3 class="text-center text-success">All Categories</h3>
    <!-- Filter Form -->
    <form method="GET" action="">
        <label for="category_title">Category Title:</label>
        <input type="text" name="category_title" id="category_title">
        <input type="submit" value="Filter" name="view_categories">
    </form>

    <!-- Categories Table -->
    <table class="table table-bordered mt-5">
        <thead class="bg-info">
            <tr class="text-center">
                <th>SL no</th>
                <th>Category title</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
            <?php
            while($row = mysqli_fetch_assoc($result)) {
                $category_id = $row['category_id'];
                $category_title = $row['category_title'];
                $number++;
            ?>
            <tr class="text-center">
                <td><?php echo $number; ?></td>
                <td><?php echo  $category_title; ?></td>
                <td><a href='index.php?edit_category=<?php echo  $category_id ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='index.php?delete_category=<?php echo  $category_id ?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No categories found.</p>
<?php endif; ?>
