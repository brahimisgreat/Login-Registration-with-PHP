<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>
<body>
    <div class="container">
        <form action="registration.php" method="post">
        <div class="form-group">
            <input type="text" name="Fullname" placeholder="Full Name:">
        </div>
        <div class="form-group">
            <input type="email" name="email" placeholder="Email:">
        </div>
        <div class="form-group">
            <input type="Password" name="Password" placeholder="Password:">
        </div>
        <div class="form-group">
            <input type="text" name="repeat_password" placeholder="Repeat Password">
        </div>
        <div class="form-group">
            <input type="submit" name="Register" placeholder="submit">
        </div>
        </form>
    </div>
    
</body>
</html>