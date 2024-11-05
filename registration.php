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
        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="Register" placeholder="submit">
        </div>
        </form>
    </div>
    
</body>
</html>