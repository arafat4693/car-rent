<?php
include "_connect.php";
session_start();
$userId = $_SESSION['dinId'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>history</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
        <!-- header section starts -->
        <div class="notice">
            <i class="fas fa-check"></i>
            rented successfullly
        </div>
        <header>
            <a href="index.php" class="logo">LOGO<span>.</span></a>
            <nav class="navbar">
                <a href="index.php" class="active">home</a>
                <a href="index.php">service</a>
                <a href="index.php">cars</a>
                <a href="index.php">Brands</a>
                <a href="index.php">contact</a>
            </nav>
        </header>
        <!-- header section ends -->
        <h1 class="heading history">Your <span>history</span> </h1>

        <section class="history_container">
            <table class="car-data">
                <thead>
                    <tr>
                        <th>Regnr</th>
                        <th>Booking date</th>
                        <th>Out date</th>
                        <th>Entry date</th>
                        <th>Rent type</th>
                        <th>Total km</th>
                        <th>Cost</th>
                        <th>fuel cost</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $historySql = "SELECT * FROM hyr WHERE KundId='$userId'";
                    $historyResult = mysqli_query($conn, $historySql);
                    if($historyResult){
                        while($row=mysqli_fetch_assoc($historyResult)){
                    ?>
                    <tr>
                        <td><?php echo $row['Regnr'];?></td>
                        <td><?php echo $row['Bokningsdatum'];?></td>
                        <td><?php echo $row['Utdatum'];?></td>
                        <td><?php echo $row['Indatum'];?></td>
                        <td><?php echo $row['Hyrtyp'];?></td>
                        <td><?php echo $row['AntalKm'];?></td>
                        <td><?php echo $row['Kostnad'];?></td>
                        <td><?php echo $row['Bensinkostnad'];?></td>
                    </tr>
                    <?php 
                        }
                    }
                    ?>
                </tbody>
            </table>
        </section>

</body>
</html>