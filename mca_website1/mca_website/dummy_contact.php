<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $sql = "INSERT INTO contact_messages (name, email, phone, subject, message)
            VALUES ('$name', '$email', '$phone', '$subject', '$message')";

    mysqli_query($conn, $sql);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | MCA Department</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
  <header>
      <div class="container">
          <div class="logo">
              <img src="images/photo.jpg" alt="University Logo">
              <div>
                  <h1>Department of studies in Computer Applications</h1>
                  <p>Master of Computer Applications (MCA)</p>
              </div>
          </div>
          <nav>
              <ul>
                  <li><a href="index.php">Home</a></li>
                  <li><a href="about.php">About</a></li>
                  <li><a href="faculty.php">Faculty</a></li>
                  <li><a href="courses.php">Courses</a></li>
                  <li><a href="admission.php">Admission</a></li>
                  <li><a href="facilities.php">Facilities</a></li>
                  <li class="active"><a href="contact.php">Contact</a></li>
                  <li><a href="admin/login.php">Log In</a></li>
              </ul>
              <div class="mobile-menu">
                  <i class="fas fa-bars"></i>
              </div>
          </nav>
      </div>
  </header>

  <section class="page-header">
      <div class="container">
          <h1>Contact Us</h1>
          <p>Get in touch with the MCA Department</p>
      </div>
  </section>

  <section class="contact-info">
      <div class="container">
          <div class="contact-methods">
              <div class="contact-card">
                  <i class="fa-solid fa-user"></i>
                  <h3>Vice - Chancellor</h3>
                  <p>
Davanagere University<br>
Shivagangotri<br>
Davanagere 577 007<br>
Karnataka State<br>
India<br>
<br>
Office : 08192 – 208444<br>
Fax : 08192 – 208008<br>
Email : <a href="mailto:vcdu_dvg@yahoo.in"> vcdu_dvg@yahoo.in</a></p>



          </div>

          <div class="contact-card">
              <i class="fa-solid fa-user"></i>
              <h3>Registrar</h3>
              <p>
                Davanagere University<br>
                Shivagangotri<br>
                Davanagere 577 007<br>
                Karnataka State<br>
                India<br><br>

                Office : 08192 – 208029<br>
                Fax : 08192 – 208008<br>
                Email :<a href="mailto:registrar@davangereuniversity.ac.in"> registrar@davangereuniversity.ac.in</p>



      </div>
    </div></div>
  </section>

  <section class="contact-form-section">
      <div class="container">
          <h2 align="center">Send Us a Message</h2><br>

          <?php if(isset($success)){ ?>
              <p style="color: green; text-align:center;"><?php echo $success; ?></p>
          <?php } elseif(isset($error)){ ?>
              <p style="color: red; text-align:center;"><?php echo $error; ?></p>
          <?php } ?>

          <form class="contact-form" method="POST" action="">
              <div class="form-group">
                  <label for="name">Your Name*</label>
                  <input type="text" id="name" name="name" required>
              </div>
              <div class="form-group">
                  <label for="email">Email Address*</label>
                  <input type="email" id="email" name="email" required>
              </div>
              <div class="form-group">
                  <label for="phone">Phone Number</label>
                  <input type="tel" id="phone" name="phone">
              </div>
              <div class="form-group">
                  <label for="subject">Subject*</label>
                  <select id="subject" name="subject" required>
                      <option value="">Select a subject</option>
                      <option value="admission">Admission Enquiry</option>
                      <option value="academics">Academic Information</option>
                      <option value="placement">Placement Query</option>
                      <option value="feedback">Feedback/Suggestion</option>
                      <option value="other">Other</option>
                  </select>
              </div>
              <div class="form-group">
                  <label for="message">Your Message*</label>
                  <textarea id="message" name="message" rows="5" required></textarea>
              </div>
              <button type="submit" class="btn">Send Message</button>
          </form>
      </div>
  </section>

  <section class="location-map">
      <div class="container">
          <h2>Our Location</h2>
          <div class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3864.594259906903!2d75.9607752!3d14.3928715!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bba3b14203b3791%3A0xf42cd788d9ebd91e!2sDavangere%20University!5e0!3m2!1sen!2sin!4v1757769489838!5m2!1sen!2sin"  width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          </div>
      </div>
  </section>

  <section class="contact-hours">
      <div class="container">
          <h2>Visiting Hours</h2>
          <div class="hours-container">
              <div class="hours-card">
                  <h3>Department Office</h3>
                  <p>Monday to Friday: 9:00 AM - 5:00 PM<br>
                  Saturday: 9:00 AM - 1:00 PM<br>
                  Sunday: Closed</p>
              </div>
              <div class="hours-card">
                  <h3>Library</h3>
                  <p>Monday to Saturday: 8:00 AM - 8:00 PM<br>
                  Sunday: 10:00 AM - 4:00 PM</p>
              </div>
              <div class="hours-card">
                  <h3>Computer Labs</h3>
                  <p>Monday to Saturday: 8:00 AM - 8:00 PM<br>
                  Sunday: Closed</p>
              </div>
          </div>
      </div>
  </section>

  <footer>
      <div class="container">
          <div class="footer-section">
              <h3>Quick Links</h3>
              <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="faculty.php">Faculty</a></li>
                <li><a href="courses.php">Courses</a></li>
                <li><a href="admission.php">Admission</a></li>
                <li><a href="facilities.php">Facilities</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="admin/login.php">Log In</a></li>
              </ul>
          </div>
          <div class="footer-section">
              <h3>Contact Us</h3>
              <p><i class="fas fa-map-marker-alt"></i> Davangere University,Shivagangotri,
Davangere- 577007 Karnataka India</p>
              <p><i class="fas fa-phone"></i>Office : 08192 – 208444</p>
              <p><i class="fas fa-envelope"></i><a href="mailto:vcdu_dvg@yahoo.in"> vcdu_dvg@yahoo.in</a></p>
          </div>

      </div>
      <div class="copyright">
          <p>&copy; 2025 MCA Department, University Name. All Rights Reserved.</p>
      </div>
  </footer>

  <script src="js/script.js"></script>
</body>
</html>
