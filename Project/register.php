
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/form.css">
</head>
<body>
    <div class="container">
        <?php
            if (isset($_POST["submit"])) {
                $fullname = $_POST["fullname"];
                $username = $_POST["username"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                $passwordrepeat = $_POST["passwordrepeat"];

                $passwordHash = password_hash($password, PASSWORD_BCRYPT);
                $errors = array();

                if (empty($fullname) OR empty($username) OR empty($email) OR empty($password) OR empty($passwordrepeat)) {
                    array_push($errors, "All fields are required");
                }
                
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    array_push($errors, "Email is not valid");
                }

                if (strlen($password) < 8) {
                    array_push($errors, "Password must be at least 8 characters long");
                }

                if ($password !== $passwordrepeat) {
                    array_push($errors, "Password does not match");
                }
                require_once "db.php";
                $sql = "SELECT * FROM register WHERE email = '$email'";
                $result = mysqli_query($conn, $sql);
                $rowCount = mysqli_num_rows($result);
                if ($rowCount > 0) {
                    array_push($errors, "Email already exists !");
                }
                if (count($errors) > 0) {
                    foreach ($errors as $error) {
                        echo "<div class='alert alert-danger'>$error</div>";
                    }
                } else {
                    $sql = "INSERT INTO register (full_name, username, email, password) VALUE ( ?, ?, ?, ? )";
                    $stmt = mysqli_stmt_init($conn);
                    $prepareStmt = mysqli_stmt_prepare($stmt, $sql);

                    if ($prepareStmt) {
                        mysqli_stmt_bind_param($stmt, "ssss", $fullname, $username, $email, $passwordHash);
                        mysqli_stmt_execute($stmt);
                        echo "<div class='alert alert-success'>Registered Successfully.</div>";
                    } else {
                        die("Something went wrong");
                    }
                }
            }
        ?>
        <form action="register.php" method="post">
            <h1>REGISTER</h1>
            <div class="form-group">
                <input type="text" class="form-control" name="fullname" placeholder="Full Name">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Username">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="passwordrepeat" placeholder="Confirm Password">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Register" name="submit" class="btn">
            </div>
        </form>
        <h5>Already have an account ? <a href="login.php">Sign in</a></h5>
    </div>
    
</body>
</html>