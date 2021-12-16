<?php
    function adduser($conn,$username,$pass,$name,$email,$type)
    {
        $values = "VALUES ('" .$username. "', '". $name ."', '".$email."', '".$pass."', '".$type."');";
        $sql = "INSERT INTO `user` (`Username`, `Name`, `Email`, `password`, `Type`) ".$values;
        mysqli_select_db($conn,'quiz');
        mysqli_query($conn,$sql);
        mysqli_error($conn);
        header('Location: login.html');
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "quiz";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $db);

    $name = $_POST['name'];
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $email = $_POST['email'];
    if(isset($_POST['type']))
    {
        $type = $_POST['type'];
    }
    else
    {
        echo "<script>alert('Choose Type');</script>";
        require_once('login.html');   
    }
    
    if(strlen($name) == 0 || $name == '')
    {
        echo "<script>alert('Enter Name');</script>";
        require_once('login.html');
    }
    elseif(strlen($username) == 0 || $username == '')
    {
        echo "<script>alert('Enter Username');</script>";
        require_once('login.html');   
    }
    elseif(strlen($pass) == 0 || $username == '')
    {
        echo "<script>alert('Enter Password');</script>";
        require_once('login.html');   
    }
    elseif(strlen($email) == 0 || $username == '')
    {
        echo "<script>alert('Enter Email');</script>";
        require_once('login.html');   
    }

    $get_username = "";
    
    $sql = 'SELECT `Username` FROM `user`;';
    mysqli_select_db($conn,'quiz');
    $retval = mysqli_query($conn,$sql);
    
    if(! $retval ) {
        die('Could not get data: ' . mysqli_error($conn));
    }
    
    $usernames = [];
    $i = 0;
    while($row = mysqli_fetch_array($retval)) {
        $usernames[$i] = $row['Username'];
        $i++;
    }
    $c = 0;
    foreach($usernames as $item)
    {
        if($username == $item)
        {
            echo "<script>alert('Username Already taken')</script>";
            require_once('login.html');
            $c = 1;
        } 
        
    }
    if($c == 0){
        adduser($conn,$username,$pass,$name,$email,$type);
    }
    mysqli_close($conn);
?>