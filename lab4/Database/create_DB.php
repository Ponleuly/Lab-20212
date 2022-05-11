<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
        // -- The "CREATE DATABASE" statement is used to create a database in MySQL.
        // -- When you create a new database, you must only specify 
        //      the first three arguments to the mysqli object (servername, username and password).
        // --If you have to use a specific port, add an empty string for the database-name argument, 
        //      like this: new mysqli("localhost", "username", "password", "", port)
        // 


    $servername = "localhost";
    $username = "Ponleu";
    $password = "L.LEU2000@mysql";

        // Create connection
    $conn = mysqli_connect($servername, $username, $password);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Create database
    $sql = "CREATE DATABASE business_service";
    if (mysqli_query($conn, $sql)) {
        echo "Database created successfully";
    } else {
        echo "Error creating database: " . mysqli_error($conn);
    }

    mysqli_close($conn);


?>
</body>
</html>