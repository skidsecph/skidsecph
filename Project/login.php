
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/form.css">
</head>
<body>
    <div class="container2">
        <form action="login.php" method="post">
            <?php
                if(isset($_POST["login"])) {
                    $username = $_POST["username"];
                    $password = $_POST["password"];
                    require_once "db.php";
                    $sql = "SELECT * FROM register WHERE username = '$username'";
                    $result = mysqli_query($conn, $sql);
                    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    if($user) {
                        if(password_verify($password, $user["password"])) {
                            session_start();
                            $_SESSION["user"] = "yes";
                            header("Location: dashboard.php");
                            die();
                        } 
                        else {
                            echo "<div class='alert alert-danger'>Password does not match</div>";
                        }
                    } else {
                        echo "<div class='alert alert-danger'>Username does not match</div>";
                    }
                }
            ?>
            <h1>LOGIN</h1>
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Enter Password">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Login" name="login" class="btn">
            </div>
        </form>
        <h5>Don't have an account ? <a href="./register.php">Sign up</a></h5>
    </div>
    
</body>
</html>