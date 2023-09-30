<?php
require_once '././php/connect.php';

// Establish a database connection
$conn = connect();

// Check connection status
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the 'category' parameter is set in the GET request
$category = isset($_GET['category']) ? $_GET['category'] : null;

// Construct the SQL query based on the selected category (if any)
$query = "SELECT 
    inv.inventoryID as inventoryID, 
    inv.image as image, 
    inv.itemCode as itemCode,
    inv.SugPrice as SugPrice,
    inv.itemTypeID as itemTypeID
FROM inventory_tb inv";

if ($category) {
    // Sanitize input to prevent SQL injection (consider using prepared statements)
    $category = $conn->real_escape_string($category);

    $query .= " WHERE inv.itemTypeID = '$category'";
} else {
    $query .= " WHERE inv.itemTypeID = '7'";
}

$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $image = '././inventory/' . $row["image"];
        $inventoryID = $row["inventoryID"];
        $itemCode = $row["itemCode"];
        $SugPrice = $row["SugPrice"];
        $itemTypeID = $row["itemTypeID"];

        echo '<div class="box" data-category="' . $itemTypeID . '">';
        echo '<img src="' . $image . '" alt="Menu products">';
        echo '<div class="content">';
        echo '<h3>' . $itemCode . '</h3>';
        echo '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tenetur, sed.</p>';
        echo '<div style="display: flex; justify-content: space-between;">';
        echo '  <span>₱ ' . $SugPrice . '</span>';
        echo '<button class="btn costum-btn-primary m-2 addToCartBtn">Add to Cart</button>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo '<div class="no-products">No Products Available</div>';
}

// Close the database connection
$conn->close();
