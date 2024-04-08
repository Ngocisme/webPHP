<?php

include_once "../models/Database.php";

$limit = 9; 
$page = isset($_GET['page']) ? $_GET['page'] : 1; 
$limitPages = 5;

$offset = ($page - 1) * $limit;

$query = "SELECT * FROM sanpham LIMIT :limit OFFSET :offset";
$stmt = $conn->prepare($query);
$stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$countQuery = "SELECT COUNT(*) AS total FROM sanpham";
$totalStmt = $conn->query($countQuery);
$totalItems = $totalStmt->fetch(PDO::FETCH_ASSOC)['total'];

$totalPages = ceil($totalItems / $limit);

$startPage = max(1, min($page - floor($limitPages / 2), $totalPages - $limitPages + 1));
$endPage = min($startPage + $limitPages - 1, $totalPages);


