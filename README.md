Before we begin with the setup, I must mention that this project does not prioritize design aesthetics, but rather functionality.

Hello, for this project i use xampp for my local server. My SQL is locatet in C:\xampp\mysql\data\courierCompany.

In this project i use:

---many to many relationships between:

-places and offices: One office can correspond to many locations, and one location can have many offices.

---one to many relationships between:

-couriers and offices: A courier can belong to only one office, while an office can have many couriers.

-cars and couriers: One courier can drive only one car.

-offices and cars: An office can have multiple cars, and a car can be located in only one office at the time.

Folder "includes": The contents of this folder include all requests to the database.
"includes/dbh.inc.php": Database connection.
"includes/config.php": The contents here are related to cookies.

Folder: "ajax_communication": Code for dynamic content loading.

\dashboard\insert_data\inserting.php: Code for adding places, offices and cars.


