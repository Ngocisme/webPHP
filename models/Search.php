<?php

include_once "../models/Database.php";
 
if(isset($_GET['search'])) {
    $search = $_GET['search'];
    $stmt = $conn->prepare("SELECT * FROM sanpham WHERE ten_san LIKE :search OR description LIKE :search");
    $stmt->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
    $stmt->execute();
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    // If no search query, fetch all items
    $stmt = $conn->query("SELECT * FROM sanpham");
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
}