<?php
include "./config.php";

// Get the 'page' parameter from the URL
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// Based on the 'page' parameter, include the corresponding file
switch ($page) {
    case 'home':
        header('Location: http://localhost/web/views/home.php');
        break;
    case 'cart':
        header('Location: http://localhost/web/views/cart.php');
        break;
    case 'contact':
        header('Location: http://localhost/web/views/contact.php');
        break;
    case 'login':
        header('Location: http://localhost/web/views/admin/login.php');
        break;
    case 'register':
        header('Location: http://localhost/web/views/admin/register.php');
        break;
    default:
        // If the page is not found, include a 404 page
        include './views/404.php';
        break;
}