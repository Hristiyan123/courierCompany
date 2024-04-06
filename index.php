
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

    <!-- 
        
    CREATE TABLE users (
    user_id INT AUTO_INCREMENT,
    username VARCHAR(100),
    pwd CHAR(60),
    PRIMARY KEY(user_id)
);

CREATE TABLE places (
	place_id INT NOT NULL,
    place_name VARCHAR(100),
    region VARCHAR(50),
    zip_code INT,
    PRIMARY KEY (place_id)
);

CREATE TABLE offices (
    office_id INT NOT NULL,
    office_name VARCHAR(100),
    manager VARCHAR(100),
    address VARCHAR(255),
    phone INT,
    work_start_time TIME,
    work_end_time TIME,
    PRIMARY KEY (office_id)
);

CREATE TABLE places_offices (
    place_id INT,
    office_id INT,
    PRIMARY KEY (place_id, office_id),
    FOREIGN KEY (place_id) REFERENCES places(place_id),
    FOREIGN KEY (office_id) REFERENCES offices(office_id)
);



CREATE TABLE couriers (
    courier_id INT AUTO_INCREMENT NOT NULL ,
    personal_number VARCHAR(20),
    username VARCHAR(100),
    pwd CHAR(60),
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    phone_number INT,
    office_id INT,
    PRIMARY KEY (courier_id),
    FOREIGN KEY (office_id) REFERENCES offices(office_id)
); 

CREATE TABLE cars (
car_id INT AUTO_INCREMENT NOT NULL,
 brand VARCHAR(60),
 model VARCHAR(60),
 registration_number VARCHAR(20),
 fuel_consumation FLOAT,
 office_id INT,
 courier_id INT UNIQUE,
 PRIMARY KEY (car_id),
 FOREIGN KEY (office_id) REFERENCES offices(office_id),
 FOREIGN KEY (courier_id) REFERENCES couriers(courier_id)
 last_used_courier_id INT);-->

</body>
</html>
