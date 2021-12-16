<!DOCTYPE html>
<html lang="en">
<body>
    <h1>Welcome User</h1>
    <p>You can take a quiz and view your scores.</p>
    <?php
        //session_start();
        if(isset($_POST['myuser']))
        {
            $myuser = $_POST['myuser'];
        
            $servername = "localhost";
            $username = "root";
            $password = "";
            $db = "quiz";
        
            // Create connection
            $conn = new mysqli($servername, $username, $password, $db);
            $sql = "SELECT * FROM `quiz details` WHERE `Quiz Available` LIKE 'Yes'";
            $q = mysqli_query($conn,$sql);
            $ids = [];
            $qname = [];
            $qauth = [];
            $i = 0;
            while($row = mysqli_fetch_array($q))
            {
                $ids[$i]=$row['Quiz ID'];
                $qname[$i] = $row['Quiz Name'];
                $qauth[$i] = $row['Quiz Author'];
                $i = $i + 1;
            }

            $servername = "localhost";
            $username = "root";
            $password = "";
            $db = "quiz";
        
            // Create connection
            $sql = "SELECT `Quiz ID`,`Username`,`score`,`percentage` FROM `score`";
            $conn = new mysqli($servername, $username, $password, $db);
            $q = mysqli_query($conn,$sql);
            $users = [];
            $percantages = [];
            $scores = [];
            $quizid = [];
            $i = 0;
            
            while($row = mysqli_fetch_array($q))
            {
                $users[$i] = $row['Username'];
                $scores[$i] = $row['score'];
                $percantages[$i] = $row['percentage'];
                $quizid[$i] = $row['Quiz ID'];
                $i = $i + 1;
            }
            echo "<br>Quizes Taken and their Scores";
            for ($i=0; $i < sizeof($users); $i++) { 
                if($myuser == $users[$i])
                {
                    echo "<br><br>Quiz ID: ".$quizid[$i].
                    "<br>Score: ".$scores[$i].
                    "<br>Percentage: ".$percantages[$i];
                }
            }
            echo"Available Quizes: <br>";
            for ($i=0; $i < sizeof($ids); $i++) { 
                echo "<br>Quiz ID: ".$ids[$i]. "<br>Quiz Name: ".$qname[$i]. "<br>Quiz Author: ".$qauth[$i]."<br>";
            }
            echo "<br><br><form action='' method='post'>
            <label>Enter Quiz ID</label>
            <input type='number' name='quiz_id'>
            <input type='submit' name='Enter' value='Enter'>
            </form>";
            if(isset($_POST['quiz_id']))
            {
                $id = $_POST['quiz_id'];
                foreach($ids as $item)
                {
                    if($id == $item)
                    {
                        $_SESSION['id'] = $id;
                        //require_once('take quiz.php');
                        $id = $_SESSION['id'];
                        $sql = "SELECT * FROM `quiz".$id."`; ";
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $db = "quiz";
                    
                        // Create connection
                        $conn = new mysqli($servername, $username, $password, $db);
                        $q = mysqli_query($conn,$sql);
                        $questions= [];
                        $qno = [];
                        $option1 = [];
                        $option2 = [];
                        $option3 = [];
                        $option4 = [];
                        $answer = [];
                        $i = 0;
                        while($row = mysqli_fetch_array($q))
                        {
                            $qno[$i] = $row['question_number'];
                            $questions[$i] = $row['question'];
                            $option1[$i] = $row['option1'];
                            $option2[$i] = $row['option2'];
                            $option3[$i] = $row['option3'];
                            $option4[$i] = $row['option4'];
                            $answer[$i] = $row['answer'];
                            $i = $i + 1; 
                        }
                        $sql = "SELECT `Quiz Name` FROM `quiz details` WHERE `Quiz ID` = ".$id."; ";
                        $q = mysqli_query($conn,$sql);
                        $temp = mysqli_fetch_array($q);
                        echo "<h1>".$temp['Quiz Name']."</h1>";                  
                        $len = sizeof($qno);
                        $_SESSION['len'] = $len;
                        $_SESSION['answer'] = $answer;
                        echo"<form method='post' action='take quiz.php'>";
                        for ($i=0; $i < sizeof($qno); $i++) { 
                            
                            echo"<label>".$qno[$i].". ".$questions[$i]."</label><br>
                            <input type='radio' name='opt".$i."' value='1'>
                            <label for='option1".$i."'>".$option1[$i]."</label><br>

                            <input type='radio' name='opt".$i."' value='2'>
                            <label for='option1".$i."'>".$option2[$i]."</label><br>

                            <input type='radio' name='opt".$i."' value='3'>
                            <label for='option1".$i."'>".$option3[$i]."</label><br>

                            <input type='radio' name='opt".$i."' value='4'>
                            <label for='option1".$i."'>".$option4[$i]."</label><br><br>";
                        }
                        echo "<br><input type='submit' value='Submit'></form>";
                                }
                            }

            }
        }
        else
        {
            echo"<script>alert(Error, Enter Username to attempt quiz)</script>";
        }
        echo"<form method='post' action=''>
        <label>Enter Username </label><input type='text' name='myuser'>
        <input type='submit' value='Submit'></form>";
    ?>
    
</body>
</html>