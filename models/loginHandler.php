<?php
session_start();
include_once './Database.php';

// Login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $err = $_SESSION['error'];
    try {
        // Prepare SQL statement to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);

        $user = $stmt->fetch();

        if ($user['email'] === $email && $user['matkhau'] === $password) {
            // Password is correct, start session
            // Check admin
            if ($user['vaitro'] === 0) {
                $_SESSION['user'] = $user;
                header("Location: http://localhost/web/views/admin/home.php"); // Redirect to dashboard or any other page
                exit();
            } elseif ($user['vaitro'] === 1) {
                $_SESSION['user'] = $user;
                header("Location: http://localhost/web/views/home.php"); // Redirect to dashboard or any other page
                exit();
            }

        } else {
            // Incorrect email or password
            if($email = " " && $password = " "){
                header("Location: http://localhost/web/views/admin/login.php?err=Login Failed"); // Redirect to dashboard or any other page
                exit();
            }
            
           
        }
    } catch (PDOException $e) {
        // Handle database errors
        echo "Error: " . $e->getMessage();
    }
}