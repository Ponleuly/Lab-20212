<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Registration</title>
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
            width: 25%;
            padding: 10px;
            height: 500px; /* Should be removed. Only for demonstration */
            
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
        td{
            padding:3px;
            font-size:18px;
        }
        input{
            padding:3px;
            font-size:18px;
            width:500px;
        }
    </style>
</head>
<body>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <!----------------------------------------Show interface------------------------------------------- -->
    <h1>Business Registration</h1>
    <!--Alerm information inserted successfully-->
    <?php 
        if (isset($_POST["submit"]) ){
                echo "Record inserted as shown below";
        }
    ?>

    <div class="row">
        <div class="column"> <!--style="background-color:gray"-->
        <!--Alerm after record successfully-->
            <?php 
                if (isset($_POST["submit"]) ){
                    echo "<p>Selected category values <br> are highlighted</p>";
                } else echo"<p>Click on one, or control click on <br> multiple categories</p>";
            ?>
        <!------------------------------------Selecting business category---------------------------------------->    
            <select name="select[]" id="select" multiple>
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
                    //---- Selecte title from Category---------//
                    $sql = "SELECT Title FROM $table_name";
                    $result = mysqli_query($connect, $sql);
                    
                    if (mysqli_num_rows($result) > 0){ 
                        // Output each row
                        while ( $row = mysqli_fetch_row($result)){
                            foreach($row as $field){
                                if (isset($_POST["select"]) && in_array("$field", $_POST["select"])){
                                        echo"<option  value = '$field' selected='selected'>$field</option>";
                                } else {
                                    echo"<option value= '$field'>$field</option>"; 
                                }
                            }
                        }
                    } 
                ?>
            </select>
            <!-------------------------- Add more businesses------------------------------------------------->
            <?php 
                if (!isset($_POST["submit"])){
                    echo "<p><br><input style='width:60%; background-color:#04AA6D; color:white;' type='submit' name='submit' value='Add Business'></p>";
                } else{
                     echo "<p><br><a style='color:#04AA6D;' href='lab_4_4.php'>Add Another Business</a></p>";
                }
            ?>
        </div>
        <!---------------------------------- Form to insert business information ------------------------------>
        <div class="column" style=" width: 75%;">
            <table >    
                <tr>
                    <td>Business Name:</td>
                    <td><input type="text" name="name" 
                            value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name'], ENT_QUOTES) : ''; ?>"></td>
                </tr>
                <tr>
                    <td>address:</td>
                    <td><input type="text" name="address" 
                            value="<?php echo isset($_POST['address']) ? htmlspecialchars($_POST['address'], ENT_QUOTES) : ''; ?>"></td>
                </tr>
                <tr>
                    <td>City:</td>
                    <td><input type="text" name="city" 
                            value="<?php echo isset($_POST['city']) ? htmlspecialchars($_POST['city'], ENT_QUOTES) : ''; ?>"></td>
                </tr>
                <tr>
                    <td>Telephone:</td>
                    <td><input type="text" name="phone"
                            value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone'], ENT_QUOTES) : ''; ?>"></td>
                </tr>
                <tr>
                    <td>URL:</td>
                    <td><input type="text" name="url"
                            value="<?php echo isset($_POST['url']) ? htmlspecialchars($_POST['url'], ENT_QUOTES) : ''; ?>"></td>
                </tr>
            </table>
        </div>
    </div>
</form>
<?php
    //-----------------------------------Get date from input form----------------------------------------------//
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        if (isset($_POST["name"])){
            $name = $_POST["name"];
        } else{
            $name = NULL;
        }
        if (isset($_POST["address"])){
            $address = $_POST["address"];
        } else{
            $address = NULL;
        }
        if (isset($_POST["city"])){
            $city = $_POST["city"];
        } else{
            $city = NULL;
        }
        if (isset($_POST["phone"])){
            $phone = $_POST["phone"];
        } else{
            $phone =NULL;
        }
        if (isset($_POST["url"])){
            $url = $_POST["url"];
        } else {
            $url = NULL;
        }
        if (isset($_POST["submit"])){
            $submit = $_POST["submit"];
        } else{
            $submit = NULL;
        }
        if (isset($_POST["select"])){
            $select = $_POST["select"];
        } else {
            $select = NULL;
        }
    }
    //------------------------------------------------------------------------------//
    // Insert data into table of database
    if(isset($_POST["submit"])){
        if ( ($select!=NULL) && ($name !=NULL && $address!=NULL && $city!=NULL && $phone!=NULL && $url!=NULL) ){
            // Insert date from input
            $sql = "INSERT INTO business VALUES('', '$name', '$address', '$city', '$phone', '$url')";
            // Paste input data into database
            mysqli_query($connect, $sql);
            // Select last BusID from table businesses
            $last_ID = mysqli_insert_id($connect);
            // When selected option, add CatID of Title to table "biz_category"
            foreach($select as $option){

                $sql = "SELECT CategoryID FROM category WHERE Title = '$option'";
                $slt = mysqli_query($connect, $sql);

                if (mysqli_num_rows($slt) > 0){
                    while ($row = mysqli_fetch_row($slt)){
                        foreach($row as $catID){
                            $sql = "INSERT INTO biz_category VALUES('$last_ID', '$catID')";
                            $ins = mysqli_query($connect, $sql);
                            
                        }
                    }
                }
            }
        } else {
            echo "Inserting not success, please provide full informations above !";
        }
    } 
?>

</body>
</html>