<?php
    if(isset($_POST["send"])){
        if(isset($_POST["username"])&&
            isset($_POST["email"])&&
            $_POST["username"]!=""&&
            $_POST["email"]!=""){
            extract($_POST);
            include_once("../connect_ddb.php");
            $sql="INSERT INTO users(username,email)
            VALUES('$username','$email');";

            if(mysqli_query($conn,$sql)){
                header("Location:showUser.php");
            }
            else{
                header("Location:addUser.php?message=AddFail");
            }
    
        }
        else{
            header("Location:addUser.php?message=EmptyFields");
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <h1>Ajouter un utilisateur</h1>
        <input type="text" name="username" placeholder="Username">
        <input type="email" name="email" placeholder="Email">
        <input type="submit" value="Ajouter" name="send"  >
        <a href="showUser.php" class="link back">Annuler</a>        
    </form>
</body>
</html>