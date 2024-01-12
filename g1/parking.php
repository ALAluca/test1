<?php 
         
         include("php/config.php");
         if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $slot = $_POST['slot'];
            $date = $_POST['date'];
            $starttime = $_POST['starttime'];
            $endtime = $_POST['endtime'];

        

         $verify_query = mysqli_query($con,"SELECT Slot FROM customer WHERE Slot='$slot'");

         if(mysqli_num_rows($verify_query) !=0 ){
            echo "<div class='message'>
                      <p>This slot is used, Try another One Please!</p>
                  </div> <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
         }
         else{

            mysqli_query($con,"INSERT INTO customer(Username,Slot,Date,StartTime,EndTime) VALUES('$username','$slot','$date','$starttime','$endtime')") or die("Error Occured");

            echo "<div class='message'>
                      <p>Book Successfully!</p>
                  </div> <br>";
            echo "<a href='home.php'><button class='btn'>Go Back</button>";
         

         }

         }else{
         
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home/style.css">
    <title>Register</title>

    <link rel="shortcut.icon"  href="icon.svg" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>

    <!--boostrap-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container">
    <nav>
      <ul>
        <li><a href="home.php" class="logo">
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
          <span class="nav-item">My Booking</span>
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

    <section id="booking" class="container">
        <div class="row container">
            <div class="form-box">
                <header>Booking</header>
                <form action="" method="post">
                    <div class="field input">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="slot">Choose a Slot:</label>
                        <select name="slot" id="slot" autocomplete="off" required>
                          <option value="Slot1">Slot 1</option>
                          <option value="Slot2">Slot 2</option>
                          <option value="Slot3">Slot 3</option>
                          <option value="Slot4">Slot 4</option>
                          <option value="Slot5">Slot 5</option>
                          <option value="Slot6">Slot 6</option>
                          <option value="Slot7">Slot 7</option>
                          <option value="Slot8">Slot 8</option>
                          <option value="Slot9">Slot 9</option>
                          <option value="Slot10">Slot 10</option>
                        </select>
                    </div>

                    <div class="field input">
                        <label for="date">Date of Book:</label>
                        <input type="date" name="date" id="date" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="starttime">Start Time</label>
                        <input type="time" name="starttime" id="starttime " autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="endtime">End Time</label>
                        <input type="time" name="endtime" id="sendtime" autocomplete="off" required>
                    </div>

                    <div class="field">
                    
                        <input type="submit" class="btn" name="submit" value="Register" required>
                    </div>
                    <div class="links">
                        Already a book? <a href="home.php">Check your Book</a>
                    </div>
                </form>
            </div>
        </div>
      </section>
      <?php } ?>
  </div>

  
</body>


<script>
 $(function(){
    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();

    var minDate= year + '-' + month + '-' + day;

    $('#date').attr('min', minDate);
});
</script>
</html>