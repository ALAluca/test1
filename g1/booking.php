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
                $slot = $_POST['slot'];
                $date = $_POST['date'];
                $starttime = $_POST['starttime'];
                $endtime = $_POST['endtime'];

                $id = $_SESSION['id'];

                $edit_query = mysqli_query($con,"UPDATE customer SET Username='$username', Slot='$slot', Date='$date', StartTime='$starttime', EndTime='$endtime' WHERE Id=$id ") or die("error occurred");

                if($edit_query){
                    echo "<div class='message'>
                    <p>Profile Updated!</p>
                </div> <br>";
              echo "<a href='home.php'><button class='btn'>Go Home</button>";
       
                }
               }else{

                $id = $_SESSION['id'];
                $query = mysqli_query($con,"SELECT*FROM customer WHERE Id=$id ");

                while($result = mysqli_fetch_assoc($query)){
                    $res_Uname = $result['Username'];
                    $res_slot = $result['Slot'];
                    $res_date = $result['Date'];
                    $res_starttime = $result['StartTime'];
                    $res_endtime = $result['EndTime'];
                }

            ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home/style.css">
    <title>Home</title>

    <!-- FontAwesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
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

    <section>
        <div class="row">
            <div class="cl">
            <table>
                    <tbody>
                        <tr>
                            <td>Username</td>
                            <td>:</td>
                            <td><?php echo $res_Uname; ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><?php echo $res_Slot; ?></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>:</td>
                            <td><?php echo $res_Date; ?></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>:</td>
                            <td><?php echo $res_StartTime; ?></td>
                        </tr>
                        <tr>
                            <td>Contact No.</td>
                            <td>:</td>
                            <td><?php echo $res_EndTime; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

 
    <?php } ?>
  </div>
</body>
</html>