<?php
    session_start();
    include "../_connect.php";
    if(isset($_POST['update'])){
        $username = $_POST['name'];
        $addres = $_POST['address'];
        $postaddres = $_POST['postaddress'];
        $telefon = $_POST['tel'];
        $mobiltelefon = $_POST['mobiltel'];
        $email = $_POST['epost'];
        $pass = $_POST['pass'];
        $updateSql = "UPDATE `kund` SET `KundNamn`='$username',`Adress`='$addres',`Postadress`='$postaddres',`Tel`='$telefon',`MobilTel`='$mobiltelefon',`Epost`='$email' WHERE KundId=".$_POST['kundId'];
        $updateResult = mysqli_query($conn, $updateSql);
        if($_POST['oldPass'] != $pass){
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $updatePassSql = "UPDATE `kund` SET `Password`='$hash' WHERE KundId=".$_POST['kundId'];
            $updatePassResult = mysqli_query($conn, $updatePassSql);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Customers</title>
</head>
<body>
    <div class="all_user">
        <?php 
        $kundSql = "SELECT * FROM kund";
        $kundSqlQuery = mysqli_query($conn, $kundSql);
        if($kundSqlQuery){
            while($row = mysqli_fetch_assoc($kundSqlQuery)){

        ?>
        <form class="user" method="post" action="">
            <input type="hidden" name="kundId" value="<?php echo $row['KundId']?>">
            <input type="hidden" name="oldPass" value="<?php echo $row['Password']?>">
            <p>Id: <?php echo $row['KundId']?></p>
            <p>Name: <input type="text" name="name" value="<?php echo $row['KundNamn']?>"></p>
            <p>Address: <input type="text" name="address" value="<?php echo $row['Adress']?>"></p>
            <p>Post-Address: <input type="text" name="postaddress" value="<?php echo $row['Postadress']?>"></p>
            <p>Tel: <input type="text" name="tel" value="<?php echo $row['Tel']?>"></p>
            <p>MobilTel: <input type="text" name="mobiltel" value="<?php echo $row['MobilTel']?>"></p>
            <p>Epost: <input type="text" name="epost" value="<?php echo $row['Epost']?>"></p>
            <p>Password: <input type="password" name="pass" value="<?php echo $row['Password']?>"></p>
            <input type="submit" value="Update" class="btn" name="update">
        </form>
        <?php
            }
        }
        ?>
    </div>
</body>
</html>