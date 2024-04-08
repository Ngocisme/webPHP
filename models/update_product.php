<?php

include_once "../../models/Database.php";

$sql = "SELECT * FROM sanpham";
$stmt = $conn->prepare($sql);
$totalRows = $stmt->rowCount();

$stmt->execute();

