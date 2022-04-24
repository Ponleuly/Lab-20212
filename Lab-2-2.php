<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>less3_Ex1_5</title>
    <style>
        body{
            font-size: 24px;
        }
        input{
            font-size: 24px;
        }
        select{
            font-size: 24px;
            background-color:white;
            border: 1px solid grey;
        }
    </style>
</head>
<body>
    <p>Enter your name and select date and time for the appointment</p>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
     
        <?php   // to get value from input 
        if ($_SERVER["REQUEST_METHOD"]=="GET"){
            if (array_key_exists("name", $_GET)){
                $name = $_GET["name"];
            } else {
                $name = null;
            }
            
            if (array_key_exists("day", $_GET)){
                $day = $_GET["day"];
            } else {
                $day = 1;
            }
            
            if (array_key_exists("month", $_GET)){
                $month = $_GET["month"];
            } else {
                $month = 1;
            }
            if (array_key_exists("year", $_GET)){
                $year = $_GET["year"];
            } else {
                $year = 2000;
            }
            if (array_key_exists("hour", $_GET)){
                $hour = $_GET["hour"];
            } else {
                $hour = 0;
            }
            if (array_key_exists("min", $_GET)){
                $min = $_GET["min"];
            } else {
                $min = 0;
            }
            if (array_key_exists("sec", $_GET)){
                $sec = $_GET["sec"];
            } else {
                $sec = 0;
            }
        }
       
        ?>
        
        <table>
            <tr>
                <td>Your name : </td>
                <td style="width:300px"><input type="text" name="name" value="<?php echo $name; ?>"></td>
            </tr>
            <tr>
                <td>Date: </td>
                <td style="float: left;">
                    <select name="day" id="day">
                        <?php
                            for ($i=1; $i<=31; $i++){
                                // To show the value that selected
                                if ($day == $i){                               
                                    $i = sprintf("%02d", $i);
                                    echo "<option selected>$i</option>"; // Value selected
                                } else {
                                    $i = sprintf("%02d", $i);
                                    echo "<option>$i</option>";
                                }
                        }
                        ?>
                    </select>
                </td>
                <td style="float: left;">
                    <select name="month" id="month">
                        <?php
                            for ($i=1; $i<=12; $i++){
                                if ($month == $i){ 
                                    $i = sprintf("%02d", $i);
                                    echo "<option selected>$i</option>";
                                } else {
                                    $i = sprintf("%02d", $i);
                                    echo "<option>$i</option>";
                                }
                            }
                        ?>
                    </select>
                </td>
                <td style="float: left;">
                    <select name="year" id="year" style="width:150px;">
                        <?php
                            for ($i=1990; $i<=2500; $i++){
                                if ($year == $i){
                                    echo "<option selected>$i</option>";
                                } else {
                                    echo "<option>$i</option>";
                                }
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Time:</td>
                <td style="float: left;">
                    <select name="hour" id="hour">
                        <?php
                            for ($i=0; $i<=24; $i++){
                                if ($hour == $i){
                                    $i = sprintf("%02d", $i);
                                    echo "<option selected>$i</option>";
                                } else {
                                    $i = sprintf("%02d", $i);
                                    echo "<option>$i</option>";
                                }
                            }
                        ?>
                    </select>
                </td>
                <td style="float: left;">
                    <select name="min" id="min">
                        <?php
                            for ($i=0; $i<=60; $i++){
                                if ($min == $i){
                                    $i = sprintf("%02d", $i);
                                    echo "<option selected>$i</option>";
                                } else {
                                    $i = sprintf("%02d", $i);
                                    echo "<option>$i</option>";
                                }
                            }
                        ?>
                    </select>
                </td>
                <td style="float: left;">
                    <select name="sec" id="sec">
                        <?php
                            for ($i=0; $i<=60; $i++){
                                if ($sec == $i){
                                    $i = sprintf("%02d", $i);
                                    echo "<option selected>$i</option>";
                                } else {
                                    $i = sprintf("%02d", $i);
                                    echo "<option>$i</option>";
                                }
                            }
                        ?>
                    </select>
            </tr>
        </table>
        <input style="margin-left: 125px; margin-top: 20px" type="submit" name="submit" value="Submit">
        <input type="reset" name="reset" value="Reset">
    </form>
    
    <?php
    
        if (array_key_exists("name", $_GET)){
            echo "Hi $name !";
            echo "<br>";
        }
        if (array_key_exists("day",$_GET)){
            $d = mktime($hour, $min, $sec, $month, $day, $year);
            echo "<br>";
            echo "you have choose to have appointment on : ". date("H:i:s , d/m/Y", $d);
            echo "<br>";
            echo "<br>";
            echo "More information";
            echo "<br>";
            echo "<br>";
            echo "In 12 hours, the time and date is : ". date("h:i:s A , d/m/Y", $d);

        }
        if (array_key_exists("month", $_GET)){
            switch($month){
                case "1" : 
                case "3" :
                case "5" :
                case "7" :
                case "8" :
                case "10":
                case "12":  echo "<br><br> This month has 31 days!";break;
                case "4":
                case "6": 
                case "9":
                case "11":  echo "<br><br> This month has 30 days!";break;
                case "2": 
                    if (($year%4 == 0) && ($year%100 != 0)){
                        echo "<br><br> This month has 29 days!";
                    } else if (($year%100 == 0) && ($year%400 == 0)){
                         echo "<br><br> This month has 29 days!";
                    }
                    else echo "<br><br> This month has 28 days!";

                    break;
            }
        }
    
    ?>

</body>
</html>
