<?php
    session_start();
    //session_register('num');
    $_SESSION['num']= $_POST['questions_number'];
    $_SESSION['id'] = $_POST['ID'];

    $num = $_POST['questions_number'];
    $id = $_POST['ID'];
    $name = $_POST['author'];
    $time = $_POST['time'];
    $ava = $_POST['ava'];
    $quiz_name = $_POST['quiz_name'];
    if(isset($_POST['time']))
    {
        $type = $_POST['time'];
    }
    else
    {
        echo "<script>alert('Enter Time');</script>";
        require_once('create_quiz.html');   
    }
    
    if(strlen($name) == 0 || $name == '')
    {
        echo "<script>alert('Enter Name');</script>";
        require_once('create_quiz.html');
    }
    elseif($num == 0)
    {
        echo "<script>alert('Enter Number of Questions');</script>";
        require_once('create_quiz.html');   
    }
    elseif($id == 0)
    {
        echo "<script>alert('Enter ID');</script>";
        require_once('create_quiz.html');   
    }
    elseif(strlen($ava) == 0 || $ava == '' || $ava == " ")
    {
        echo "<script>alert('Enter Availability');</script>";
        require_once('create_quiz.html'); 
    }
    elseif(strlen($quiz_name) == 0 || $quiz_name == '' || $quiz_name == " ")
    {
        echo "<script>alert('Enter Quiz Name');</script>";
        require_once('create_quiz.html'); 
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "quiz";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $db);
    $sql = "SELECT `Quiz ID` FROM `quiz details`; ";
    $quiz_ids = [];
    $i = 0;

    $q = mysqli_query($conn,$sql);
    if(!$q)
    {
        echo "Error: ".$conn->error;
        echo "\n Return Back to Login Page";
    }

    while($row = mysqli_fetch_array($q)) {
        $quiz_ids[$i] = $row['Quiz ID'];
        $i++;
    }
    foreach($quiz_ids as $item)
    {
        if($item == $id)
        {
            echo "\n Quiz ID already taken, Return Back to Login Page";
        }
    }

    $values = "VALUES ('".$id."', '".$quiz_name."', '".$name."', '".$ava."', '".$time."');";
    $sql = "INSERT INTO `quiz details` (`Quiz ID`, `Quiz Name`, `Quiz Author`, `Quiz Available`, `Quiz Duration`) ".$values;
    $q = mysqli_query($conn,$sql);

    if(!$q)
    {
        echo "Error: ".$conn->error;
        echo "\n Return Back to Login Page";
    }
    else
    {
        $n = 0;
        echo "<br><br><form method='post' action='add_questions.php'>";
        while($n < $num)
        {
            echo "<label>Enter Question ".$n;
            echo "<br><textarea name='question".$n."'></textarea><br>";

            echo "<label>Option 1</label><br><textarea name='option1".$n."'></textarea><br>";
            echo "<label>Option 2</label><br><textarea name='option2".$n."'></textarea><br>";
            echo "<label>Option 3</label><br><textarea name='option3".$n."'></textarea><br>";
            echo "<label>Option 4</label><br><textarea name='option4".$n."'></textarea><br>";
            echo "<label>Correct Answer</label><input type='number' max=4 min=1 name='ans".$n."'>";
            echo "<br>__________________________________________________________________________<br>";
            $n = $n + 1;
        }
        echo "<br><button type='submit'>Create Quiz</button></form>";
    }
?>