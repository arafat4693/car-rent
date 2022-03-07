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
            $staffSql = "SELECT * FROM hyr  WHERE `AntalKm` is NULL ORDER BY Indatum ASC";
            $staffSqlQuery = mysqli_query($conn, $staffSql);
            if($staffSqlQuery){
                while($row = mysqli_fetch_assoc($staffSqlQuery)){
                    $total = ((strtotime($row['Indatum'])-strtotime($row['Utdatum']))/86400)+1;
                    $reg = $row['Regnr'];
                    $matarSql = "SELECT Matarstallning FROM bil WHERE Regnr='$reg'";
                    $matarRes = mysqli_query($conn, $matarSql);
                    $row2 = mysqli_fetch_assoc($matarRes);
            ?>
            <form class="rented_cars" method="post" action="pay.php">
                <input type="hidden" name="customerId" value="<?php echo $row['KundId']?>">
                <p>Customer Id: <span><?php echo $row['KundId']?></span></p>
                <input type="hidden" name="bookingDate" value="<?php echo $row['Bokningsdatum']?>">
                <p>Booking Date: <span><?php echo $row['Bokningsdatum']?></span></p>
                <input type="hidden" name="regnr" value="<?php echo $row['Regnr']?>">
                <p>regnr: <span><?php echo $row['Regnr']?></p>
                <p>Number of km out: <span><?php echo $row2['Matarstallning']?></span></p>
                <p>Number of km in: <input type="number" name="kmIn"/></p>
                <input type="hidden" name="outDate" value="<?php echo $row['Utdatum']?>">
                <p>Out date: <span><input type="text" value="<?php echo $row['Utdatum']?>"/></p>
                <input type="hidden" name="entryDate" value="<?php echo $row['Indatum']?>">
                <p>Entry date: <input type="text" value="<?php echo $row['Indatum']?>"/></p>
                <p>Fuel cost: <input type="number"/></p>
                <select id="options" name="hyrtyp">
                    <option value="korttid" <?php echo ($row['Hyrtyp'] === 'korttid' || $row['Hyrtyp'] === 'Korttid') ? 'selected' : null?>>short term days</option>
                    <option value="veckoslut" <?php echo ($row['Hyrtyp'] === 'veckoslut') ? 'selected' : null?>>weekend</option>
                    <option value="veckoslutfri" <?php echo ($row['Hyrtyp'] === 'veckoslutfri') ? 'selected' : null?>>weekend free</option>
                </select>
                <input type="hidden" name="totalDays" value="<?php echo $total?>">
                <input type="hidden" name="numberOfKm" value="<?php echo $row2['Matarstallning']?>">
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