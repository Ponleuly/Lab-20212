<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Listing</title>
    <style>
        *{
            box-sizing: border-box;
        }
        body{
            font-size:18px;
           
        }

        /* Create two equal columns that floats next to each other */
        .column {
            float: left;
            width: 30%;
            padding: 10px;
            height: 100%; /* Should be removed. Only for demonstration */
            
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
        p {
            font-size:18px;
        }
        option{
            font-size:18px;
        }
        
        input{
            padding:3px;
            font-size:18px;
            width:350px;
            border: 0;
            text-align:left;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }
        th {
            color: white;
            background-color:#04AA6D;
            text-align:center;
        }
       
    </style>
</head>
<body>

<form id ="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <!----------------------------- Showing business category need to show------------------------------------->
    <h1>Business Listing</h1>
    <div class="row">
        <div class="column">
            <table>
                <tr>
                    <th style="text-align:left;">Click on a category to find a business<br/>listings :</th>
                </tr>
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
                    die ("Cannot connect". mysqli_error());
                    } 
                    $sql = "SELECT Title FROM $table_name";
                    $result = mysqli_query($connect, $sql);
                    if (mysqli_num_rows($result) > 0){ 
                        // Output each row
                        while ( $row = mysqli_fetch_row($result)){
                            echo "<tr>";
                                foreach($row as $field){
                                    echo "<td align:left><input type='submit' name='submit' value='$field'></td>";
                                }
                            echo "</tr>";
                        }
                    }
                    
                ?>     
            </table>
        </div>
    <!---------------------------------------------------------------------------------------------------------->
    <!---------------------- Showing all informations after selecting business category------------------------->
        <div class="column" style="width: 70%;">
            <table style="text-align:center;">
                <th style="width:5%;">BusID</th>
                <th style="width:20%;">Business Name</th>
                <th style="width:15%;">Address</th>
                <th style="width:10%;">City</th>
                <th style="width:15%;">Telephone</th>
                <th style="width:15%;">URL</th>
                <th style="width:5%;">BusID</th>
                <th style="width:10%;">CatID</th>
                <?php
                    // Get date from input form
                    if ($_SERVER["REQUEST_METHOD"]=="POST"){
                        if(isset($_POST["submit"])){
                            $submit = $_POST["submit"];
                        
                        } else $submit = NULL;
                        if(isset($_POST["submit"])){
                            // Get CatID by Title when inputed
                            $sql = "SELECT CategoryID FROM $table_name WHERE Title = '$submit'";
                            $result = mysqli_query($connect, $sql);   
                            if (mysqli_num_rows($result)>0){
                                while ($row = mysqli_fetch_row($result)){
                                    foreach($row as $catID){
                                        // Get BusID by CatID in biz_category
                                        $sql = "SELECT BusinessID FROM biz_category WHERE CategoryID = '$catID'";
                                        $cmp = mysqli_query($connect, $sql);

                                        if (mysqli_num_rows($cmp) > 0){
                                            echo "<tr>";
                                            while ($row = mysqli_fetch_row($cmp)){
                                                foreach($row as $busID){
                                                
                                                    // Get table businesses by BusID
                                                    $sql = "SELECT*FROM business WHERE BusinessID = '$busID'";
                                                    $output = mysqli_query($connect, $sql);
                                                    if (mysqli_num_rows($output) > 0){
                                                        while ($row = mysqli_fetch_row($output)){
                                                            foreach($row as $field){
                                                                    echo "<td>$field</td>";
                                                                            
                                                            }
                                                            
                                                        }   
                                                    } 
                                                    echo "<td>$busID</td>";  
                                                    echo "<td>$catID</td>";  
                                                }
                                            echo "</tr>";
                                            }
                                        }
                                    }
                                }
                            }
                        }    
                    }   
                ?>
            </table>
        </div>
    </div>
</form>

</body>
</html>