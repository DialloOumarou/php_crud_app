<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Liste des Utillisateurs</title>
</head>
<body>
<main>
    <div class="link_container">
        <a href="addUser.php" class="link">Ajouter un utilisateur</a>
    </div>

    <table>
        <thead>
            <?php
                include_once("../connect_ddb.php");
                //liste des utilisateurs
                $sql="SELECT *FROM users;";
                $result=mysqli_query($conn,$sql);
                if(mysqli_num_rows($result) > 0){
                //afficher les utilisateurs
            ?>


            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($row=mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td><?=$row["username"]?></td>
                <td><?=$row["email"]?></td>
                <td class="image"><a href="modifyUser.php?id=<?=$row["user_id"]?>"><img src="../images/write.png" alt=""></a></td>
                <td class="image"><a href="deleteUser.php?id=<?=$row["user_id"]?>"><img src="../images/remove.png" alt=""></a></td>
            </tr>

            <?php
                    }
                }
                else{
                    echo"<p classe='message'>0 utilisateur present</p>";
                }
            ?>
        </tbody>
    </table>
</main>
</body>
</html>