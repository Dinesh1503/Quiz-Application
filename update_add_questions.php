<!DOCTYPE html>
<html lang="en">
<body>
    <?php
        session_start();
        $n = $_SESSION['num'];
        $id = $_SESSION['id'];
        if(isset($_POST['question'.$n]))
        {
            $question = $_POST['question'.$n];
        }
        if(isset($_POST['option1'.$n]))
        {
            $option1 = $_POST['option1'.$n];
        }
        if(isset($_POST['option2'.$n]))
        {
            $option2 = $_POST['option2'.$n];
        }
        if(isset($_POST['option3'.$n]))
        {
            $option3 = $_POST['option3'.$n];
        }
        if(isset($_POST['option4'.$n]))
        {
            $option4 = $_POST['option4'.$n];
        }
        if(isset($_POST['ans'.$n]))
        {
            $ans = $_POST['ans'.$n];
        }
        if(isset($_POST['question'.$n]) && isset($_POST['option1'.$n]) 
        && isset($_POST['option2'.$n]) && isset($_POST['option3'.$n])
        && isset($_POST['option4'.$n]) && isset($_POST['ans'.$n]))
        {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $db = "quiz";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $db);

            $i = $n + 1;
            $values = "VALUES ('".$i."', '".$question."', '".$option1."', '".$option2."', '".$option3."', '".$option4."', '".$ans."');";
            $sql = "INSERT INTO `quiz".$id."` (`question_number`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`)".$values;
            $q = mysqli_query($conn,$sql);
            if(!$q)
            {
                echo mysqli_error($conn);
            }
            else
            {
                mysqli_close($conn);
                echo "<script>alert('question added')</script>";
                header('Location: staff.php');
            }   
        }
        echo "<br><br><form method='post' action=''><label>Enter Question ".$n;
        echo "<br><textarea name='question".$n."'></textarea><br>";

        echo "<label>Option 1</label><br><textarea name='option1".$n."'></textarea><br>";
        echo "<label>Option 2</label><br><textarea name='option2".$n."'></textarea><br>";
        echo "<label>Option 3</label><br><textarea name='option3".$n."'></textarea><br>";
        echo "<label>Option 4</label><br><textarea name='option4".$n."'></textarea><br>";
        echo "<label>Correct Answer</label><input type='number' max=4 min=1 name='ans".$n."'>";
        echo "<br>__________________________________________________________________________<br>";
        echo "<br><button type='submit'>Add</button></form>";
    ?>
    
</body>
</html>