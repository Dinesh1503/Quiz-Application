<?php   
    function query($sql)
    {
        //check database connection 
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "quiz";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $db);

        if ($conn->query($sql) === TRUE) {
        //echo "Query executed successfully<br>";
        } else {
        //echo "Query Error " . $conn->error."<br>";
        }
        
        $conn->close();
    }
    
    function create_database()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";

        $sql = "CREATE DATABASE IF NOT EXISTS quiz";

        $conn = new mysqli($servername, $username, $password);

        if ($conn->query($sql) === TRUE) {
        //echo "Query executed successfully<br>";
        } else {
        //echo "Query Error " . $conn->error."<br>";
        }
        
        $conn->close();

        $quiz_details_table_sql = "CREATE TABLE IF NOT EXISTS `quiz`.`quiz details` ( `Quiz ID` INT(5) NOT NULL , `Quiz Name` VARCHAR(100) NOT NULL , `Quiz Author` VARCHAR(150) NOT NULL , `Quiz Available` VARCHAR(5) NOT NULL , `Quiz Duration` VARCHAR(5) NOT NULL , PRIMARY KEY (`Quiz ID`)) ENGINE = InnoDB; ";
        $quiz_table_sql = "CREATE TABLE IF NOT EXISTS `quiz`.`quiz` ( `Quiz ID` INT(5) NOT NULL , `Question Number` INT(5) NOT NULL , `Questions` TEXT NOT NULL , `Option 1` TEXT NOT NULL , `Option 2` TEXT NOT NULL , `Option 3` TEXT NOT NULL , `Option 4` TEXT NOT NULL , PRIMARY KEY (`Quiz ID`)) ENGINE = InnoDB; ";
        $score = "CREATE TABLE IF NOT EXISTS `quiz`.`score` ( `Username` VARCHAR(150) NOT NULL , `Type` VARCHAR(100) NOT NULL , `Quiz ID` INT(5) NOT NULL , `Score` INT(10) NOT NULL,`percentage` INT(10) NOT NULL  , PRIMARY KEY (`Username`)) ENGINE = InnoDB; ";
        $user = "CREATE TABLE IF NOT EXISTS `quiz`.`user` ( `Username` VARCHAR(150) NOT NULL , `Name` VARCHAR(150) NOT NULL , `Email` VARCHAR(200) NOT NULL , `password` VARCHAR(150) NOT NULL , `Type` VARCHAR(100) NOT NULL , PRIMARY KEY (`Username`), UNIQUE (`Email`)) ENGINE = InnoDB; ";
        query($quiz_details_table_sql);
        query($quiz_table_sql);
        query($score);
        query($user);
    }
    create_database();
    require_once('login.html');
?>