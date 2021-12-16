<!DOCTYPE html>
<html lang="en">
<body>
    <?php
        if(isset($_POST['question_number']) && isset($_POST['quiz_id']))
        {
            $num = $_POST['question_number'];
            $id = $_POST['quiz_id'];
            $sql = "DELETE FROM `quiz".$id."` WHERE `question_number` = ".$num.";"; 
            $servername = "localhost";
            $username = "root";
            $password = "";
            $db = "quiz";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $db);
            $q = mysqli_query($conn,$sql);
            if(!$q)
            {
                echo mysqli_error($conn);
            }
            else
            {
                echo "<script>alert(Question Deleted);</script>";
                require('staff.php');
            }
        }
        else
        {
            echo "Error, Enter all fields";
        }
    ?>
    
    
</body>
</html>