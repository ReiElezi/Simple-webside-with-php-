<?php
session_start();

if ((!isset($_SESSION['firstName']) || (!isset($_SESSION['lastName']))) ) {
    header('Location: login.html');
    exit();
}

echo "Welcome in dashboard, " . $_SESSION['firstName'] . ' ' . $_SESSION['lastName'];


// form 
// product_category
// gender_category
// products
?>