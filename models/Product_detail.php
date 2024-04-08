<?php

include_once "../models/Database.php";

    $productId = $_GET['id_sp'];
    $stmt = $conn->prepare("SELECT * FROM sanpham WHERE id_sp = ?");
    $stmt->execute([$productId]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    $productId = $product['id_sp'];
    $productName = $product['ten_sp'];
    $productPrice = $product['gia'];
    $productDiscount = $product['gia_km'];
    $productImg = $product['hinh'];
    $productView = $product['soluotxem'];
    $productDesc = $product['mota'];

    $formatted_amount = number_format($productPrice, 0, ',', '.');
    
    