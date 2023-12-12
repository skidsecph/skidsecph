<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Home</title>
    <link rel="stylesheet" href="./css/dash.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="script.js"></script>
</head>
<body>
    <!-- Sidebar -->
    <input type="checkbox" name="" id="check">
    <div class="container">
        <label for="check">
            <span class="fas fa-times" id="times"></span>
            <span class="fas fa-bars" id="bars"></span>
        </label>
        <div class="head">
            Admin Panel
            </a>
        </div>
        <ul>
            <li><a href="crud.php"><i class="fas fa-users"></i>  USERS</a></li>
            <li><a href="logout.php"><i class="fas fa-sign-out"></i>  Logout</a></li>
        </ul>
    </div>
    <div>
</div>
</body>
</html>