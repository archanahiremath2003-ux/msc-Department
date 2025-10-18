<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MCA Department | University Name</title>
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
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="faculty.php">Faculty</a></li>
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



    <section class="hero">
        <div class="container">
            <h1>Welcome to Master of Computer Applications (MCA) Department</h1>
            <p>Shaping the future of computing professionals since 2023</p>
            <a href="admission.php" class="btn">Apply Now</a>
        </div>
    </section>

    <section class="about-content">
        <div class="container">
            <div class="about-section">
                <h2>Profile</h2>
                <p>The Department of Computer Science was started in the year 2010 and offers Post-Graduate Degree programs (M.Sc in Computer Science). Master of Computer Applications (MCA) started in the year 2023-24 with 60 intake. The Pedagogy of MCA program has a practice oriented approach to learning while integrating the elements of Theory and Practice. With an advanced level curriculum in the program, the students would be provided the required skillsets necessary to excel in this technology driven business environment. Effective Industry Institute interaction is achieved through Seminars, Workshops and Guest Lectures duly inviting the Experts in the area. This encourages the professional discussion between the students and the participating managers from the industry. This also gives the students a chance to envisage their roles in the industry before hand. Enhancing the knowledge of the students by interacting with the Industry skills, and their leadership qualities.

            </div>
        </div></section>

    <section class="highlights">
        <div class="container">
            <div class="highlight-card">
                <i class="fas fa-graduation-cap"></i>
                <h3>AICTE </h3>
                <p>A+ Grade Accreditation</p>
            </div>
            <div class="highlight-card">
                <i class="fas fa-laptop-code"></i>
                <h3>Modern Labs</h3>
                <p>State-of-the-art computing facilities</p>
            </div>
            <div class="highlight-card">
                <i class="fas fa-briefcase"></i>
                <h3>Placements</h3>
                <p>100% Placement Record</p>
            </div>
            <div class="highlight-card">
                <i class="fas fa-chalkboard-teacher"></i>
                <h3>Expert Faculty</h3>
                <p>Highly qualified teaching staff</p>
            </div>
        </div>
    </section>

    <?php include 'config.php'; ?>
    <section class="news">
        <div class="container">
            <h2>Latest News & Updates</h2>
            <div class="news-container">
                <div class="news-items">
                    <?php
                    $query = "SELECT * FROM notices ORDER BY created_at DESC limit 5";
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="news-item">';
                            echo '<h3>' . htmlspecialchars($row['title']) . '</h3>';
                            echo '<p class="date">' . date("F d, Y", strtotime($row['created_at'])) . '</p>';
                            echo '<p>' . htmlspecialchars($row['description']) . '</p>';
                            echo '</div>';
                        }
                    } else {
                        echo "<p>No news or updates available at the moment.</p>";
                    }
                    ?>
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
