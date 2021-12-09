<!-- Variable for linking stylesheet -->
<?php $PAGE_NAME = "course"?>

<?php require "../php-snippets/top_template.php"; ?>
<?php if (!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"]) {header("Location: ../pages/login.php");} ?>
    <main id="main">
        <div id="wrap-page">
            <div id="title-container">
                <?php

                include_once '../php-scripts/connect_to_database.php';
                include_once '../php-scripts/numberConverter.php';

                $query = "SELECT Name, Rating, Clicks FROM Course LIMIT 1;";

                if (!$result = mysqli_query($conn, $query))
                {
                    echo "Error"; # CDL=> Should handle errors better
                }
                else
                {
                    $course_row = $result->fetch_assoc();
                    
                    echo "<h1 id='title'>".$course_row["Name"]."</h1>";

                    echo "<div id='course-info'>";
                    # Stars!
                    echo "<a href='review.php?item=Course&name=".$course_row["Name"]."'>";
                    $i = 0;
                    while ($i < $course_row["Rating"])
                    {
                        echo "<span class='fa fa-star checked'></span>";
                        ++$i;
                    }
                    while ($i < 5)
                    {
                        echo "<span class='fa fa-star'></span>";
                        ++$i;
                    }
                    echo "</a>";

                    // Project Clicks
                    echo "<p id='clicks'>".thousandsCurrencyFormat($course_row["Clicks"])."</p>";
                    echo "</div>";
                }
                ?>
            </div>

            <div id="summary">
                <h2>Course Description</h2>
                <p class="courseDescription">
                    Students will participate in managing and executing the process of carrying a significant software 
                    development effort from a conceptual idea of new features through integration and testing of the entire 
                    feature working on an existed product. This will require them to independently: 
                </p>
                    <ol type="a">
                        <li>Investigate appropriate technologies</li>
                        <li>Indentify relevant risk factors</li>
                        <li>Address issues associated with software quality assurance</li>
                    </ol>
                <p class="courseDescription">
                    Students will produce appropriate documentation of system requirements and design, testing efforts and user 
                    interfaces; Students will demonstrate an ability to evaluate the suitability of available technology for use in 
                    development of the product; Students will gain experience with issues encountered in maintenance of software systems; 
                    Students will be aware of the social and ethical issues of concern to software engineers and the impact of software
                    engineering solutions on modern society; Students will be able to function as an effective member of a team of
                    professionals; Students will gain experience independently learning new technology.
                </p>
            </div>
            <div id="syllabus-container">
                <h2>Syllabus</h2>
                <h3>Instructor Contact Information</h3>
                <p class="section">
                    Name: Yu Liu<br>
                    Office Address: CAMP 166<br>
                    Phone Number: (315)268-6510<br>
                    Email Address: yuliu@clarkson.edu<br>
                    Student Hours: Appointment by Email at anytime<br>
                    <ul>
                        <li>Will be virtually via Zoom in Spring 2021.</li>
                    </ul>
                </p>
                
                <h3>Instructor Participation</h3>
                <p class="section">
                    During this course, as your instructor, you can expect me to<br>

                    <ul>
                        <li>Respond to emails and voicemails within 12 hours</li>
                        <li>Grade activities and assessments within 7 days</li>
                        <li>Be an active participant on the discussion board</li>
                    </ul>
                </p>
                
                <h3>Delivery Method</h3>
                <p class="section">    
                    <b>Online: Synchronous Online by Zoom (<a class="link" href="https://clarkson.zoom.us/j/8464946103">https://clarkson.zoom.us/j/8464946103</a>) (Note: few students have 
                    schedule conflicting with other courses due to the COVID-19 measures in campus and they have the permission 
                    to attend this course in async mode. Their presentation can be recorded and played by the team leader.)</b><br><br>
                </p>

                <h3>Instructional Materials</h3>
                <p class="section">
                    <b>Textbook(s)</b><br>
                    <ul>
                        <li>Software Engineering: The Current Practice, Vaclav Rajlich, CRC Press</li>
                    </ul>
                </p>
                
                <h3>Technology</h3>
                <p class="section">
                    <ul>
                        <li><a class="link" href="https://confluence.clarkson.edu/display/OITKB/Technology+recommendations+for+Distance+and+Online+Learning">Computer System & Software Requirements</a></li>
                        <li><a class="link" href="https://confluence.clarkson.edu/display/OITKB/Accessibility+Statements">Software Accessibility Policies</a> in general</li>
                        <li><a class="link" href="https://confluence.clarkson.edu/display/OITKB/Privacy+Policies">Software Privacy Policies</a> in general</li>
                        <li>Specific Course Software Policies</li>
                    </ul>
                </p>
                
                <h4 style="margin-left: 3ch;">Minimum Technology Skills</h4>
                <p class="section" style="margin-left: 3ch;">
                    <ul>
                        <li>Use a learning management system</li>
                        <li>Program in the C language</li>
                        <li>Use the Linux Operation System</li>
                    </ul>
                </p>

                <h3>Course Outcomes (CO)</h3>
                <p class="section">
                    CO1: Explain the concepts of the software maintenance process and techniques.<br>
                    CO2: Be familiar with the software maintenance process through the practice in the course project.<br>
                    CO3: Improve the capability of teamwork, problem solving, risk analysis, etc.<br><br>
                </p>

                <h3>Course Success</h3>
                <p class="section">
                    Upon success of finishing this course, all assignments need to be submitted on time and requesting help 
                    from the instructor if needed.<br><br>
                </p>

                <h3>Course Policies<br></h3>
                <div style="margin: 10px 0 0 3ch;">
                    <h4>Etiquette Expectations & Learner Interaction</h4>
                    <p class="section">
                        Educational institutions promote the advance of knowledge through positive and constructive debate–both 
                        inside and outside the classroom. Please visit and follow: <a class="link" href="https://intranet.clarkson.edu/administrative/tlc/learner-support/netiquette-and-electronic-learner-interaction-guidelines/">Netiquette and Electronic Learner Interaction Guidelines.</a> <br>
                    </p>

                    <h4>Late Work</h4>
                    <p class="section">
                        Late submission will not be graded unless the instructor has been notified with an acceptable reason.<br>
                    </p>

                    <h4>Attendance</h4>
                    <p class="section">
                        Attendance is important to the success of participating this course. An acceptable reason needs to be emailed 
                        to the instructor if you will be absent from the class. Maximum 5 points penalty may be applied through the attendance 
                        checking in the semester.<br>
                    </p>

                    <h4>Recorded Lectures</h4>
                    <p class="section">
                        Regular lectures and presentations will be recorded, and recorded lectures will be uploaded to the moodle
                        for your access. Others will NOT be recorded.<br><br>
                    </p>
                </div>
                

                <h3>Academic Unit Information/Policies</h3>
                <p class="section">
                    Department of Electrical and Computer Engineering, Department Office, CAMP 156<br><br>
                </p>

                <h3>Institutional Policies</h3><br>
                <h4><a class="link" href="https://www.clarkson.edu/student-administrative-services-sas/clarkson-regulations">Institutional Policies & Regulations</a></h4><br>
                <h4>Academic Integrity</h4>
                <p class="section">
                    Academic Integrity, based on the values of honesty, trust, fairness, respect, and 
                    responsibility, is a fundamental principle of scholarship in higher education. Clarkson’s Academic 
                    Integrity Policy prohibits: plagiarism (using another person’s writing or copying any work without 
                    proper citation), falsification, unauthorized collaboration during a test or on an assignment, or substitution 
                    for another student to take an exam, course or test, and other forms of academic dishonesty.<br>
                    If you are to benefit from this class and be properly evaluated for your contributions, it is important
                    for you to be familiar with and follow Clarkson University’s Academic Integrity policy. Please review this 
                    policy online (<a class="link" href="https://www.clarkson.edu/student-administrative-services-sas/clarkson-regulations">Undergraduate section IV – Academic Integrity</a>
                    , <a class="link" href="https://www.clarkson.edu/sites/default/files/2020-03/Graduate-Student-Regs_19-20.pdf">Graduate section IV – Academic Integrity</a> ). 
                    <b>Work that violates this policy will not be tolerated.</b> Students who are found responsible for a violation of the Academic Integrity 
                    Policy will have both a university process sanction and an academic outcome, that could include a failing grade on the assignment or exam, 
                    or a failing grade for the course.<br>
                    Please refer to <b>Clarkson Library’s <a class="link" href="https://sites.clarkson.edu/library/plagiarism/">Guide to Plagiarism**</a></b>
                    and the <a class="link" href="https://sites.clarkson.edu/library/citing-sources/">**guide to Citing Sources**</a> for assistance on avoiding 
                    plagiarism and properly citing sources.<br>
                </p><br>

                <h4>Students with Disabilities Requesting Accommodation(s)</h4>
                <p class="section">
                    The University strives to make all facilities and programs accessible to students with permanent, ongoing, and 
                    temporary disabilities by providing appropriate and reasonable academic accommodations, as necessary. Disabilities that 
                    may benefit from reasonable accommodations include, but are not limited to, broken wrist, ADHD, surgery recovery, Learning 
                    Disability, concussion, visual impairment, etc. For more information and/or to request accommodations, contact the Office of 
                    Accessibility Services at oas@clarkson.edu or 315-268-7643.<br>
                    <a class="link" href="https://www.clarkson.edu/policies-and-laws">Students with Disabilities Policy</a> > <a class="link" href="https://www.clarkson.edu/accessibility-services">Office of Accessibility Services Website</a> <br><br>
                </p>

                <h3>Other Policies of Note:<br><br> Student Regulation Requirements for Excused and Extended Absence </h3>
                <p class="section" style="margin-left: 3ch;">
                    <a class="link" href="https://www.clarkson.edu/student-administrative-services-sas/clarkson-regulations">Undergraduate: III-F. Attendance</a> > <a class="link" href="https://www.clarkson.edu/student-administrative-services-sas/clarkson-regulations">Graduate – II-F. Attendance</a> <br>
                    <a class="link" href="https://intranet.clarkson.edu/student-life/sas/grading-system/">Grading System</a><br>
                    <a class="link" href="https://www.clarkson.edu/diversity-and-inclusion-policies">Discrimination & Harassment</a><br>
                    <a class="link" href="https://www.clarkson.edu/diversity-and-inclusion-policies">Religious Accommodations</a><br><br>
                </p>
            </div>

            <div id="lecture-container">
                <h2>Lectures</h2>
                <p id="lecture">
                    <ul>
                        <li><a class="link" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">L01</a> </li>
                        <li><a class="link" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">L02</a> </li>
                        <li><a class="link" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">L03</a></li>
                        <li> <a class="link" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">L04</a></li>
                        <li> <a class="link" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">L05</a> </li>
                        <li><a class="link" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">L06</a> </li>
                        <li><a class="link" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">L07</a> </li>
                        <li><a class="link" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">L08</a></li>
                        <li><a class="link" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">L09</a></li>
                        <li><a class="link" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">L10</a> </li>
                        <li><a class="link" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">L11</a> </li>
                        <li><a class="link" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">L12</a> </li>
                        <li><a class="link" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">L13</a> </li>
                    </ul>
                </p>
            </div>

            <div id="assignment-container">
                <h2>Assignments</h2>
                <p id="assignment">
                    <ol type="1">
                        <li><a class="link" href="project.php?project=Xfig">Xfig Architecture Diagrams</a></li>
                        <li><a class="link" href="project.php?project=Xfig">Requirement Book</a></li>
                        <li><a class="link" href="project.php?project=Xfig">Design (Concept Location & Impact Analysis)</a></li>
                        <li><a class="link" href="project.php?project=Xfig">Test Cases & Test Results</a></li>
                        <li><a class="link" href="project.php?project=Xfig">Code Inspection </a></li>
                        <li><a class="link" href="project.php?project=Xfig">Features</a></li>
                    </ol>
                </p>
            </div>
        </div>
        <div class="sidenav">
                <a class="link" id="logo-link" href="../index.php"><img id="logo" src="../images/NSF_logo.png" alt="logo"></a>
                <a class="link" href="#title" id="course-title">Course Title</a>
                <a class="link" href="#summary">Course Description</a>
                <a class="link" href="#syllabus-container">Syllabus</a>
                <a class="link" href="#lecture-container">Lectures</a>
                <a class="link" href="#assignment-container">Assignments</a>
        </div>
    </main>
<?php require "../php-snippets/bottom_template.php"; ?>