<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab-2-9-1</title>
</head>
<body>
    <?php
        $fname = $_POST["fname"];
        $id = $_POST["id"];
        $age = $_POST["age"];
        $gender = $_POST["gender"];
        $class = $_POST["class"];
        $uni = $_POST["uni"];
        $hubby = $_POST["hubby"];

        echo "Your information from input!";
        echo "<br>";
        echo "Name : $fname";
        echo "<br>";
        echo "ID : $id";
        echo "<br>";
        echo "Age : $age";
        echo "<br>";
        echo "Gender : $gender";
        echo "<br>";
        echo "Class : $class";
        echo "<br>";
        echo "University : $uni";
        echo "<br>";
        echo "Hubby : ";
        foreach($hubby as $value)
        {
          echo $value. ", ";
        }



    ?>
</body>
</html>
