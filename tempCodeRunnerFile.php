<?php
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