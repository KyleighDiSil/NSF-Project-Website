<!-- Variable for linking stylesheet -->
<?php $PAGE_NAME = "course"?>

<?php require "../php-snippets/top_template.php"; ?>
<?php if (!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"]) {header("Location: ../pages/login.php");} ?>
    <main id="main">
        <div id="wrap-page">
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
                    echo "<a id='link' href='review.php?item=Course&name=".$course_row["Name"]."'>";
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
            <div id="courseContent">
                <h2>Course Description</h2>
                <p id="courseDescription">
                    Students will participate in managing and executing the process of carrying a significant software 
                    development effort from a conceptual idea of new features through integration and testing of the entire 
                    feature working on an existed product. This will require them to independently: (a). investigate appropriate 
                    technologies, (b). identify relevant risk factors, (c). address issues associated with software quality assurance;
                    Students will produce appropriate documentation of system requirements and design, testing efforts and user 
                    interfaces; Students will demonstrate an ability to evaluate the suitability of available technology for use in 
                    development of the product; Students will gain experience with issues encountered in maintenance of software systems; 
                    Students will be aware of the social and ethical issues of concern to software engineers and the impact of software
                    engineering solutions on modern society; Students will be able to function as an effective member of a team of
                    professionals; Students will gain experience independently learning new technology.
                </p>
                <h2>Syllabus</h2>
                <p id="syllabus">
                    <b>Instructor Contact Information</b><br>
                    Name: Yu Liu<br>
                    Office Address: CAMP 166<br>
                    Phone Number: (315)268-6510<br>
                    Email Address: yuliu@clarkson.edu<br>
                    Student Hours: Appointment by Email at anytime<br>
                    Will be virtually via Zoom in Spring 2021.<br><br>

                    <b>Instructor Participation</b><br>
                    During this course, as your instructor, you can expect me to<br>
                    Respond to emails and voicemails within 12 hours<br>
                    Grade activities and assessments within 7 days<br>
                    Be an active participant on the discussion board<br><br>

                    <b>Delivery Method</b><br>
                    Online: Synchronous Online by Zoom (https://clarkson.zoom.us/j/8464946103) (Note: few students have 
                    schedule conflicting with other courses due to the COVID-19 measures in campus and they have the permission 
                    to attend this course in async mode. Their presentation can be recorded and played by the team leader.)<br><br>

                    <b>Instructional Materials</b><br>
                    Textbook(s)<br>
                    Software Engineering: The Current Practice, Vaclav Rajlich, CRC Press<br><br>
                
                    <b>Technology</b><br>
                    <a href="https://confluence.clarkson.edu/display/OITKB/Technology+recommendations+for+Distance+and+Online+Learning">Computer System & Software Requirements</a> <br>
                    <a href="https://confluence.clarkson.edu/display/OITKB/Accessibility+Statements">Software Accessibility Policies</a> in general <br>
                    <a href="https://confluence.clarkson.edu/display/OITKB/Privacy+Policies">Software Privacy Policies</a> in general <br>
                    Specific Course Software Policies <br>
                    <b>Minimum Technology Skills</b><br>
                    Use a learning management system <br>
                    Program in the C language <br>
                    Use the Linux Operation System <br><br>

                    <b>Course Outcomes (CO)</b><br>
                    CO1: Explain the concepts of the software maintenance process and techniques.<br>
                    CO2: Be familiar with the software maintenance process through the practice in the course project.<br>
                    CO3: Improve the capability of teamwork, problem solving, risk analysis, etc.<br><br>

                    <b>Course Success</b><br>
                    Upon success of finishing this course, all assignments need to be submitted on time and requesting help 
                    from the instructor if needed.<br><br>

                    <b>Course Policies</b><br>
                    <b>Etiquette Expectations & Learner Interaction</b><br>
                    Educational institutions promote the advance of knowledge through positive and constructive debate–both 
                    inside and outside the classroom. Please visit and follow: <a href="https://intranet.clarkson.edu/administrative/tlc/learner-support/netiquette-and-electronic-learner-interaction-guidelines/">Netiquette and Electronic Learner Interaction Guidelines.</a> <br>
                    <b>Late Work</b><br>
                    Late submission will not be graded unless the instructor has been notified with an acceptable reason.<br>
                    <b>Attendance</b><br>
                    Attendance is important to the success of participating this course. An acceptable reason needs to be emailed 
                    to the instructor if you will be absent from the class. Maximum 5 points penalty may be applied through the attendance 
                    checking in the semester.<br>
                    <b>Recorded Lectures</b><br>
                    Regular lectures and presentations will be recorded, and recorded lectures will be uploaded to the moodle
                    for your access. Others will NOT be recorded.<br><br>

                    <b>Academic Unit Information/Policies</b><br>
                    Department of Electrical and Computer Engineering, Department Office, CAMP 156<br><br>

                    <b>Institutional Policies</b><br>
                    <b> <a href="https://www.clarkson.edu/student-administrative-services-sas/clarkson-regulations">Institutional Policies & Regulations</a> </b><br>
                    <b>Academic Integrity</b><br>
                    Academic Integrity, based on the values of honesty, trust, fairness, respect, and 
                    responsibility, is a fundamental principle of scholarship in higher education. Clarkson’s Academic 
                    Integrity Policy prohibits: plagiarism (using another person’s writing or copying any work without 
                    proper citation), falsification, unauthorized collaboration during a test or on an assignment, or substitution 
                    for another student to take an exam, course or test, and other forms of academic dishonesty.<br>
                    If you are to benefit from this class and be properly evaluated for your contributions, it is important
                    for you to be familiar with and follow Clarkson University’s Academic Integrity policy. Please review this 
                    policy online (<a href="https://www.clarkson.edu/student-administrative-services-sas/clarkson-regulations">Undergraduate section IV – Academic Integrity</a>
                    , <a href="https://www.clarkson.edu/sites/default/files/2020-03/Graduate-Student-Regs_19-20.pdf">Graduate section IV – Academic Integrity</a> ). 
                    <b>Work that violates this policy will not be tolerated.</b> Students who are found responsible for a violation of the Academic Integrity 
                    Policy will have both a university process sanction and an academic outcome, that could include a failing grade on the assignment or exam, 
                    or a failing grade for the course.<br>
                    Please refer to <b>Clarkson Library’s <a href="https://sites.clarkson.edu/library/plagiarism/">Guide to Plagiarism**</a></b>
                    and the <a href="https://sites.clarkson.edu/library/citing-sources/">**guide to Citing Sources**</a> for assistance on avoiding 
                    plagiarism and properly citing sources.<br>
                    <b>Students with Disabilities Requesting Accommodation(s)</b><br>
                    The University strives to make all facilities and programs accessible to students with permanent, ongoing, and 
                    temporary disabilities by providing appropriate and reasonable academic accommodations, as necessary. Disabilities that 
                    may benefit from reasonable accommodations include, but are not limited to, broken wrist, ADHD, surgery recovery, Learning 
                    Disability, concussion, visual impairment, etc. For more information and/or to request accommodations, contact the Office of 
                    Accessibility Services at oas@clarkson.edu or 315-268-7643.<br>
                    <a href="https://www.clarkson.edu/policies-and-laws">Students with Disabilities Policy</a> > <a href="https://www.clarkson.edu/accessibility-services">Office of Accessibility Services Website</a> <br><br>

                    <b>Other Policies of Note:</b><br>
                    <b>Student Regulation Requirements for Excused and Extended Absence </b><br>
                    <a href="https://www.clarkson.edu/student-administrative-services-sas/clarkson-regulations">Undergraduate: III-F. Attendance</a> > <a href="https://www.clarkson.edu/student-administrative-services-sas/clarkson-regulations">Graduate – II-F. Attendance</a> <br>
                    <a href="https://intranet.clarkson.edu/student-life/sas/grading-system/">Grading System</a><br>
                    <a href="https://www.clarkson.edu/diversity-and-inclusion-policies">Discrimination & Harassment</a><br>
                    <a href="https://www.clarkson.edu/diversity-and-inclusion-policies">Religious Accommodations</a><br><br>
                </p>

                <h2>Lectures</h2>
                <p id="lecture">
                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">L01</a> <br>
                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">L02</a> <br>
                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">L03</a> <br>
                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">L04</a> <br>
                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">L05</a> <br>
                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">L06</a> <br>
                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">L07</a> <br>
                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">L08</a> <br>
                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">L09</a> <br>
                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">L10</a> <br>
                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">L11</a> <br>
                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">L12</a> <br>
                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">L13</a> <br>
                </p>

                <h2>Assignments</h2>
                <p id="assignment">
                    1 - <a href="project.php?project=Xfig">Xfig Architecture Diagrams</a> <br>
                    2 - <a href="project.php?project=Xfig">Requirement Book</a> <br>
                    3 - <a href="project.php?project=Xfig">Design (Concept Location & Impact Analysis)</a> <br>
                    4 - <a href="project.php?project=Xfig">Test Cases & Test Results</a> <br>
                    5 - <a href="project.php?project=Xfig">Code Inspection </a> <br>
                    6 - <a href="project.php?project=Xfig">Features</a> <br>
                </p>
            </div>
        </div>
        <div class="sidenav">
                <a href="../index.php"><img id="logo" src="../images/NSF_logo.png" alt="logo"></a>
                <a href="#courseTitle" id="course-title">Course Title</a>
                <a href="#courseDescription">Course Description</a>
                <a href="#syllabus">Syllabus</a>
                <a href="#lecture">Lectures</a>
                <a href="#assignment">Assignments</a>
        </div>
    </main>
<?php require "../php-snippets/bottom_template.php"; ?>