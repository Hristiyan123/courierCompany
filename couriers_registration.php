<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h3>SingUp for courier</h3>

    <form action="includes/couriers_formhandler.inc.php" method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="text" name="phone_number" placeholder="Number" required>
        <input type="password" name="pwd" placeholder="Password" required>
        <input type="text" name="first_name" placeholder="First name" required>
        <input type="text" name="last_name" placeholder="Last name" required>
        <button type="submit">Register as Courier</button>
    </form>

    <a href="couriers_login.php">You already have an account?</a>

</body>
</html>
