<!DOCTYPE html>
<html lang="en">
<body>
    <?php
    session_start();
        $len = $_SESSION['len'];
        $answer = $_SESSION['answer'];
        $id = $_SESSION['id'];
        $entries = [];
        for ($i=0; $i < $len; $i++) { 
            if(isset($_POST['opt'.$i]))
            {
                $entries[$i] = $_POST['opt'.$i];
            }
            else
            {
                $entries[$i] = NULL;
            }
        }
        $score = 0;
        for ($i=0; $i <$len ; $i++) { 
            if($entries[$i] == $answer[$i])
            {
                $score = $score + 1; 
            }
        }
        echo "Final Score: ".$score;
        if(isset($_POST['user']))
        {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $db = "quiz";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $db);       
            $p = ((100*$score)/$len);
            $values = "VALUES ('".$_POST['user']."', 'student', '".$id."', '".$score."','".$p."');";
            $sql = "INSERT INTO `score` (`Username`, `Type`, `Quiz ID`, `Score`,`percentage`) ".$values;
            mysqli_query($conn,$sql);
            mysqli_close($conn);
            header('Location: user.php');
        }
        echo "<br><br><form action='' method='post'>
        <label>Enter Username For scores to be updated<br></label><br>
        <input type='text' name='user'>
        <input type='submit' name='Enter' value='Enter'>
        </form><br>";
        
    ?>
    
</body>
</html>