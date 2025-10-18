<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses | MCA Department</title>
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
                  <li class="active"><a href="courses.php">Courses</a></li>
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
            <h1>Course Curriculum</h1>
            <p>Comprehensive two year program</p>
        </div>
    </section>

    <section class="program-overview">
        <div class="container">
            <h2>Program Overview</h2>
            <p>To promote an excellent academic and research environment for innovation and development of software through sustainable technical education.</p>

            <div class="program-details">
                <div class="detail-card">
                    <i class="fas fa-clock"></i>
                    <h3>Duration</h3>
                    <p>2 Years (4 Semesters)</p>
                </div>

                <div class="detail-card">
                    <i class="fas fa-user-graduate"></i>
                    <h3>Intake Capacity</h3>
                    <p>60 Students</p>
                </div>
                <!--<div class="detail-card">
                    <i class="fas fa-calendar-alt"></i>
                    <h3>Academic Calendar</h3>
                    <p>July to May (Annual System)</p>
                </div>-->
            </div>
        </div>
    </section>

    <section class="course-structure">
        <div class="container">
            <h2>Course Structure</h2>

            <div class="semester-tabs">
                <button class="tab-btn active" onclick="openSemester('sem1')">Semester 1</button>
                <button class="tab-btn" onclick="openSemester('sem2')">Semester 2</button>
                <button class="tab-btn" onclick="openSemester('sem3')">Semester 3</button>
                <button class="tab-btn" onclick="openSemester('sem4')">Semester 4</button>

            </div>

            <div id="sem1" class="semester-content active">
                <h3>First Semester Courses</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Course Code</th>
                            <th>Course Name</th>
                            <th>Credits</th>
                            <th>Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>23MCA101</td>
                            <td>Data Structures and Algorithms</td>
                            <td>4</td>
                            <td>Core</td>
                        </tr>
                        <tr>
                            <td>23MCA102</td>
                            <td>Object-Oriented Programming with C++</td>
                            <td>4</td>
                            <td>Core</td>
                        </tr>
                        <tr>
                            <td>23MCA103</td>
                            <td>Operating Systems </td>
                            <td>4</td>
                            <td>Core</td>
                        </tr>
                        <tr>
                            <td>23MCA104</td>
                            <td>Database Management Systems</td>
                            <td>4</td>
                            <td>Core</td>
                        </tr>
                        <tr>
                            <td>23MCABC1</td>
                            <td>Fundamentals of Information Technology(Non-Computer Science Students)</td>
                            <td>2</td>
                            <td>Bridge Course</td>
                        </tr>
                        <tr>
                            <td>23MCABC2</td>
                            <td>Accountancy and Financial Management (Computer Science Students)</td>
                            <td>2</td>
                            <td>Bridge Course</td>
                        </tr>
                        <tr>
                            <td>23MCAL11</td>
                            <td>Data Structures and Algorithms Using C++ Lab</td>
                            <td>2</td>
                            <td>Practical</td>
                        </tr>
                        <tr>
                            <td>23MCAL12</td>
                            <td>DBMS Lab</td>
                            <td>2</td>
                            <td>Practical</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="sem2" class="semester-content">
                <h3>Second Semester Courses</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Course Code</th>
                            <th>Course Name</th>
                            <th>Credits</th>
                            <th>Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>23MCA201</td>
                            <td>Data Communication and Computer Networks</td>
                            <td>4</td>
                            <td>Core</td>
                        </tr>
                        <tr>
                            <td>23MCA202</td>
                            <td>Digital Image Processing</td>
                            <td>4</td>
                            <td>Core</td>
                        </tr>
                        <tr>
                            <td>23MCA203</td>
                            <td>Advanced Java Programming</td>
                            <td>4</td>
                            <td>Core</td>
                        </tr>
                        <tr>
                            <td>23MCA204</td>
                            <td>Web Programming</td>
                            <td>4</td>
                            <td>Core</td>
                        </tr>
                        <tr>
                            <td>23MCAL21</td>
                            <td>Advanced Java and Networking Lab</td>
                            <td>2</td>
                            <td>Practical</td>
                        </tr>
                        <tr>
                            <td>23MCAL22</td>
                            <td>Web Programming Lab</td>
                            <td>2</td>
                            <td>Practical</td>
                        </tr>
                    </tbody>
                </table>
            </div>


            <div id="sem3" class="semester-content">
                <h3>Third Semester Courses</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Course Code</th>
                            <th>Course Name</th>
                            <th>Credits</th>
                            <th>Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>23MCA301</td>
                            <td>Python Programming</td>
                            <td>4</td>
                            <td>Core</td>
                        </tr>
                        <tr>
                            <td>23MCA302</td>
                            <td>Machine Learning </td>
                            <td>4</td>
                            <td>Core</td>
                        </tr>
                        <tr>
                            <td>23MCA303</td>
                            <td>Big Data Analytics </td>
                            <td>4</td>
                            <td>Core</td>
                        </tr>
                        <tr>
                            <td>23MCA304</td>
                            <td>Software Engineering</td>
                            <td>4</td>
                            <td>Core</td>
                        </tr>
                        <tr>
                            <td>23MCAL31</td>
                            <td>Machine Learning using Python Lab</td>
                            <td>2</td>
                            <td>Practical</td>
                        </tr>
                        <tr>
                            <td>23MCAL32</td>
                            <td>Big Data Analytics Lab </td>
                            <td>2</td>
                            <td>Practical</td>
                        </tr>
                    </tbody>
                </table>
            </div>



            <div id="sem4" class="semester-content">
                <h3>Fourth Semester Courses</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Course Code</th>
                            <th>Course Name</th>
                            <th>Credits</th>
                            <th>Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>23MCA401</td>
                            <td>Major Project work</td>
                            <td>16</td>
                            <td>Project</td>
                        </tr>
                        <tr>
                            <td>23MCA403</td>
                            <td>Seminar</td>
                            <td>2</td>
                            <td>Seminar</td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <!-- Similar structure for semesters 3-6 -->

            <div class="electives-section">
                <h2>Open Elective Courses</h2>


                <div class="elective-streams">
                    <div class="stream">
                        <h3>First Semester OE-Courses</h3>
                        <ul>
                            <li>Cyber Security and Digital Forensics</li>
                            <li>Embedded Systems </li>
                            <li>E-commerce and E-governance</li>
                            <li>Cloud Computing</li>
                            <li>Discrete Mathematics and Graph Theory</li>
                        </ul>
                    </div>
                    <div class="stream">
                        <h3>Second Semester OE-Courses</h3>
                        <ul>
                            <li>Internet of Things </li>
                            <li>Artificial Intelligence </li>
                            <li>Applied Cryptography and Network Security</li>
                            <li>Data Mining and Data Warehousing</li>
                            <li>Design Thinking</li>
                            <li>Bio-Informatics</li>
                            <li>Theory of Computation</li>
                        </ul>
                    </div>
                    <div class="stream">
                        <h3>Third Semester OE-Courses</h3>
                        <ul>
                            <li>MEAN and MERN Web Development</li>
                            <li>Block chain Technology</li>
                            <li>Mobile Application Design and Development </li>
                            <li>DevOps </li>
                            <li>Introduction to NLP and chatGPT</li>
                            <li>Hyper Automation </li>
                            <li>Research Methodology </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="syllabus-download">
        <div class="container">
            <h2>Detailed Syllabus</h2>
            <p>Download the complete syllabus document for detailed information about each course:</p>
            <a href="docs/mca-syllabus.pdf" class="btn" download><i class="fas fa-download"></i> Download Syllabus (PDF)</a>
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
    <script>
        function openSemester(semesterId) {
            // Hide all semester contents
            const contents = document.getElementsByClassName('semester-content');
            for (let i = 0; i < contents.length; i++) {
                contents[i].classList.remove('active');
            }

            // Deactivate all tabs
            const tabs = document.getElementsByClassName('tab-btn');
            for (let i = 0; i < tabs.length; i++) {
                tabs[i].classList.remove('active');
            }

            // Activate the selected tab and content
            document.getElementById(semesterId).classList.add('active');
            event.currentTarget.classList.add('active');
        }
    </script>
</body>
</html>
