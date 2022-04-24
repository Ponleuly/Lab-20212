<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Less3_Condition</title>
    <style>
        body{
            font-size: 36px;
        }
    </style>

</head>
<body>
   
    <?php
        $first = $_POST["firstName"];
        $middle = $_POST["middleName"];
        $last = $_POST["lastName"];
        $midTerm = $_POST["midTerm"];
        $finalExam = $_POST["finalExam"];

        echo "Hi $last !"." Your full name is $last $middle $first";
        if ($first < $last){
            echo "<br>$last is greatter than $first";
        }
        else if ($first > $last){
            echo "<br>$first is greatter than $last";
        }
        
        $final = (2*$midTerm + 3*$finalExam)/5;
        
        if ($final > 89){
            echo "<br>Your final is $final. Congratualtion you got A!";
        }
        else if ($final > 79){
            echo "<br>Your final is $final. Congratualtion you got B!";
        }
        else if ($final > 69){
            echo "<br>Your final is $final. Congratualtion you got C!";
        }
        else if ($final > 59){
            echo "<br>Your final is $final. Congratualtion you got D!";
        }
        else if($final >= 0) {
        
                echo "<br>Your final is $final. You failed you got F!";
        }
        else {
            echo "<br> Illigal score less than 0 . Your final is $final";
        }
    
    ?>
    
</body>
</html>