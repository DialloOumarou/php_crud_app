<?php
    $user_id=$_GET["id"];
    include_once("../connect_ddb.php");
    $sql="DELETE FROM users WHERE user_id=$user_id;";
    if(mysqli_query($conn,$sql)){
        header("Location:showUser.php?message=DeleteSuccess");
    }
    else{
        header("Location:showUser.php?message=DeleteFailed");
    }