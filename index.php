<?php
    include "_connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>car rental</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
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
            <a href="#home" class="active">home</a>
            <a href="#service">service</a>
            <a href="#featured">cars</a>
            <a href="#brands">Brands</a>
            <a href="#contact">contact</a>
        </nav>
        <div class="registration">
            <a href="#" class="btn signup_btn">sign up</a>
            <a href="#" class="btn-2 signin_btn">sign in</a>
            <div class="menu fas fa-bars"></div>
            <a href="history.html" class="icon"><i class="fas fa-history"></i></a>
        </div>
    </header>
    <!-- header section ends -->

    <!-- home section starts -->
    <section class="home" id="home">
        <div class="content">
            <h1>Find the right car for you in low cost and easily</h1>
            <p>We have more than a thousand cars for you to choose. </p>
            <div class="divider"></div>
            <div class="store">
                <img src="images/playstore.png" alt="image">
                <img src="images/appstore.png" alt="image">
            </div>
        </div>
        <div class="overlay"></div>
        <div class="image">
            <img src="images/car.png" alt="">
        </div>
        <form class="search">
            <div class="search-icon">
                <i class="fas fa-search-plus"></i>
                <select name="location">
                    <option selected value="swe">Sweden</option>
                    <option value="ind">India</option>
                </select>
            </div>
            <div class="from">
                <span>from: </span>
                <input type="date">
            </div>
            <div class="to">
                <span>to: </span>
                <input type="date">
            </div>
            <input type="submit" class="btn submitBtn" value="search">
        </form>
    </section>
    <!-- home section ends -->

    <!-- service section starts -->
    <section class="service" id="service">
        <h1 class="heading">our <span>service</span> </h1>
        <div class="box-container">
            <div class="box">
                <i class="fas fa-cog"></i>
                <h3>speed metal repair</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis officia ullam illo dignissimos. Nisi sequi optio exercitationem quisquam officia sint.</p>
            </div>
            <div class="box">
                <i class="fas fa-tools"></i>
                <h3>speed metal repair</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error quaerat saepe laborum consequatur nam expedita tenetur repellendus delectus voluptatem sint?</p>
            </div>
            <div class="box">
                <i class="fas fa-truck-monster"></i>
                <h3>speed metal repair</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis doloremque atque ipsa officia ipsum rem sapiente explicabo deserunt aperiam inventore.</p>
            </div>
        </div>
    </section>
    <!-- service section ends -->

    <!-- featured section starts -->
    <section class="featured" id="featured">
        <h1 class="heading">featured <span>cars</span> </h1>
        <div class="box-container">

            <div class="box">
                <p class="mini-header">yesterday 12:45</p>
                <h3>ford explore (2021)</h3>
                <img src="images/car1.jpg" alt="image">
                <div class="box1">
                    <p>mileage: <span>49 000 KM</span></p>
                    <p>location <span>sweden</span> </p>
                </div>
                <div class="box2">
                    <p>engine: <span>3.5 diesel</span></p>
                    <p>cose <span>1000$</span> </p>
                </div>
                <a href="#" class="btn b">rent car</a>
            </div>

            <div class="box">
                <p class="mini-header">yesterday 12:45</p>
                <h3>toyota explore (2021)</h3>
                <img src="images/car2.jpg" alt="image">
                <div class="box1">
                    <p>mileage: <span>49 000 KM</span></p>
                    <p>location <span>sweden</span> </p>
                </div>
                <div class="box2">
                    <p>engine: <span>3.5 diesel</span></p>
                    <p>cose <span>1000$</span> </p>
                </div>
                <a href="#" class="btn">rent car</a>
            </div>

            <div class="box">
                <p class="mini-header">yesterday 12:45</p>
                <h3>rover explore (2021)</h3>
                <img src="images/car6.jpg" alt="image">
                <div class="box1">
                    <p>mileage: <span>49 000 KM</span></p>
                    <p>location <span>sweden</span> </p>
                </div>
                <div class="box2">
                    <p>engine: <span>3.5 diesel</span></p>
                    <p>cose <span>1000$</span> </p>
                </div>
                <a href="#" class="btn">rent car</a>
            </div>

            <div class="box">
                <p class="mini-header">yesterday 12:45</p>
                <h3>VW explore (2021)</h3>
                <img src="images/car5.jpg" alt="image">
                <div class="box1">
                    <p>mileage: <span>49 000 KM</span></p>
                    <p>location <span>sweden</span> </p>
                </div>
                <div class="box2">
                    <p>engine: <span>3.5 diesel</span></p>
                    <p>cose <span>1000$</span> </p>
                </div>
                <a href="#" class="btn">rent car</a>
            </div>

            <div class="box">
                <p class="mini-header">yesterday 12:45</p>
                <h3>mini explore (2021)</h3>
                <img src="images/car3.jpg" alt="image">
                <div class="box1">
                    <p>mileage: <span>49 000 KM</span></p>
                    <p>location <span>sweden</span> </p>
                </div>
                <div class="box2">
                    <p>engine: <span>3.5 diesel</span></p>
                    <p>cose <span>1000$</span> </p>
                </div>
                <a href="#" class="btn">rent car</a>
            </div>

            <div class="box">
                <p class="mini-header">yesterday 12:45</p>
                <h3>nissan explore (2021)</h3>
                <img src="images/car4.jpg" alt="image">
                <div class="box1">
                    <p>mileage: <span>49 000 KM</span></p>
                    <p>location <span>sweden</span> </p>
                </div>
                <div class="box2">
                    <p>engine: <span>3.5 diesel</span></p>
                    <p>cose <span>1000$</span> </p>
                </div>
                <a href="#" class="btn">rent car</a>
            </div>

            <div class="box extra">
                <p class="mini-header">yesterday 12:45</p>
                <h3>mini explore (2021)</h3>
                <img src="images/car3.jpg" alt="image">
                <div class="box1">
                    <p>mileage: <span>49 000 KM</span></p>
                    <p>location <span>sweden</span> </p>
                </div>
                <div class="box2">
                    <p>engine: <span>3.5 diesel</span></p>
                    <p>cose <span>1000$</span> </p>
                </div>
                <a href="#" class="btn">rent car</a>
            </div>

            <div class="box extra">
                <p class="mini-header">yesterday 12:45</p>
                <h3>VW explore (2021)</h3>
                <img src="images/car5.jpg" alt="image">
                <div class="box1">
                    <p>mileage: <span>49 000 KM</span></p>
                    <p>location <span>sweden</span> </p>
                </div>
                <div class="box2">
                    <p>engine: <span>3.5 diesel</span></p>
                    <p>cose <span>1000$</span> </p>
                </div>
                <a href="#" class="btn">rent car</a>
            </div>

        </div>

    </section>
    <!-- featured section ends -->

    <!-- contact section starts -->
    <section class="contact" id="contact">
        <h1 class="heading">contact <span>us</span> </h1>
        <div class="box-container">
            <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d65134.89407310076!2d18.00344405820311!3d59.325182800000015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x465f77ffa85ce413%3A0x7f270cf934327ca7!2sAntique%20Maps%20and%20Prints!5e0!3m2!1sen!2sse!4v1636370865488!5m2!1sen!2sse"></iframe>
            <form>
                <div class="inputs">
                    <input type="text" placeholder="name" class="box">
                    <input type="mail" placeholder="mail" class="box">
                </div>
                <textarea class="box" placeholder="your message"></textarea>
                <input type="submit" class="submit" value="send">
            </form>
        </div>
    </section>
    <!-- contact section ends -->

    <!-- brands section starts -->
    <section class="brands" id="brands">
        <h1 class="heading">car <span>brands</span> </h1>
        <div class="box">
            <img src="images/ford.png" alt="images">
            <img src="images/toyota.png" alt="images">
            <img src="images/nissan.png" alt="images">
            <img src="images/mini.png" alt="images">
            <img src="images/landrover.png" alt="images">
            <img src="images/w.png" alt="images">
        </div>
    </section>
    <!-- brands section ends -->

    <!-- footer sectionn starts -->
    <footer class="footer">
        <div class="box">
            <a href="#" class="logo">LOGO<span>.</span></a>
            <div class="credit">
                Created by <span>Arafat Islam</span> || all rights reserved
            </div>
            <div class="icons">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin-in"></a>
                <a href="#" class="fab fa-twitter"></a>
            </div>
        </div>
    </footer>
    <!-- footer sectionn ends -->

    <script src="script.js"></script>
</body>
</html>