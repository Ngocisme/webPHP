<?php

include_once "../../models/Database.php";

if(isset($_GET['product_id'])) {
    // Sanitize the product ID to prevent SQL injection
    $product_id = htmlspecialchars($_GET['product_id']);
    
    // SQL query to delete the product with the given ID
    $sql = "DELETE FROM sanpham WHERE id_sp = :product_id";
    
    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);
    
    // Bind the product ID parameter
    $stmt->bindParam(':product_id', $product_id);
    
    // Execute the statement
    $stmt->execute();
    
    echo "Product with ID $product_id has been deleted successfully.";
    echo "</br>";
    echo "<a href='./show_tables.php'>Back To Table</a>";

} else {
    echo "Fail to delete";
}


