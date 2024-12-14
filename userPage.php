<?php
require_once('connect.php');
require_once('item.php');
session_start();
$username=$_SESSION['name'];
$userId=$_SESSION['id'];



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WORLD WIDE</title>
    <link rel="stylesheet" href="css/styleGeneral.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <style>
        .username {
    margin-left: 15px;
    font-size: 16px;
    font-weight: bold;
    color: #fff;  /* or any other color that fits your design */
    display: inline-block;
    vertical-align: middle;
}

/* Add necessary styles to ensure the header layout remains intact */
.header .icon {
    display: flex;
    align-items: center;
}

.header .icon i {
    margin-right: 10px;
    cursor: pointer;
}

.search-form {
    display: none; /* Ensure the search form is initially hidden */
}
    </style>
</head>

<body>
    
    
  
 
    <header>
        <div id="menu-bar" class="fas fa-bars" onclick="showmenu()"></div>
        <a href="" class="logo"><span>W</span>orld<span>W</span>wide</a>
        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#book">book</a>
            <a href="#packages">packages</a>
            <a href="#services">services</a>
            <a href="#gallary">gallary</a>
            <a href="#review">review</a>
            <a href="logout.php">logout</a>
        </nav>
        <div class="icon">
            <i class="fas fa-search" onclick="showbar()" id="search-btn"></i>
            <span class="username" ><?php  echo  $username; ?></span>

        </div>
        <form action="" class="search-form">
            <input type="search" id="search-bar" placeholder="What you looking for...">
            <label for="search-bar" class="fas fa-search"></label>
        </form>
    </header>
  <?php
    if(!$user){
       echo '<div class="alert alert-danger"><strong>This user is not signed up.</strog> Please sign up and try again.</div>';
       $user=1;

    }
  
    ?>

    <div class="login-form" id="login-form">
        <i class="fas fa-times" id="form-close" onclick="hideform()"></i>
        <form action="" method="post">
            <h3>login</h3>
            <select class="form-select" name="x">
                  <option value="user">user</option>
                  <option value="admin">admin</option>
            </select>
            <input type="email" class="box" placeholder="Enter your email" name="email">
            <input type="password" class="box" placeholder="Enter your password" name="password">
            <input type="submit" value="login now" class="btn">
            <input type="checkbox" id="remember">
            <label for="remmember"> remember me</label>
            <p>forget password? <a href="">click here</a></p>
            <p>don't have acount? <a href="signup.php">sign up</a></p>
        </form>
    </div>
    <!-------------------------------------------------------------------------------->
    <!-------------------------------------------------------------------------------->

    
    
     
    <section class="home" id="home">
        <div class="content">
            <h3>WORLD WIDE MAKE TRAVEL EASY</h3>
            <p>Discover New Places With Us, Adventure Awaits</p>
            <a href="#" class="btn">Discover More</a>
        </div>

        <div class="controls">
            <span class="video-btn blue" data-src="images/vid-1.mp4"></span>
            <span class="video-btn" data-src="images/vid-3.mp4"></span>
            <span class="video-btn" data-src="images/vid-4.mp4"></span>
            <span class="video-btn" data-src="images/vid-5.mp4"></span>
        </div>
        <div class="video-container">
            <video src="images/vid-1.mp4 " id="video-slider" loop autoplay muted></video>
        </div>
    </section>


   

    <?php
     
      item::displayItems($con);

    ?>

    <!------------------------------------------------------------------------------------>
    <!------------------------------------------------------------------------------------>

    <section class="services" id="services">

        <h1 class="heading">
            <span>p</span>
            <span>a</span>
            <span>c</span>
            <span>k</span>
            <span>a</span>
            <span>g</span>
            <span>e</span>
            <span>s</span>
        </h1>

        <div class="container">
            <div class="box">
                <i class="fas fa-hotel"></i>
                <h3>affordable hotel</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero maxime, tenetur eaque suscipit adipisci illo! Debitis tempora temporibus neque repudiandae!</p>
            </div>
            <div class="box">
                <i class="fas fa-utensils"></i>
                <h3>affordable hotel</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero maxime, tenetur eaque suscipit adipisci illo! Debitis tempora temporibus neque repudiandae!</p>
            </div>
            <div class="box">
                <i class="fas fa-bullhorn"></i>
                <h3>affordable hotel</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero maxime, tenetur eaque suscipit adipisci illo! Debitis tempora temporibus neque repudiandae!</p>
            </div>
            <div class="box">
                <i class="fas fa-globe-asia"></i>
                <h3>affordable hotel</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero maxime, tenetur eaque suscipit adipisci illo! Debitis tempora temporibus neque repudiandae!</p>
            </div>
            <div class="box">
                <i class="fas fa-plane"></i>
                <h3>affordable hotel</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero maxime, tenetur eaque suscipit adipisci illo! Debitis tempora temporibus neque repudiandae!</p>
            </div>
            <div class="box">
                <i class="fas fa-hiking"></i>
                <h3>affordable hotel</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero maxime, tenetur eaque suscipit adipisci illo! Debitis tempora temporibus neque repudiandae!</p>
            </div>
        </div>
    </section>
    
    <!-------------------------------------------------------------------------------------->
    <!-------------------------------------------------------------------------------------->

    <section class="gallary" id="gallary">

        <h1 class="heading">
            <span>p</span>
            <span>a</span>
            <span>c</span>
            <span>k</span>
            <span>a</span>
            <span>g</span>
            <span>e</span>
            <span>s</span>
        </h1>

        <div class="container">
            <div class="box">
                <img src="images/g-1.jpg" alt="">
                <div class="content">
                    <h3>amazing place</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga?</p>
                    <a href="" class="btn">See more</a>
                </div>
            </div>
            <div class="box">
                <img src="images/g-2.jpg" alt="">
                <div class="content">
                    <h3>amazing place</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga?</p>
                    <a href="" class="btn">See more</a>
                </div>
            </div>
            <div class="box">
                <img src="images/g-3.jpg" alt="">
                <div class="content">
                    <h3>amazing place</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga?</p>
                    <a href="" class="btn">See more</a>
                </div>
            </div>
            <div class="box">
                <img src="images/g-4.jpg" alt="">
                <div class="content">
                    <h3>amazing place</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga?</p>
                    <a href="" class="btn">See more</a>
                </div>
            </div>
            <div class="box">
                <img src="images/g-5.jpg" alt="">
                <div class="content">
                    <h3>amazing place</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga?</p>
                    <a href="" class="btn">See more</a>
                </div>
            </div>
            <div class="box">
                <img src="images/g-6.jpg" alt="">
                <div class="content">
                    <h3>amazing place</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga?</p>
                    <a href="" class="btn">See more</a>
                </div>
            </div>
            <div class="box">
                <img src="images/g-7.jpg" alt="">
                <div class="content">
                    <h3>amazing place</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga?</p>
                    <a href="" class="btn">See more</a>
                </div>
            </div>
            <div class="box">
                <img src="images/g-8.jpg" alt="">
                <div class="content">
                    <h3>amazing place</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga?</p>
                    <a href="" class="btn">See more</a>
                </div>
            </div>
            <div class="box">
                <img src="images/g-9.jpg" alt="">
                <div class="content">
                    <h3>amazing place</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga?</p>
                    <a href="" class="btn">See more</a>
                </div>
            </div>
        </div>

    </section>

    <!----------------------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------------------->
    
    <section class="review" id="review">

        <h1 class="heading">
            <span>p</span>
            <span>a</span>
            <span>c</span>
            <span>k</span>
            <span>a</span>
            <span>g</span>
            <span>e</span>
            <span>s</span>
        </h1>

        <div class="swiper review-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="box">
                        <img src="images/pic1.jpg" alt="">
                        <h3>jack moe</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores totam, voluptatem non debitis illum tenetur cum quasi corporis veritatis unde.</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="box">
                        <img src="images/pic2.jpg" alt="">
                        <h3>jack moe</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores totam, voluptatem non debitis illum tenetur cum quasi corporis veritatis unde.</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="box">
                        <img src="images/pic3.jpg" alt="">
                        <h3>jack moe</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores totam, voluptatem non debitis illum tenetur cum quasi corporis veritatis unde.</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="box">
                        <img src="images/pic4.jpg" alt="">
                        <h3>jack moe</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores totam, voluptatem non debitis illum tenetur cum quasi corporis veritatis unde.</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    
    <!----------------------------------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------------------------------->

    <section class="contact" id="contact">

        <h1 class="heading">
            <span>p</span>
            <span>a</span>
            <span>c</span>
            <span>k</span>
            <span>a</span>
            <span>g</span>
            <span>e</span>
            <span>s</span>
        </h1>

        <div class="row">
            <div class="image">
                <img src="images/contact-img.svg" alt="">
            </div>
            <form action="">
                <div class="inputbox">
                    <input type="text" placeholder="name">
                    <input type="email" placeholder="email">
                </div>
                <div class="inputbox">
                    <input type="number" placeholder="number">
                    <input type="text" placeholder="subject">
                </div>
                <textarea name="" id="" cols="30" rows="10" placeholder="message"></textarea>
                <input type="submit" class="btn" value="send message">
            </form>
        </div>
    </section>
  
    <!------------------------------------------------------------------------------------------->
    <!------------------------------------------------------------------------------------------->

    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>about us</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veritatis temporibus quas quasi facere id, aspernatur rem obcaecati maiores inventore expedita.</p>
            </div>
            <div class="box">
                <h3>barnch</h3>
                <a href="#">egypt</a>
                <a href="#">london</a>
                <a href="#">korea</a>
                <a href="#">japan</a>
            </div>
            <div class="box">
                <h3>quick links</h3>
                <a href="#">home</a>
                <a href="#">book</a>
                <a href="#">packages</a>
                <a href="#">services</a>
                <a href="#">gallary</a>
                <a href="#">review</a>
                <a href="#">contact</a>
            </div>
            <div class="box">
                <h3>follow us</h3>
                <a href="#">facebook</a>
                <a href="#">instagram</a>
                <a href="#">twitter</a>
                <a href="#">linkedin</a>
            </div>
        </div>
        <h1 class="created">created by <span>eslam soliman</span> all right reserved</h1>
    </section>






    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <?php echo $x;?>

    <script src="travel.js"></script>
</body>
</html>