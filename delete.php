<!DOCTYPE html>
<html lang="en">
<body>
    <?php
        if(isset($_POST['quiz_id']))
        {
            $id = $_POST['quiz_id'];
            $sql = "DROP TABLE `quiz".$id."`"; 
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
                echo "Quiz Deleted";
                $sql = "DELETE FROM `quiz details` WHERE `Quiz ID` = ".$id.";";
                $q = mysqli_query($conn,$sql);
                header('Location: staff.php');
            }
        }
        else
        {
            echo "Error, Enter all fields";
        }
    ?>
    
    
</body>
</html>