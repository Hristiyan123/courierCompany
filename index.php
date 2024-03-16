
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration and Update Forms</title>
</head>
<body>

    <h3>SignUp</h3>

    <form action="includes/formhandler.inc.php" method="post">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="pwd" placeholder="Password">
        <input type="text" name="email" placeholder="E-mail">
        <button type="submit">SignUp</button>
    </form>

    <a href="couriers_registration.php">Register as Courier</a>

    <a href="users_login.php">You already have an account?</a>
</body>
</html>
