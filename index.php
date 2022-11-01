<?php

require 'functions.php';


$result = mysqli_query($conn,"SELECT * FROM tbl_sepatu");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>AGI</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/aos.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <nav>
        <h1 class="logo">AGI</h1>
        <ul>
            <li><a href="#home">HOME</a></li>
            <li><a href="#product">PRODUCTS</a></li>
            <li><a href="#about">ABOUT</a></li>
            <li><a href="#contact">CONTACT</a></li>
            <li><a href="dataSepatu.php">LOGIN ADMIN</a></li>

            <li><a href="costumer/keranjang.php"><i class="fa fa-shopping-cart"></i></a></li>
        </ul>
    </nav>

    <section id="home">
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h1>Make Your Step<br>More Colorful!</h1>
                        <p>“Make a walk in such a way that everyone learns many things <br>
                            from your each step!”</p>
                        <a href="#go" class="go">Go Shopping</a>
                    </div>
                    <div class="col">
                        <img src="image/Display1.png" id="new">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
    window.addEventListener("scroll", function() {
        var nav = document.querySelector("nav");
        nav.classList.toggle("sticky", window.scrollY > 0);
    })
    </script>

    <!-------------------------brand------------------------->

    <div class="brand">
        <div class="small-container" class="small-container" data-aos="fade-down" data-aos-duration="1000">
            <h1 class="product">Brand List</h1>
            <div class="row" data-aos="fade-up" data-aos-duration="1000">
                <div class="col-2">
                    <img src="image/Logo-compass.svg.png">
                </div>
                <div class="col-2">
                    <img src="image/1156422-sepatu-lokal-berkelas.jpg">
                </div>
                <div class="col-2">
                    <img src="image/Logo-Ventela-1-e1592464296469.webp">
                </div>
                <div class="col-2">
                    <img src="image/12724900_1568056883507387_17406629_n.jpg">
                </div>
                <div class="col-2">
                    <img src="image/Brodo.png">
                </div>
            </div>
        </div>
    </div>

    <!-------------------------new------------------------->

    <section id="go">
        <div class="new">
            <div class="container" data-aos="fade-left" data-aos-duration="1000">
                <div class="title">
                    <h1>SPECIAL OFFER!</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod tempor incididunt ut labore et dolore magna</p>
                </div>

                <div class="row" data-aos="fade-right" data-aos-duration="1000">
                    <?php
                $i = 0;
                while($sepatu = mysqli_fetch_assoc($result)):
                ?>
                    <div class="col-3">
                        <h2><?= $sepatu['nama_produk']?></h2>
                        <img src="img/<?= $sepatu['gambar']?>">
                        <h2><?= $sepatu['nama_produk']?></h2>
                        <small><s>Rp. 300.000</s></small>
                        <h3>Rp.<?=$sepatu['harga']?></h3>
                        <a href="LoginUser/index.php" class="buy">Add To Cart
                            +</a>
                    </div>
                    <?php 
                $i++;
                endwhile;
                ?>
                </div>

            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="aos.js"></script>
    <script text="text/javascript">
    AOS.init();
    </script>

    <!-------------------------product------------------------->

    <section id="product">
        <div class="small-container" data-aos="fade-down" data-aos-duration="1000">
            <h1 class="product">Our Product</h1>
            <div class="row" data-aos="fade-up" data-aos-duration="1000">
                <div class="col-4">
                    <img src="image/1.jpg">
                    <h4>Navy Shoes</h4>
                    <p>Rp. 300.000</p>
                    <a href="#go" class="buy">Add To Cart +</a>
                </div>
                <div class="col-4">
                    <img src="image/1.jpg">
                    <h4>Navy Shoes</h4>
                    <p>Rp. 300.000</p>
                    <a href="#go" class="buy">Add To Cart +</a>
                </div>
                <div class="col-4">
                    <img src="image/1.jpg">
                    <h4>Navy Shoes</h4>
                    <p>Rp. 300.000</p>
                    <a href="#go" class="buy">Add To Cart +</a>
                </div>
                <div class="col-4">
                    <img src="image/1.jpg">
                    <h4>Navy Shoes</h4>
                    <p>Rp. 300.000</p>
                    <a href="#go" class="buy">Add To Cart +</a>
                </div>
                <a href="#go" class="all">See All Product</a>
            </div>
        </div>
    </section>

    <!-------------------------about------------------------->

    <section id="about">
        <div class="about">
            <div class="container" data-aos="zoom-in">
                <div class="row">
                    <div class="col-5">
                        <h1>ABOUT</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna. Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna. Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna
                            <br><br>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna. Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna
                        </p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-------------------------contact------------------------->

    <section id="contact">
        <div class="small-container">
            <h1 class="product" data-aos="fade-down" data-aos-duration="1000">Contact Us</h1>
            <div class="row">
                <div class="info" data-aos="fade-right" data-aos-duration="1000">
                    <div class="box">
                        <div class="icon"><i class="fa fa-phone"></i></div>
                        <div class="text">
                            <h3>Phone</h3>
                            <p>0987-6543-2101</p>
                        </div>
                    </div>
                    <div class="box">
                        <div class="icon"><i class="fa fa-envelope"></i></div>
                        <div class="text">
                            <h3>Email</h3>
                            <p>agistore@email.com</p>
                        </div>
                    </div>
                    <div class="box">
                        <div class="icon"><i class="fa fa-instagram"></i></div>
                        <div class="text">
                            <h3>Instagram</h3>
                            <p>@agistore</p>
                        </div>
                    </div>
                    <div class="box">
                        <div class="icon"><i class="fa fa-map-marker"></i></div>
                        <div class="text">
                            <h3>Address</h3>
                            <p>Tangerang Selatan</p>
                        </div>
                    </div>
                </div>
                <div class="form" data-aos="fade-left" data-aos-duration="1000">
                    <form action="">
                        <h2>Send Message</h2>
                        <div class="input-box">
                            <input type="text" name="" required="required">
                            <span>Full Name</span>
                        </div>
                        <div class="input-box">
                            <input type="text" name="" required="required">
                            <span>Phone</span>
                        </div>
                        <div class="input-box">
                            <input type="text" name="" required="required">
                            <span>Email</span>
                        </div>
                        <div class="input-box">
                            <textarea required="required"></textarea>
                            <span>Message</span>
                        </div>
                        <div class="input-box">
                            <input type="submit" name="" value="Send">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>