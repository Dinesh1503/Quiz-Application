<?php

    session_start();
    $n = 0;
    $num = $_SESSION['num'];
    $id = $_SESSION['id'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "quiz";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $db);

    $sql = "CREATE TABLE `quiz".$id."` ( `question_number` INT(10) NOT NULL , `question` TEXT NOT NULL , `option1` TEXT NOT NULL , `option2` TEXT NOT NULL , `option3` TEXT NOT NULL , `option4` TEXT NOT NULL , `answer` INT(10) NOT NULL , PRIMARY KEY (`question_number`)) ENGINE = InnoDB; ";
    mysqli_query($conn,$sql);
    for ($i=0; $i <$num; $i++) { 

        $k = $i +1;
        $values = "VALUES('".$k.
        "','".$_POST['question'.$i].
        "','".$_POST['option1'.$i].
        "','".$_POST['option2'.$i].
        "','".$_POST['option3'.$i].
        "','".$_POST['option4'.$i].
        "','".$_POST['ans'.$i]."');";

        $sql = "INSERT INTO `quiz".$id."` (`question_number`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`)".$values;
        mysqli_query($conn,$sql);
        echo mysqli_error($conn);
        header('Location: staff.php');
    }
?>