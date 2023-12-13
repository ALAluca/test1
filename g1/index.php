<?php 
   session_start();

   include("php/config.php");
              if(isset($_POST['submit'])){
                $email = mysqli_real_escape_string($con,$_POST['email']);
                $password = mysqli_real_escape_string($con,$_POST['password']);

                $result = mysqli_query($con,"SELECT * FROM users WHERE Email='$email' AND Password='$password' ") or die("Select Error");
                $row = mysqli_fetch_assoc($result);

                if(is_array($row) && !empty($row)){
                    $_SESSION['valid'] = $row['Email'];
                    $_SESSION['username'] = $row['Username'];
                    $_SESSION['age'] = $row['Age'];
                    $_SESSION['id'] = $row['Id'];
                }else{
                    echo "<div class='message'>
                      <p>Wrong Username or Password</p>
                       </div> <br>";
                   echo "<a href='index.php'><button class='btn'>Go Back</button>";
         
                }
                if(isset($_SESSION['valid'])){
                    header("Location: home.php");
                }
              }else{
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>GNC DriveHub</title>
    
    <link rel="shortcut.icon"  href="icon.svg" type="image/x-icon">
    <link rel="stylesheet" href="GS/style.css">

    <!--boostrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>
<body>
    <section id="menu" class="container">
        <div class="row">
            <div class="col-sm">
                <div class="topnav" id="myTopnav">
                    <a href="#home" class="active">
                    <span style="color: rgba(3, 68, 2, 0.90);">GNC</span>
                    <span style="color: #867777;">DRIVEHUB</span>
                    </a>
                    <a href="#news">News</a>
                    <a href="#contact">Contact</a>
                    <a href="#about">About</a>
                    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                      <i class="fa fa-bars"></i>
                    </a>
                  </div>
            </div>
        </div>
    </section>

    <section id="main" class="bg-image container">
        <div class="row container">
            <div class="col-sm">
                <img src="img/GNC.png" alt="GNC.png" class="gnc">
                <h1 class="m1">
                    <span style="color: rgba(3, 68, 2, 0.90);">GNC</span>
                    <span style="color: #867777;">DRIVEHUB</span>
                </h1>
                <p class="m2">GNCDriveHub helps you get everywhere, easier by making it fast and convenient to find and reserve parking in Guagua National Park.</p>
            </div>
        </div>
    </section>
    
    

    <section id="login">
        <div class="container">
            <div class="row box form-box">
                <img src="img/GNCLogoHD.png" alt="GNCLogoHD">
                <header>Login</header>
                <form action="" method="post">
                    <div class="field input">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" autocomplete="off" required>
                    </div>

                    <div class="field">
                    
                        <input type="submit" class="btn" name="submit" value="Login" required>
                    </div>
                    <div class="links">
                        Don't have account? <a href="register.php">Sign Up Now</a>
                    </div>
                </form>
            </div>
            <?php } ?>
        </div>
    </section>
</body>
<script>
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
             x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }
</script>
</html>