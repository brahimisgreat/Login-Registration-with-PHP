<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <?php 

          if (isset($_POST["submit"])) {
            //get the form data
            $fullname = $_POST["Fullname"];
            $email = $_POST['email'];
            $password = $_POST['Password'];
            $repeat_password = $_POST['repeat_password'];

            //initialize an array to store errors
            $errors = array();

            //hash the password
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            //validate the form
            if (empty($fullname) OR empty($email) OR empty($password) OR empty($repeat_password)) {
                array_push($errors, "All fields are required");
            }  
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, "Invalid Email");
            }
            if ($password != $repeat_password) {
                array_push($errors, "Passwords do not match");
            }
            if (strlen($password) < 8 ) {
                array_push($errors, "Password must be at least 8 characters");
            }
            
            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $rowCount = mysqli_num_rows($result);
            if ($rowCount > 0) {
                array_push($errors, "Email already exists");
            }

            //if any errors display them
            // if no errors, save the user to the database
            if (count($errors) > 0) {
                foreach ($errors as $error) {
                    echo "<p class='text-danger'>$error</p>";
                }
            }else{
                $sql = "INSERT INTO users (full_name, email, Password) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                if($prepareStmt){
                    mysqli_stmt_bind_param($stmt, "sss", $fullname, $email, $passwordHash);
                    mysqli_stmt_execute($stmt);
                    echo "<p class='alert alert-success'>Registration Successful<p>";
                }else {
                    die("something went wrong");
                }
            }
        }
           
        ?>
        <form action="registration.php" method="post">
        <div class="form-group">
            <input  class="form-control" type="text" name="Fullname" placeholder="Full Name:">
        </div>
        <div class="form-group">
            <input  class="form-control" type="email" name="email" placeholder="Email:">
        </div>
        <div class="form-group">
            <input  class="form-control" type="Password" name="Password" placeholder="Password:">
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="repeat_password" placeholder="Repeat Password">
        </div>
        <div class="form-btn">
            <input class="btn btn-primary" type="submit" value="Register" name="submit" placeholder="Register">
            <a href="login.php" class="btn btn-primary">login</a>
        </div>
        </form>
    </div>
    
</body>
</html>