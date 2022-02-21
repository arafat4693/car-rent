<?php
    session_start();
    include "../_connect.php";
    if($_SESSION['staffLogin'] != true){
        header("location: stafflogin.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kund mottagare</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <section class="staff_container">
        <h1 class="heading" style="margin-top:10px;">Rented <span>Cars</span></h1>
        <div class="staff_user">
            <?php 
            $staffSql = "SELECT * FROM hyr ORDER BY Indatum ASC";
            $staffSqlQuery = mysqli_query($conn, $staffSql);
            if($staffSqlQuery){
                while($row = mysqli_fetch_assoc($staffSqlQuery)){
                    $reg = $row['Regnr'];
                    $matarSql = "SELECT Matarstallning FROM bil WHERE Regnr='$reg'";
                    $matarRes = mysqli_query($conn, $matarSql);
                    $row2 = mysqli_fetch_assoc($matarRes);
            ?>
            <form class="rented_cars">
                <p>Customer Id: <span><?php echo $row['KundId']?></span></p>
                <p>Booking Date: <span><?php echo $row['Bokningsdatum']?></span></p>
                <p>regnr: <span><?php echo $row['Regnr']?></p>
                <p>Number of km out: <span><?php echo $row2['Matarstallning']?></span></p>
                <p>Number of km in: <input type="number"/></p>
                <p>Out date: <span><input type="text" value="<?php echo $row['Utdatum']?>"/></p>
                <p>Entry date: <input type="text" value="<?php echo $row['Indatum']?>"/></p>
                <p>Fuel cost: <input type="number"/></p>
                <select id="options" name="hyrtyp">
                    <option value="korttid" <?php echo ($row['Hyrtyp'] === 'korttid' || $row['Hyrtyp'] === 'Korttid') ? 'selected' : null?>>short term days</option>
                    <option value="veckoslut" <?php echo ($row['Hyrtyp'] === 'veckoslut') ? 'selected' : null?>>weekend</option>
                    <option value="veckoslutfri" <?php echo ($row['Hyrtyp'] === 'veckoslutfri') ? 'selected' : null?>>weekend free</option>
                </select>
                <input type="submit" value="count" class="btn">
            </form>
            <?php
                }
            }
            ?>
        </div>
    </section>
</body>
</html>