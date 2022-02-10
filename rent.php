<?php
include "_connect.php";
$regnr = $_GET['regnr'];
$grupp = $_GET['grupp'];
$in = $_GET['in'];
$out = $_GET['out'];
$total = ((strtotime($in)-strtotime($out))/86400)+1;
$carSql = "SELECT * FROM bil INNER JOIN gruppbet ON bil.Gruppbet = gruppbet.Gruppbet WHERE bil.Regnr = '$regnr'";
$carRes = mysqli_query($conn, $carSql);
$carRow = mysqli_fetch_assoc($carRes);
// echo $carRow['Korttidkm'];
// print_r($carRow);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Rent</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
</head>
<body>
    <section class="yourCar">
        <h1 class="heading">Your <span>Car</span></h1>
        <div class="yourCar-container">
            <div class="yourCar-box">
                <div class="yourCar-content">
                    <h1>Regnr</h1>
                    <p><?php echo $carRow['Regnr'];?></p>
                </div>
                <i class="fa-solid fa-car" style="background-color: hsl(55, 81%, 94%); color: hsl(56, 89%, 56%);"></i>
            </div>
            <div class="yourCar-box">
                <div class="yourCar-content">
                    <h1>Brand</h1>
                    <p><?php echo $carRow['Marke'];?></p>
                </div>
                <i class="fa-solid fa-car" style="background-color: hsl(10, 81%, 94%); color: hsl(16, 89%, 56%);"></i>
            </div>
            <div class="yourCar-box">
                <div class="yourCar-content">
                    <h1>Model</h1>
                    <p><?php echo $carRow['Modell'];?></p>
                </div>
                <i class="fa-solid fa-car" style="background-color: hsl(30, 81%, 94%); color: hsl(31, 89%, 56%);"></i>
            </div>
            <div class="yourCar-box">
                <div class="yourCar-content">
                    <h1>Meter</h1>
                    <p><?php echo $carRow['Matarstallning'];?></p>
                </div>
                <i class="fa-solid fa-car" style="background-color: hsl(65, 81%, 94%); color: hsl(66, 89%, 46%);"></i>
            </div>
            <div class="yourCar-box">
                <div class="yourCar-content">
                    <h1>Days</h1>
                    <p>Out date: <?php echo $out;?></p>
                    <p>Entry date: <?php echo $in;?></p>
                    <p>Toal Days: <?php echo $total;?></p>
                </div>
                <i class="fa-solid fa-car" style="background-color: hsl(85, 81%, 94%); color: hsl(86, 89%, 56%);"></i>
            </div>
            <div class="yourCar-box">
                <div class="yourCar-content">
                    <h1>Insurance</h1>
                    <p><?php echo $carRow['Forsakring'];?></p>
                    <p>For you: <?php echo $carRow['Forsakring'].'x'.$total;?></p>
                    <p>Toal Cost: <?php echo intval($carRow['Forsakring'])*$total;?></p>
                </div>
                <i class="fa-solid fa-car" style="background-color: hsl(211, 81%, 94%); color: hsl(212, 89%, 56%);"></i>
            </div>
            <div class="yourCar-box">
                <div class="yourCar-content">
                    <h1>ST days</h1>
                    <p><?php echo $carRow['Korttiddygn'];?></p>
                    <p>For you: <?php echo $carRow['Korttiddygn'].'x'.$total;?></p>
                    <p>Toal Cost: <?php echo intval($carRow['Korttiddygn'])*$total;?></p>
                </div>
                <i class="fa-solid fa-car" style="background-color: hsl(278, 81%, 94%); color: hsl(279, 89%, 56%);"></i>
            </div>
            <div class="yourCar-box">
                <div class="yourCar-content">
                    <h1>Weekend</h1>
                    <p><?php echo $carRow['Veckoslut'];?></p>
                    <p>For you: <?php echo $carRow['Veckoslut'].'x'.$total;?></p>
                    <p>Toal Cost: <?php echo intval($carRow['Veckoslut'])*$total;?></p>
                </div>
                <i class="fa-solid fa-car" style="background-color: hsl(161, 81%, 94%); color: hsl(162, 89%, 56%);"></i>
            </div>
            <div class="yourCar-box">
                <div class="yourCar-content">
                    <h1>ST km</h1>
                    <p><?php echo $carRow['korttidkm'];?></p>
                </div>
                <i class="fa-solid fa-car" style="background-color: hsl(320, 81%, 94%); color: hsl(321, 89%, 56%);"></i>
            </div>
            <div class="yourCar-box">
                <div class="yourCar-content">
                    <h1>Weekend km</h1>
                    <p><?php echo $carRow['Veckoslutkm'];?></p>
                </div>
                <i class="fa-solid fa-car" style="background-color: hsl(235, 81%, 94%); color: hsl(236, 89%, 56%);"></i>
            </div>
            <div class="yourCar-box">
                <div class="yourCar-content">
                    <h1>Weekend free</h1>
                    <p><?php echo $carRow['Veckoslutfri'];?></p>
                </div>
                <i class="fa-solid fa-car" style="background-color: hsl(331, 81%, 94%); color: hsl(332, 89%, 56%);"></i>
            </div>
            <select id="options">
                <option value="st-days">short term days</option>
                <option value="weekend">weekend</option>
                <option value="weekendFree">weekend free</option>
            </select>
        </div>
        <div class="book-button">
            <a href="#" class="btn">Book now</a>
        </div>
    </section>
</body>
</html>