<?php
session_start();
include '../config.php';

if(isset($_POST['login'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Check users table
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");

    if(mysqli_num_rows($result) == 1){
        $user = mysqli_fetch_assoc($result);

        $_SESSION['user'] = $user['username'];
        $_SESSION['role'] = $user['role']; // 'admin' or 'faculty'
        $_SESSION['faculty_id'] = $user['faculty_id']; // null for admin

        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid username or password";
    }
}
?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | MCA Department</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
  <header>
      <div class="container">
          <div class="logo">
              <img src="photo.jpg" alt="University Logo">
              <div>
                  <h1>Department of studies in Computer Applications</h1>
                  <p>Master of Computer Applications (MCA)</p>
              </div>
          </div>
          <nav>
              <ul>
                  <li><a href="../index.php">Home</a></li>
                  <li><a href="../about.php">About</a></li>
                  <li><a href="../faculty.php">Faculty</a></li>
                  <li><a href="../courses.php">Courses</a></li>
                  <li><a href="../admission.php">Admission</a></li>
                  <li><a href="../facilities.php">Facilities</a></li>
                  <li><a href="../contact.php">Contact</a></li>
                  <li class="active"><a href="login.php">Log In</a></li>
              </ul>
              <div class="mobile-menu">
                  <i class="fas fa-bars"></i>
              </div>
          </nav>
      </div>
  </header>





  <section class="contact-form-section">
      <div class="container">
          <h2 align="center">Log In</h2><br>





          <?php if(isset($success)){ ?>
              <p style="color: green; text-align:center;"><?php echo $success; ?></p>
          <?php } elseif(isset($error)){ ?>
              <p style="color: red; text-align:center;"><?php echo $error; ?></p>
          <?php } ?>

          <form class="contact-form" method="POST" action="">


              <div class="form-group">

                    <input type="text" name="username" placeholder="Username" required><br><br>
                    <input type="password" name="password" placeholder="Password" required><br><br>
                    <input type="submit" name="login" value="Login">
                    <?php if(isset($error)) echo "<p>$error</p>"; ?>

              </form>
              </div>





          </form>
      </div>
  </section>





  <footer>
      <div class="container">
          <div class="footer-section">
              <h3>Quick Links</h3>
              <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="../about.php">About</a></li>
                <li><a href="../faculty.php">Faculty</a></li>
                <li><a href="../courses.php">Courses</a></li>
                <li><a href="../admission.php">Admission</a></li>
                <li><a href="../facilities.php">Facilities</a></li>
                <li><a href="../contact.php">Contact</a></li>
                <li><a href="login.php">Log In</a></li>
              </ul>
          </div>
          <div class="footer-section">
              <h3>Contact Us</h3>
              <p><i class="fas fa-map-marker-alt"></i> MCA Department, University Campus, City - 123456</p>
              <p><i class="fas fa-phone"></i> +91 1234567890</p>
              <p><i class="fas fa-envelope"></i> mca@university.edu</p>
          </div>
          
      </div>
      <div class="copyright">
          <p>&copy; 2025 MCA Department, University Name. All Rights Reserved.</p>
      </div>
  </footer>

  <script src="js/script.js"></script>
</body>
</html>
