<?php
    //start_session();
    function validate($conn,$sql,$username)
    {
        $q = mysqli_query($conn,$sql);
        if(mysqli_error($conn))
        {
            echo "Error: ".$conn->error;
            echo "Return Back to Login page";
        }
        else
        {
            $row = mysqli_fetch_assoc($q);
            if($row['type'] == 'staff')
            {
                header('Location: staff.php');

            }
            else
            {
                $_SESSION['user'] = $username;
                require('user.php');
            }
            
        }
        
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "quiz";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $db);
    if(isset($_POST['username']) && isset($_POST['password']))
    {
    $username = $_POST['username'];
    $pass = $_POST['password'];
    
    

    if($username == '' && $username == " " && $username == NULL)
    {
        echo "Error, Enter username, go back to login page";
    }

    $sql = "SELECT `type` FROM `user` WHERE `Username` LIKE '".$username."' AND `password` LIKE '".$pass."';";
    validate($conn,$sql,$username);
    }
    else
    {
        echo"<script>alert('Error, Enter credentials again')</script>";
        header('Location: login.html');
    }
    
?>