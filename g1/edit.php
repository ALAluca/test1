<?php 
   session_start();

   include("php/config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: index.php");
   }
?>

<?php 
               if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $email = $_POST['email'];
                $birthdate = $_POST['birthdate'];
                $password = $_POST['password'];
                $contact = $_POST['contact'];
                $plateno = $_POST['plateno'];

                $id = $_SESSION['id'];

                $edit_query = mysqli_query($con,"UPDATE users SET Username='$username', Email='$email', BirthDate='$birthdate', Password='$password', Contact='$contact', PlateNo='$plateno' WHERE Id=$id ") or die("error occurred");

                if($edit_query){
                    echo "<div class='message'>
                    <p>Profile Updated!</p>
                </div> <br>";
              echo "<a href='home.php'><button class='btn'>Go Home</button>";
       
                }
               }else{

                $id = $_SESSION['id'];
                $query = mysqli_query($con,"SELECT*FROM users WHERE Id=$id ");

                while($result = mysqli_fetch_assoc($query)){
                    $res_Uname = $result['Username'];
                    $res_Email = $result['Email'];
                    $res_BirthDate = $result['BirthDate'];
                    $res_Password = $result['Password'];
                    $res_Contact = $result['Contact'];
                    $res_PlateNo = $result['PlateNo'];
                }

            ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home/style.css">
    <title>Change Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<body>
<div class="container">
    <nav>
      <ul>
        <li><a href="#" class="logo">
          <span style="color: rgba(3, 68, 2, 0.90);">GNC</span>
          <span style="color: #867777;">DRIVEHUB</span>
        </a></li>
        <li><a href="home.php">
          <i class="fas fa-home"></i>
          <span class="nav-item">Home</span>
        </a></li>
        <li><a href="profile.php">
          <i class="fas fa-user"></i>
          <span class="nav-item">Profile</span>
        </a></li>
        <li><a href="booking.php">
          <i class="fas fa-tasks"></i>
          <span class="nav-item">Booking</span>
        </a></li>
        <li><a href="parking.php">
          <i class="fas fa-tasks"></i>
          <span class="nav-item">Parking slot</span>
        </a></li>
        <li><a href="edit.php">
          <i class="fas fa-cog"></i>
          <span class="nav-item">Settings</span>
        </a></li>
        <li><a href="">
          <i class="fas fa-question-circle"></i>
          <span class="nav-item">Help</span>
        </a></li>
        <li><a href="php/logout.php" class="logout">
          <i class="fas fa-sign-out-alt"></i>
          <span class="nav-item">Log out</span>
        </a></li>
      </ul>
    </nav>
    <div class="container" id="edit">
        <div class="box form-box">
            <header>Change Information</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" value="<?php echo $res_Uname; ?>" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" value="<?php echo $res_Email; ?>" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="birthdate">Birthdate</label>
                    <input type="date" max="2013-01-02" name="birthdate" id="birthdate" value="<?php echo $res_BirthDate; ?>" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" min= "1" max="10" value="<?php echo $res_Password; ?>" autocomplete="off" required>
                </div>
                

                <div class="field input">
                    <label for="contact">Contact No.</label>
                    <input type="tel" name="contact" id="contact" pattern="[0-9]" maxlength="11" value="<?php echo $res_Contact;?>" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="plateno">Plate Number</label>
                    <input type="text" name="plateno" id="plateno" maxlength="6" value="<?php echo $res_PlateNo; ?>" autocomplete="off" required>
                </div>
                
                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Update" required>
                </div>
                
            </form>
        </div>
        <?php } ?>
      </div>
  </div>
</body>
</html>