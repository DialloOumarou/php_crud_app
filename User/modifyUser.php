<?php
    $user_id=$_GET["id"];

    if(isset($_POST["send"])){
        if(isset($_POST["username"])&&
            isset($_POST["email"])&&
            $_POST["username"]!=""&&
            $_POST["email"]!=""){
            extract($_POST);
            include_once("../connect_ddb.php");
            $sql="UPDATE users SET username = '$username',
             email='$email' WHERE user_id=$user_id;";

            if(mysqli_query($conn,$sql)){
                header("Location:showUser.php");
            }
            else{
                header("Location:showUser.php?message=ModifyFail");
            }
    
        }
        else{
            header("Location:showUser.php?message=EmptyFields");
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
    <?php
        include_once("../connect_ddb.php");

        //liste des utilisateurs
        $sql="SELECT  *from users WHERE user_id = $user_id";
        $result=mysqli_query($conn,$sql);
        //afficher utilisateut
        while($row=mysqli_fetch_assoc($result)){
    ?>

        <form action="" method="post">
            <h1>Modifier un utilisateur</h1>
            <input type="text" name="username" placeholder="Username" value="<?=$row['username']?>">
            <input type="email" name="email" placeholder="Email" value="<?=$row['email']?>">
            <input type="submit" value="Modifier" name="send"  >
            <a href="showUser.php" class="link back">Annuler</a>        
        </form>

        <?php
        }
        ?>
</body>
</html>