<?php
    session_start();
    include "../_connect.php";
    if($_SESSION['staffLogin'] != true){
        header("location: stafflogin.php");
    }
    $customerId = $_POST['customerId'];
    $regnr = $_POST['regnr'];
    $customerSql = "SELECT * FROM kund WHERE KundId = '$customerId'";
    $customerRes = mysqli_query($conn, $customerSql);
    $customerRow = mysqli_fetch_assoc($customerRes);

    $gruppSql = "SELECT *, Forsakring, Korttiddygn, Korttidkm, Veckoslut, Veckoslutkm, Veckoslutfri FROM bil INNER JOIN gruppbet ON bil.Gruppbet = gruppbet.Gruppbet WHERE bil.Regnr = '$regnr'";
    $gruppRes = mysqli_query($conn, $gruppSql);
    $gruppRow = mysqli_fetch_assoc($gruppRes);
    // print_r($gruppRow);
    switch ($_POST['hyrtyp']){
        case 'korttid':
            $kmCost = (intval($gruppRow['Korttidkm'])*intval($_POST['kmIn']));
            $rentType = 'Korttiddygn';
            break;
        case 'veckoslut':
            $kmCost = (intval($gruppRow['Veckoslutkm'])*intval($_POST['kmIn']));
            $rentType = 'Veckoslut';
            break;
        case 'veckoslutfri':
            $kmCost = (intval($gruppRow['Veckoslutfri']));
            $rentType = 'Veckoslutfri';
            break;
    }
    // print_r($gruppRow[$rentType]*'4');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To pay</title>
    <link rel="stylesheet" href="../style.css">
    <script src="app.js" defer></script>
</head>
<body>
    <section class="to-pay">
        <h1 class="heading" style="margin-top:10px;">To <span>Pay</span></h1>
        <form class="pay-container" method="post" target="_blank" action="reciept.php">
            <p>Customer Id: <span><?php echo $customerRow['KundId']?></span></p>
            <input type="hidden" name="KundId" value="<?php echo $customerRow['KundId']?>">

            <p>Customer Name: <span><?php echo $customerRow['KundNamn']?></span></p>
            <input type="hidden" name="KundNamn" value="<?php echo $customerRow['KundNamn']?>">

            <p>Customer Adress: <span><?php echo $customerRow['Adress']?></span></p>
            <input type="hidden" name="Adress" value="<?php echo $customerRow['Adress']?>">

            <p>Customer Post-adress: <span><?php echo $customerRow['Postadress']?></span></p>
            <input type="hidden" name="Postadress" value="<?php echo $customerRow['Postadress']?>">

            <p>Customer contact: <span><?php echo $customerRow['Tel']?></span></p>
            <input type="hidden" name="Tel" value="<?php echo $customerRow['Tel']?>">

            <p>Regnr: <span><?php echo $_POST['regnr']?></span></p>
            <input type="hidden" name="regnr" value="<?php echo $_POST['regnr']?>">

            <p>Booking date: <span><?php echo $_POST['bookingDate']?></span></p>
            <input type="hidden" name="bookingDate" value="<?php echo $_POST['bookingDate']?>">

            <p>Out date: <span><?php echo $_POST['outDate']?></span></p>
            <input type="hidden" name="outDate" value="<?php echo $_POST['outDate']?>">

            <p>Entry date: <span><?php echo $_POST['entryDate']?></span></p>
            <input type="hidden" name="entryDate" value="<?php echo $_POST['entryDate']?>">

            <p>Rent type: <span><?php echo $_POST['hyrtyp']?></span></p>
            <input type="hidden" name="hyrtyp" value="<?php echo $_POST['hyrtyp']?>">

            <p>Total days: <span><?php echo intval($_POST['totalDays'])?></span></p>
            <input type="hidden" name="totalDays" value="<?php echo $_POST['totalDays']?>">

            <p>Number of km driven: <span><?php echo (intval($_POST['kmIn'])-intval($_POST['numberOfKm']));?></span></p>
            <input type="hidden" name="totalKm" value="<?php echo (intval($_POST['kmIn'])-intval($_POST['numberOfKm']));?>">

            <p>Insurance: <span><?php echo intval($gruppRow['Forsakring'])*intval($_POST['totalDays']);?></span></p>
            <input type="hidden" name="totalInsurance" value="<?php echo intval($gruppRow['Forsakring'])*intval($_POST['totalDays']);?>">

            <p>Rent Cost: <span><?php echo intval($gruppRow[$rentType])*intval($_POST['totalDays']);?></span></p>
            <input type="hidden" name="totalRent" value="<?php echo intval($gruppRow[$rentType])*intval($_POST['totalDays']);?>">

            <p>Km cost: <span><?php echo $kmCost;?></span></p>
            <input type="hidden" name="kmCost" value="<?php echo $kmCost;?>">

            <p>Km cost: <span><?php echo $_POST['fuel'];?></span></p>
            <input type="hidden" name="fuel" value="<?php echo $_POST['fuel'];?>">

            <p>Total cost: <span><?php echo $kmCost+(intval($gruppRow['Forsakring'])*intval($_POST['totalDays']))+(intval($gruppRow[$rentType])*intval($_POST['totalDays']))+intval($_POST['fuel']);?></span></p>
            <input type="hidden" name="totalCost" value="<?php echo $kmCost+(intval($gruppRow['Forsakring'])*intval($_POST['totalDays']))+(intval($gruppRow[$rentType])*intval($_POST['totalDays']))+intval($_POST['fuel']);?>">
            
            <input type="hidden" name="kmIn" value="<?php echo $_POST['kmIn']?>">
            <input type="submit" name="reciept" value="Reciept" class="btn recieptBtn">
        </form>
    </section>
</body>
</html>