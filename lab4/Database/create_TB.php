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

    $servername = "localhost";
    $username = "Ponleu";
    $password = "L.LEU2000@mysql";
    $mydb = 'business_service';
    $table_name = 'biz_category';
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $mydb);
    // Check connection
    if (!$conn) {
        die ("Cannot connect to $servername using $username");
    } else {
    
    // sql to craete table  
    /*
    $sql = "CREATE TABLE $table_name (
        ProductID INT UNSIGNED NOT NULLAUTO_INCREMENT PRIMARY KEY,
        Product_desc VARCHAR(50),
        Cost INT, 
        Weight INT, 
        Numb INT)";
    */
    /*
    // business Table
    $sql = "CREATE TABLE $table_name (
        BusinessID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
        Name VARCHAR(50),
        Address VARCHAR(50),
        City VARCHAR(50),
        Telephone VARCHAR(50),
        URL VARCHAR(50)
    )";
    */
    /*
    // Category Table
    $sql = "CREATE TABLE $table_name (
        CategoryID VARCHAR(15) PRIMARY KEY,
        Title VARCHAR(50),
        Description VARCHAR(100)
    )";
    */
    // Biz_Category
    $sql = "CREATE TABLE $table_name (
        BusinessID INT UNSIGNED NOT NULL,
        CategoryID VARCHAR(15)
   
    )";
    if (mysqli_query($conn, $sql)){
        echo "Successfully!";
    } else {
        die ("Table Create Creation Failed sql=$sql");
    }
    mysqli_close($conn);
    
    }


?>
</body>
</html>