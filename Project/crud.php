<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="crud.css">
    <style>
.material-symbols-outlined {
  right: 50px;
  top: 25px;
  cursor: pointer;
  position: absolute;
  font-size: 62px;
  color:white;
  opacity:0.7;
  font-variation-settings:
  'FILL' 0,
  'wght' 400,
  'GRAD' 0,
  'opsz' 24
}

.material-symbols-outlined:hover {
  color: aqua;
  opacity: 0.5;
}
</style>
</head>
<body>
  <div class="container">
    <button class="btn btn-primary my-5"><a href="add.php" class="text-light"> Add user</a>
  </button>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Full Name</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>

  <?php
    $sql = "SELECT * FROM register";
    $result = mysqli_query($conn,$sql);
    if($result){
      while($row = mysqli_fetch_assoc($result)){
        $id = $row['id'];
        $fullname = $row['full_name'];
        $username = $row['username'];
        $email = $row['email'];
        $password = $row['password'];
        echo '<tr>
        <th scope="row">'.$id.'</th>
        <td>'.$fullname.'</td>
        <td>'.$username.'</td>
        <td>'.$email.'</td>
        <td>'.$password.'</td>
        <td>
        <button class="btn btn-primary"><a href="update.php?updateid='.$id.'" class="text-light">Update</a></button>
        <button class="btn btn-danger"><a href="delete.php?deleteid='.$id.'" class="text-light">Delete</a></button>
        </td>
      </tr>';
      }
    }
  ?>

  </tbody>
</table>
<a href="merge3.php"><span class="material-symbols-outlined">
home
</span></a>
  </div>
</body>
</html>