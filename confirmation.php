<?php 
include "_connect.php";
session_start();
$regnr = $_GET['regnr'];
$in = $_GET['in'];
$out = $_GET['out'];
$hyrtyp = $_POST['hyrtyp'];
$userId = $_SESSION['dinId'];
if(isset($_SESSION['rent']) && $_SESSION['rent']==true){
    $insertSql = "INSERT INTO `hyr`(`KundId`, `Regnr`, `Utdatum`, `Indatum`, `Hyrtyp`) VALUES ('$userId','$regnr','$out','$in','$hyrtyp')";
    $insertResult = mysqli_query($conn, $insertSql);
    $_SESSION['rent'] = false;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>confirmation</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
</head>
<body>
    <?php
    $select = "SELECT KundId, KundNamn FROM kund WHERE KundId = '$userId'";
    $selectResult = mysqli_query($conn, $select);
    $selectRow = mysqli_fetch_assoc($selectResult);
    ?>
    <section class="cofirm_container">
        <h1 class="heading" style="margin-top:10px;">Thanks for renting our <span>Car</span></h1>
        <div class="confirmation">
            <p>your id: <span><?php echo $selectRow['KundId']?></span></p>
            <p>your name: <span><?php echo $selectRow['KundNamn']?></span></p>
            <p>regnr: <span><?php echo $regnr?></span></p>
            <p>utdatum: <span><?php echo $out?></span></p>
            <p>indatum: <span><?php echo $in?></span></p>
            <p>Insurance: <span><?php echo $_POST['insurance'].' kr';?></span></p>
            <?php 
            echo "<p>".$hyrtyp.": <span>".$_POST[$hyrtyp]." kr</span></p>";
            ?>
            <p>Total cost: <span><?php echo intval($_POST['insurance'])+intval($_POST[$hyrtyp]).' kr';?></span></p>
            <a href="history.php" class="history-button btn">see your history</a>
        </div>
    </section>

</body>
</html>