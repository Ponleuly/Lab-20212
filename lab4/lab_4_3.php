<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Category</title>
    <style>
       /*CSS style*/
        table{
           
            font-size:24px;
            width:60%;
        }
        th{
            background-color:#04AA6D;
            color: white;
            border:0;
            text-align:center;   
        }
        td{
            text-align:left;
            font-size:18px;
        }
        input{
            font-size:18px;
        }
        
        
    </style>
</head>
<body> 
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
<?php

    // ----------------------Get date from input form---------------------------------------------------------
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        if (isset($_POST["id"])){
            $id = $_POST["id"];
        } else{
            $id = NULL;
        }
        if (isset($_POST["title"])){
            $title = $_POST["title"];
        } else{
            $title = NULL;
        }
        if (isset($_POST["description"])){
            $description = $_POST["description"];
        } else{
            $description = NULL;
        }
        if (isset($_POST["submit"])){
            $submit = $_POST["submit"];
        } else{
            $submit = NULL;
        }
    }
    // ---------------------------------------------------------------------------------------------------------------
    // -----------------------------Insert data into table of database------------------------------------------------
    if(isset($_POST["submit"])){
        if($id!=NULL && $title!=NULL && $description!=NULL){
             // Create connection
            $server = 'localhost';
            $username = 'Ponleu';
            $password = 'L.LEU2000@mysql';
            $mydb = 'business_service';
            $table_name = 'category';
            $connect = mysqli_connect($server, $username, $password, $mydb);
            // Check connection
            if (!$connect){
                die ("Cannot connect to $server using $username");
            } 
            // Insert date from input
            $sql = "INSERT INTO $table_name VALUES('$id', '$title', '$description')";
            // Paste input data into database
            mysqli_query($connect, $sql);
        } 
    } 
?>
    <!--//---------------------------------Output interface---------------------------------->
    <h1>Category Administration</h1>
    <table>
        <tr>
            <th style="width:5%;">Cat ID</th>
            <th style="width:25%">Title</th>
            <th style="width:30%">Description</th>
        </tr>
        <tr>
            <?php
                // Create connection
                $server = 'localhost';
                $username = 'Ponleu';
                $password = 'L.LEU2000@mysql';
                $mydb = 'business_service';
                $table_name = 'category';
                $connect = mysqli_connect($server, $username, $password, $mydb);
                
                // Check connection
                if (!$connect){
                    die ("Cannot connect to $server using $username");
                } 

                $sql = "SELECT*FROM $table_name";
                $result = mysqli_query($connect, $sql);
                if (mysqli_num_rows($result) > 0){ 
                    // Output each row
                    while ( $row = mysqli_fetch_row($result)){
                        echo "<tr>";
                            foreach($row as $field){
                                echo" <td>$field</td> ";  
                            }
                        echo "</tr>";
                    }
                } 
            ?>
        </tr>
        <tr>
            <td><input style="width:97%;" type="text" name="id"></td>
            <td><input style="width:98%;" type="text" name="title"></td>
            <td><input style="width:99%;" type="text" name="description"></td>
        </tr>
        <tr>
            <td><input style="width:100%;" type="submit" name="submit" value="Add Category" ></td>
            <td></td>
            <td></td>
        </tr>
    </table>

</form>
</body>
</html>