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
            $fullname = $_POST["Fullname"];
            $email = $_POST['email'];
            $password = $_POST['Password'];
            $repeat_password = $_POST['repeat_password'];
            $errors = array();
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

            //if any errors display them
            if (count($errors) > 0) {
                foreach ($errors as $error) {
                    echo "<p class='text-danger'>$error</p>";
                }
            }
            // if no errors, save the user to the database
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
        </div>
        </form>
    </div>
    
</body>
</html>