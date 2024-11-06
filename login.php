<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <?php 
           if(isset($_POST["login"])){
               $email = $_POST["email"];
               $password = $_POST["password"];
               require_once "database.php";
               $sql = "SELECT * FROM users WHERE email = '$email'";
               $result = mysqli_query($conn, $sql);
               $rowCount = mysqli_num_rows($result);
               if ($rowCount > 0) {
                   $user = mysqli_fetch_assoc($result);
                   $passwordHash = $user["password"];
                   if (password_verify($password, $passwordHash)) {
                        header("Location: index.php");
                       echo "<p class='text-success'>Login successful</p>";
                   }else{
                       echo "<p class='text-danger'>Invalid email or password</p>";
                   }
               }else{
                   echo "<p class='text-danger'>Invalid email or password</p>";
               }
           }
        ?>
        <form action="login.php" method="post">
            <div class="form-group">
                <input type="email" placeholder="Enter Email:" name="email" class="form-control">
            </div>
            <div class="form-group">
                <input type="text" placeholder="Enter Password:" name="password" class="form-control">
            </div>
            <div class="form-btn">
                <input type="submit"  value="Login" name="login" class="btn btn-primary">
                <a href="registration.php" class="btn btn-primary">sign up</a>
            </div>

        </form>
    </div>
</body>
</html>