<?php
    session_start();
    include "../_connect.php";
    if(isset($_POST['create'])){
        $Forsakring = $_POST['Forsakring'];
        $korttid = $_POST['korttid'];
        $kortKm = $_POST['kortKm'];
        $Gruppbet = $_POST['Gruppbet'];
        $veckoslut = $_POST['veckoslut'];
        $veckoslutKm = $_POST['veckoslutKm'];
        $veckoslutfri = $_POST['veckoslutfri'];
        $insertSql = "INSERT INTO `gruppbet`(`Gruppbet`, `Forsakring`, `Korttiddygn`, `korttidkm`, `Veckoslut`, `Veckoslutkm`, `Veckoslutfri`) VALUES ('$Gruppbet',$Forsakring,$korttid,$kortKm,$veckoslut,$veckoslutKm,$veckoslutfri)";
        $insertRes = mysqli_query($conn, $insertSql);
    }

    if(isset($_POST['update'])){
        $Forsakring = $_POST['Forsakring'];
        $korttid = $_POST['Korttiddygn'];
        $kortKm = $_POST['Korttidkm'];
        $Gruppbet = $_POST['Gruppbet'];
        $veckoslut = $_POST['Veckoslut'];
        $veckoslutKm = $_POST['Veckoslutkm'];
        $veckoslutfri = $_POST['Veckoslutfri'];
        $updateSql = "UPDATE `gruppbet` SET `Forsakring`=$Forsakring,`Korttiddygn`=$korttid,`korttidkm`=$kortKm,`Veckoslut`=$veckoslut,`Veckoslutkm`=$veckoslutKm,`Veckoslutfri`=$veckoslutfri WHERE `Gruppbet`='$Gruppbet'";
        $updateRes = mysqli_query($conn, $updateSql);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Price Group</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<section>
        <form class="newUser" method="post" action="">
            <div class="box">
                <p>Gruppbet</p>
                <input type="text" name="Gruppbet">
            </div>
            <div class="box">
                <p>Insurance</p>
                <input type="text" name="Forsakring">
            </div>
            <div class="box">
                <p>Korttid/Dygn</p>
                <input type="text" name="korttid">
            </div>
            <div class="box">
                <p>Korttid/Km</p>
                <input type="text" name="kortKm">
            </div>
            <div class="box">
                <p>Veckoslut</p>
                <input type="text" name="veckoslut">
            </div>
            <div class="box">
                <p>Veckoslut/Km</p>
                <input type="text" name="veckoslutKm">
            </div>
            <div class="box">
                <p>Veckoslut fri</p>
                <input type="text" name="veckoslutfri">
            </div>
            <input type="submit" name="create" value="Create" class="btn">
        </form>
    </section>
    <h3 style="margin-top:3rem;" class="heading">All <span>Groups</span></h3>
    <div class="all_user">
    <?php 
        $kundSql = "SELECT * FROM gruppbet";
        $kundSqlQuery = mysqli_query($conn, $kundSql);
        if($kundSqlQuery){
            while($row = mysqli_fetch_assoc($kundSqlQuery)){

        ?>
        <form class="user" method="post" action="">
            <input type="hidden" name="Gruppbet" value="<?php echo $row['Gruppbet']?>">
            <p>Gruppbet: <?php echo $row['Gruppbet']?></p>
            <p>Insurance: <input type="text" name="Forsakring" value="<?php echo $row['Forsakring']?>"></p>
            <p>Korttid/Dygn: <input type="text" name="Korttiddygn" value="<?php echo $row['Korttiddygn']?>"></p>
            <p>Korttid/Km: <input type="text" name="Korttidkm" value="<?php echo $row['korttidkm']?>"></p>
            <p>Veckoslut: <input type="text" name="Veckoslut" value="<?php echo $row['Veckoslut']?>"></p>
            <p>Veckoslut/Km: <input type="text" name="Veckoslutkm" value="<?php echo $row['Veckoslutkm']?>"></p>
            <p>Veckoslut fri: <input type="text" name="Veckoslutfri" value="<?php echo $row['Veckoslutfri']?>"></p>
            <input type="submit" value="Update" class="btn" name="update">
        </form>
        <?php
            }
        }
        ?>
        </div>
</body>
</html>