<?php
    session_start();
    $id = $_POST['quiz_id'];
    $_SESSION['id'] = $id;
    $sql = "SELECT `Quiz ID` FROM `quiz details`; ";
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "quiz";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $db);
    $r = mysqli_query($conn,$sql);
    $n = 0;
    $ids = [];
    while($row = mysqli_fetch_array($r))
    {
        $ids[$n] = $row['Quiz ID'];
        $n = $n+1;
    }
    $c=0;
    for ($i=0; $i < sizeof($ids); $i++) { 
        if($id == $ids[$i])
        {
            $sql = "SELECT `question_number` FROM `quiz".$id."` ORDER BY `question_number` DESC LIMIT 1;";
            $r = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($r);
            $num = $row['question_number'];
            $_SESSION['num'] = $num;            
            $c = 1;          
        }   
    }
    if($c = 1)
    {
        header('Location: update_add_questions.php');    
    }
    else
    {
        echo "Quiz ID not found";
        require('update.php');
    }
    
?> 
