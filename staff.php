<!DOCTYPE html>
<html lang="en">
<head>
    <title>Staff</title>
</head>
<body>
    <h1>Welcome Staff User</h1>
    <p>You can create, update, or delete a quiz or its associated questions.</p>
    <?php

    if(isset($_POST['do']))
    {
        echo "Hello";
        $action = $_POST['do'];
        if($action == 'create')
        {
            header('Location: create_quiz.html');
        }
        else if($action == 'update')
        {
            echo "<br><br><form action='update_quiz.php' method='post'>
            <label>Enter Quiz ID</label>
            <input type='number' name='quiz_id'>
            <input type='submit' name='Enter' value='Enter'>
            </form>";

            //require_once('update_quiz.html');
        }
        else if($action == 'delete_asso')
        {
            echo "<br><br><form action='delete_question.php' method='post'>
            <label>Enter Quiz ID</label>
            <input type='number' name='quiz_id'>
    
            <br><br><label>Enter question number</label>
            <input type='number' name='question_number'>
            <input type='submit' name='Enter' value='Enter'>
            </form>";
        }
        else if($action == 'delete')
        {
            echo "<br><br><form action='delete.php' method='post'>
            <label>Enter Quiz ID</label>
            <input type='number' name='quiz_id'>
            <input type='submit' name='Enter' value='Enter'>
            </form>";
        }

    }
    

    echo "<form action='' method = 'post'>
        <br><br><input type='radio' id='create' name='do' value='create'>
        <label for='create'>Create quiz</label><br>

        <br><input type='radio' id='update' name='do' value='update'>
        <label for='update'>Update quiz</label><br>

        <br><input type='radio' id='delete' name='do' value='delete'>
        <label for='delete'>Delete quiz</label><br>

        <br><input type='radio' id='delete_asso' name='do' value='delete_asso'>
        <label for='delete_asso'>Delete Associated questions of Quiz </label><br>
        
        <br><input type='submit' name='register' value='Submit'>
    </form>'";
    ?>
</body>
</html>