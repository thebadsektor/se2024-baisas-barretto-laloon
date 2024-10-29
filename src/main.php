<?php
session_start();

// Log out functionality
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php"); // Redirect to the login page after logout
    exit;
}

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php"); // Redirect to login if not logged in
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="index.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
    <title>Aisle Checker</title>
    <style>
        body, html {
            font-family: 'Roboto', sans-serif;
            background-image: url("background.jpg");
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: cover;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="jumbotron text-center">
        <div class="container">
        <h1><i class="fas fa-map-marker-alt"></i> Product Locator</h1>
            <form class="form-inline justify-content-center mb-3" onsubmit="return false;">
                <input type="text" name="productName" id="input" autocomplete="off" placeholder="Search for a product...">
                <button type="button" class="btn btn-primary ml-2" onclick="start()" id="myBtn">Find</button>
            </form>

            <span id="error" class="text-danger"></span>
            <span id="good" class="text-success"></span>

            <div id="section">
                <p class="bank">Word Bank:</p>
                <p class="products" id="products">milk, eggs, cheese, lettuce, tomatoes, onions, shampoo, soap, toothpaste</p>
            </div>
        </div>
    </div>
    <div class="jumbotron text-center">
        <p class="intro">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
        <div class="mt-3">
            <a href="?logout=true" class="btn btn-danger">Log Out</a>
        </div>
    </div>
    <script src="index.js"></script> <!-- Include your index.js file here -->
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>
