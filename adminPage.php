<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('connect.php');
require_once('user.php');
require_once('admin.php');
require_once('item.php');

// Handle user signup
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['tel']) && isset($_POST['password'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $password = $_POST['password'];

    $user = new user($con, $name, $email, $tel, $password);
    if(!$user->userIsExist()) {
        if($user->signup()) {
            echo "User added successfully.";
            exit; // Ensure that no code is executed after the redirection
        } else {
            echo "Error in user registration.";
        }
    } else {
        echo "This user already exists.";
    }
}

?>

       






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign_Up</title>
    <link rel="stylesheet" href="css/styleGeneral.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
</head>
<body>



<header>
        <div id="menu-bar" class="fas fa-bars" onclick="showmenu()"></div>
     
        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#book">book</a>
            <a href="#packages">packages</a>
            <a href="#services">services</a>
            <a href="itemPage.php">Items</a>
            <a href="adminReservation.php">reservation</a>
            <a href="logout.php">logout</a>

      </div>
</header>
      

    <!------------------------------------------------------------------------------------>
    <!------------------------------------------------------------------------------------>

    <section class="book" id="book">
        <h1 class="heading">
            <span>A</span>
            <span>d</span>
            <span>d</span>
            &nbsp;
            &nbsp;
            <span>U</span>
            <span>s</span>
            <span>e</span>
            <span>r</span>
            
        </h1>

        <div class="row">
            <div class="image">
                <img src="images/book-img.svg" alt="">
            </div>
            <form method="post">
                <div class="inputdiv">
                    <h3>user name</h3>
                    <input type="text" placeholder="user name" name="name">
                </div>
                <div class="inputdiv">
                    <h3>user eamil</h3>
                    <input type="text" placeholder="user eamil" name="email">
                </div>
                <div class="inputdiv">
                    <h3>user number phone</h3>
                    <input type="text" placeholder="user number phone"name="tel">
                </div>

                <div class="inputdiv">
                    <h3>user password</h3>
                    <input type="password" placeholder="your password"name="password">
                </div>
                <div class="inputdiv">

                <input type="submit" class="btn" value="Sign up now">
            </form>
        </div>
    </section>
    <!------------------------------------------------------------------------------------>
    <!------------------------------------------------------------------------------------>

     <section  class="displayUser">
     <h1 class="heading">
            <span>D</span>
            <span>I</span>
            <span>S</span>
            <span>P</span>
            <span>L</span>
            <span>A</span>
            <span>Y</span>
            &nbsp;
            &nbsp;
            &nbsp;
            <span>U</span>
            <span>s</span>
            <span>e</span>
            <span>r</span>
            
        </h1>
        <div class="container">
  <h2>Striped Rows</h2>
  <p>The .table-striped class adds zebra-stripes to a table:</p>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>id</th>
        <th>name</th>
        <th>Email</th>
        <th>nember phone</th>
        <th>delete</th>
        <th>update</th>
      </tr>
    </thead>
    <tbody>
        <?php
         admin::desplayUser($con);
        ?>
     
    </tbody>
  </table>
</div>
     </section>
 
       <!------------------------------------------------------------------------------------>
    <!------------------------------------------------------------------------------------>
       
    <!-- Bootstrap JS (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
    </section> 
    
</body>
</html>