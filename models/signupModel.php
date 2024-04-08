<?php

include_once "../config.php";
include_once "../models/Database.php";


function upFile($image)
{
   
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $firstName = $_POST["FirstName"];
    $lastName = $_POST["LastName"];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repassword = $_POST['passwordRepeat'];
    $image = $_FILES['fileUpload']['name'];

    // $dest = "../public/img/" . $image['fileUpload']['name'];
    // $fil = $image['fileUpload']['tmp_name'];
    // move_uploaded_file($fil, $dest);

    if($password != $repassword) {
        header('Location: http://localhost/web/views/admin/register.php?err=Password does not match');
    }else{
    // Prepare SQL statement to prevent SQL injection
    $sql = "INSERT INTO users (ho, ten, matkhau, email, hinh) VALUES (:firstName, :lastName, :password, :email, :image)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':firstName', $firstName);
    $stmt->bindParam(':lastName', $lastName);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':image', $image);

    $stmt->execute();

    $infor = $stmt->fetch(PDO::FETCH_ASSOC);


   
    header('Location: http://localhost/web/views/admin/login.php?success=successfully');

    exit;

    }
}