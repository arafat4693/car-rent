<?php
    session_start();
    include "../_connect.php";
    if(isset($_POST['create'])){
        $regnr = $_POST['Regnr'];
        $Marke = $_POST['Marke'];
        $Modell = $_POST['Modell'];
        $Arsmodell = $_POST['Arsmodell'];
        $Gruppbet = $_POST['Gruppbet'];
        $Matarstallning = $_POST['Matarstallning'];
        $Antaldygn = $_POST['Antaldygn'];
        // $selectSql = "SELECT * FROM bil WHERE `Regnr`='$regnr'";
        // $selectRes = mysqli_query($conn, $selectSql);
        // if(mysqli_num_rows($selectRes) < 1){
        $insertSql = "INSERT INTO `bil`(`Regnr`, `Marke`, `Modell`, `Arsmodell`, `Gruppbet`, `Matarstallning`, `Antaldygn`, `Farg`) VALUES ('$regnr','$Marke','$Modell',$Arsmodell,'$Gruppbet',$Matarstallning,$Antaldygn, 'Blue')";
        $insertRes = mysqli_query($conn, $insertSql);
        // }
    }

    if(isset($_POST['update'])){
        $regnr = $_POST['Regnr'];
        $Marke = $_POST['Marke'];
        $Modell = $_POST['Modell'];
        $Arsmodell = $_POST['Arsmodell'];
        $Gruppbet = $_POST['Gruppbet'];
        $Matarstallning = $_POST['Matarstallning'];
        $Antaldygn = $_POST['Antaldygn'];
        $updateSql = "UPDATE `bil` SET `Marke`='$Marke',`Modell`='$Modell',`Arsmodell`='$Arsmodell',`Gruppbet`='$Gruppbet',`Matarstallning`='$Matarstallning',`Antaldygn`='$Antaldygn' WHERE `Regnr`='$regnr'";
        $updateRes = mysqli_query($conn, $updateSql);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cars</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <section>
        <form class="newUser" method="post" action="">
            <div class="box">
                <p>Regnr</p>
                <input type="text" name="Regnr">
            </div>
            <div class="box">
                <p>Brand</p>
                <input type="text" name="Marke">
            </div>
            <div class="box">
                <p>Model</p>
                <input type="text" name="Modell">
            </div>
            <div class="box">
                <p>Year</p>
                <input type="text" name="Arsmodell">
            </div>
            <div class="box">
                <p>Days</p>
                <input type="text" name="Antaldygn">
            </div>
            <div class="box">
                <p>Meter</p>
                <input type="text" name="Matarstallning">
            </div>
            <select name="Gruppbet">
                <option value="A" selected>A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
            </select>
            <input type="submit" name="create" value="Create" class="btn">
        </form>
    </section>
    <h3 style="margin-top:3rem;" class="heading">All <span>Cars</span></h3>
    <div class="all_user">
    <?php 
        $kundSql = "SELECT * FROM bil";
        $kundSqlQuery = mysqli_query($conn, $kundSql);
        if($kundSqlQuery){
            while($row = mysqli_fetch_assoc($kundSqlQuery)){

        ?>
        <form class="user" method="post" action="">
            <input type="hidden" name="Regnr" value="<?php echo $row['Regnr']?>">
            <p>Regnr: <?php echo $row['Regnr']?></p>
            <p>Brand: <input type="text" name="Marke" value="<?php echo $row['Marke']?>"></p>
            <p>Model: <input type="text" name="Modell" value="<?php echo $row['Modell']?>"></p>
            <p>Year: <input type="text" name="Arsmodell" value="<?php echo $row['Arsmodell']?>"></p>
            <p>Days: <input type="text" name="Matarstallning" value="<?php echo $row['Matarstallning']?>"></p>
            <p>Meter: <input type="text" name="Antaldygn" value="<?php echo $row['Antaldygn']?>"></p>
            <p>Group: <input type="text" name="Gruppbet" value="<?php echo $row['Gruppbet']?>"></p>
            <input type="submit" value="Update" class="btn" name="update">
        </form>
        <?php
            }
        }
        ?>
        </div>
</body>
</html>