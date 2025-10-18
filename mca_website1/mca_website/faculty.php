<?php
session_start();
include 'config.php';

$faculty_list = mysqli_query($conn, "SELECT * FROM faculty ORDER BY name ASC");
$logged_in_user_id = $_SESSION['faculty_id'] ?? null;
$role = $_SESSION['role'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Faculty | MCA Department</title>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
    .faculty-card {
        border: 1px solid #ccc;
        padding: 10px;
        margin: 10px;
        width: 250px;
        display: inline-block;
        vertical-align: top;
        text-align: center;
    }
    .faculty-card img {
        width: 100px;
        height: auto;
        margin-bottom: 10px;
    }
    .faculty-details {
        margin-left: auto;
        margin-right: auto;
        width: 50%;
    }
</style>
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
                <li class="active"><a href="faculty.php">Faculty</a></li>
                <li><a href="courses.php">Courses</a></li>
                <li><a href="admission.php">Admission</a></li>
                <li><a href="facilities.php">Facilities</a></li>
                <li><a href="contact.php">Contact</a></li>
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
        <h1>Our Faculty</h1>
        <p>Meet our experienced and dedicated faculty members</p>
    </div>
</section>

<div class="faculty-details">
<?php while($row = mysqli_fetch_assoc($faculty_list)) { ?>
<div class="faculty-card">
  <?php if(!empty($row['photo'])) { ?>
  <img src="images/faculty/<?php echo $row['photo']; ?>" alt="<?php echo htmlspecialchars($row['name']); ?>">
<?php } else { ?>
  <img src="images/photo.jpg" alt="No Photo">
<?php } ?>


    <h3><?php echo htmlspecialchars($row['name']); ?></h3>
    <p><?php echo htmlspecialchars($row['designation']); ?></p>
    <p><?php echo htmlspecialchars($row['qualification']); ?></p>
    <a href="faculty_details.php?id=<?php echo $row['id']; ?>" target="_blank">Know More</a><br>

  <!--  <?php if($role=='faculty' && $logged_in_user_id == $row['id']) { ?>
        <a href="admin/dashboard.php?edit_faculty=<?php echo $row['id']; ?>" target="_blank">Edit My Profile</a>
    <?php } ?> -->
</div>
<?php } ?>
</div>

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
            <p><i class="fas fa-map-marker-alt"></i> Davangere University, Shivagangotri, Davangere-577007 Karnataka India</p>
            <p><i class="fas fa-phone"></i>Office : 08192 – 208444</p>
            <p><i class="fas fa-envelope"></i><a href="mailto:vcdu_dvg@yahoo.in"> vcdu_dvg@yahoo.in</a></p>
        </div>
    </div>
    <div class="copyright">
        <p>&copy; 2025 MCA Department, University Name. All Rights Reserved.</p>
    </div>
</footer>

</body>
</html>
