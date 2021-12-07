<!-- Variable for linking stylesheet -->
<?php $PAGE_NAME = "course"?>

<?php require "../php-snippets/top_template.php"; ?>
<?php if (!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"]) {header("Location: ../pages/home.php");} ?>
    <main id="main">
        <h1 id="courseTitle">EE368: Software Engineering</h1>
        <div id="rating">
            <span class='fa fa-star checked' style="color:orange"></span>
            <span class='fa fa-star checked' style="color:orange"></span>
            <span class='fa fa-star checked' style="color:orange"></span>
            <span class='fa fa-star checked' style="color:orange"></span>
            <span class='fa fa-star'></span>
        </div>
                <div id="courseContent">
                    <h2>Course Description</h2>
                    <p id="courseDescription">
                        &ensp;Students will participate in managing and executing the process of carrying a significant software 
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
                        <b>&ensp;Instructor Contact Information</b><br>
                        &ensp;Name: Yu Liu<br>
                        &ensp;Office Address: CAMP 166<br>
                        &ensp;Phone Number: (315)268-6510<br>
                        &ensp;Email Address: yuliu@clarkson.edu<br>
                        &ensp;Student Hours: Appointment by Email at anytime<br>
                        &ensp;Will be virtually via Zoom in Spring 2021.<br><br>

                        <b>&ensp;Instructor Participation</b><br>
                        &ensp;During this course, as your instructor, you can expect me to<br>
                        &ensp;Respond to emails and voicemails within 12 hours<br>
                        &ensp;Grade activities and assessments within 7 days<br>
                        &ensp;Be an active participant on the discussion board<br><br>

                        <b>&ensp;Delivery Method</b><br>
                        &ensp;Online: Synchronous Online by Zoom (https://clarkson.zoom.us/j/8464946103) (Note: few students have 
                        schedule conflicting with other courses due to the COVID-19 measures in campus and they have the permission 
                        to attend this course in async mode. Their presentation can be recorded and played by the team leader.)<br><br>

                        <b>&ensp;Instructional Materials</b><br>
                        &ensp;Textbook(s)<br>
                        &ensp;Software Engineering: The Current Practice, Vaclav Rajlich, CRC Press<br><br>
                    
                        <b>&ensp;Technology</b><br>
                        &ensp;<a href="https://confluence.clarkson.edu/display/OITKB/Technology+recommendations+for+Distance+and+Online+Learning">Computer System & Software Requirements</a> <br>
                        &ensp;<a href="https://confluence.clarkson.edu/display/OITKB/Accessibility+Statements">Software Accessibility Policies</a> in general <br>
                        &ensp;<a href="https://confluence.clarkson.edu/display/OITKB/Privacy+Policies">Software Privacy Policies</a> in general <br>
                        &ensp;Specific Course Software Policies <br>
                        <b>&ensp;Minimum Technology Skills</b><br>
                        &ensp;Use a learning management system <br>
                        &ensp;Program in the C language <br>
                        &ensp;Use the Linux Operation System <br><br>

                        <b>&ensp;Course Outcomes (CO)</b><br>
                        &ensp;CO1: Explain the concepts of the software maintenance process and techniques.<br>
                        &ensp;CO2: Be familiar with the software maintenance process through the practice in the course project.<br>
                        &ensp;CO3: Improve the capability of teamwork, problem solving, risk analysis, etc.<br><br>

                        <b>&ensp;Course Success</b><br>
                        &ensp;Upon success of finishing this course, all assignments need to be submitted on time and requesting help 
                        from the instructor if needed.<br><br>

                        <b>&ensp;Course Policies</b><br>
                        <b>&ensp;Etiquette Expectations & Learner Interaction</b><br>
                        &ensp; Educational institutions promote the advance of knowledge through positive and constructive debate–both 
                        inside and outside the classroom. Please visit and follow: <a href="https://intranet.clarkson.edu/administrative/tlc/learner-support/netiquette-and-electronic-learner-interaction-guidelines/">Netiquette and Electronic Learner Interaction Guidelines.</a> <br>
                        <b>&ensp;Late Work</b><br>
                        &ensp;Late submission will not be graded unless the instructor has been notified with an acceptable reason.<br>
                        <b>&ensp;Attendance</b><br>
                        &ensp;Attendance is important to the success of participating this course. An acceptable reason needs to be emailed 
                        to the instructor if you will be absent from the class. Maximum 5 points penalty may be applied through the attendance 
                        checking in the semester.<br>
                        <b>&ensp;Recorded Lectures</b><br>
                        &ensp;Regular lectures and presentations will be recorded, and recorded lectures will be uploaded to the moodle
                         for your access. Others will NOT be recorded.<br><br>

                        <b>&ensp;Academic Unit Information/Policies</b><br>
                        &ensp;Department of Electrical and Computer Engineering, Department Office, CAMP 156<br><br>

                        <b>&ensp;Institutional Policies</b><br>
                        <b>&ensp; <a href="https://www.clarkson.edu/student-administrative-services-sas/clarkson-regulations">Institutional Policies & Regulations</a> </b><br>
                        <b>&ensp;Academic Integrity</b><br>
                        &ensp;Academic Integrity, based on the values of honesty, trust, fairness, respect, and 
                        responsibility, is a fundamental principle of scholarship in higher education. Clarkson’s Academic 
                        Integrity Policy prohibits: plagiarism (using another person’s writing or copying any work without 
                        proper citation), falsification, unauthorized collaboration during a test or on an assignment, or substitution 
                        for another student to take an exam, course or test, and other forms of academic dishonesty.<br>
                        &ensp;If you are to benefit from this class and be properly evaluated for your contributions, it is important
                        for you to be familiar with and follow Clarkson University’s Academic Integrity policy. Please review this 
                        policy online (<a href="https://www.clarkson.edu/student-administrative-services-sas/clarkson-regulations">Undergraduate section IV – Academic Integrity</a>
                        , <a href="https://www.clarkson.edu/sites/default/files/2020-03/Graduate-Student-Regs_19-20.pdf">Graduate section IV – Academic Integrity</a> ). 
                        <b>Work that violates this policy will not be tolerated.</b> Students who are found responsible for a violation of the Academic Integrity 
                        Policy will have both a university process sanction and an academic outcome, that could include a failing grade on the assignment or exam, 
                        or a failing grade for the course.<br>
                        &ensp;Please refer to <b>Clarkson Library’s <a href="https://sites.clarkson.edu/library/plagiarism/">Guide to Plagiarism**</a></b>
                        and the <a href="https://sites.clarkson.edu/library/citing-sources/">**guide to Citing Sources**</a> for assistance on avoiding 
                        plagiarism and properly citing sources.<br>
                        <b>&ensp;Students with Disabilities Requesting Accommodation(s)</b><br>
                        &ensp;The University strives to make all facilities and programs accessible to students with permanent, ongoing, and 
                        temporary disabilities by providing appropriate and reasonable academic accommodations, as necessary. Disabilities that 
                        may benefit from reasonable accommodations include, but are not limited to, broken wrist, ADHD, surgery recovery, Learning 
                        Disability, concussion, visual impairment, etc. For more information and/or to request accommodations, contact the Office of 
                        Accessibility Services at oas@clarkson.edu or 315-268-7643.<br>
                        &ensp;<a href="https://www.clarkson.edu/policies-and-laws">Students with Disabilities Policy</a> > <a href="https://www.clarkson.edu/accessibility-services">Office of Accessibility Services Website</a> <br><br>

                        <b>&ensp;Other Policies of Note:</b><br>
                        <b>&ensp;Student Regulation Requirements for Excused and Extended Absence </b><br>
                        &ensp;<a href="https://www.clarkson.edu/student-administrative-services-sas/clarkson-regulations">Undergraduate: III-F. Attendance</a> > <a href="https://www.clarkson.edu/student-administrative-services-sas/clarkson-regulations">Graduate – II-F. Attendance</a> <br>
                        &ensp;<a href="https://intranet.clarkson.edu/student-life/sas/grading-system/">Grading System</a><br>
                        &ensp;<a href="https://www.clarkson.edu/diversity-and-inclusion-policies">Discrimination & Harassment</a><br>
                        &ensp;<a href="https://www.clarkson.edu/diversity-and-inclusion-policies">Religious Accommodations</a><br><br>
                    </p>

                    <h2>Lectures</h2>
                    <p id="lecture">
                    &ensp;<a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">L01</a> <br>
                    &ensp;<a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">L02</a> <br>
                    &ensp;<a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">L03</a> <br>
                    &ensp;<a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">L04</a> <br>
                    &ensp;<a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">L05</a> <br>
                    &ensp;<a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">L06</a> <br>
                    &ensp;<a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">L07</a> <br>
                    &ensp;<a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">L08</a> <br>
                    &ensp;<a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">L09</a> <br>
                    &ensp;<a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">L10</a> <br>
                    &ensp;<a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">L11</a> <br>
                    &ensp;<a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">L12</a> <br>
                    &ensp;<a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">L13</a> <br>
                    </p>

                    <h2>Assignments</h2>
                    <p id="assignment">
                    &ensp;1 - <a href="http://localhost/pages/project.php?project=Xfig">Xfig Architecture Diagrams</a> <br>
                    &ensp;2 - <a href="http://localhost/pages/project.php?project=Xfig">Requirement Book</a> <br>
                    &ensp;3 - <a href="http://localhost/pages/project.php?project=Xfig">Design (Concept Location & Impact Analysis)</a> <br>
                    &ensp;4 - <a href="http://localhost/pages/project.php?project=Xfig">Test Cases & Test Results</a> <br>
                    &ensp;5 - <a href="http://localhost/pages/project.php?project=Xfig">Code Inspection </a> <br>
                    &ensp;6 - <a href="http://localhost/pages/project.php?project=Xfig">Features</a> <br>
                    </p>
                </div>
                <div class="sidenav">
                    <a href="http://localhost/pages/home.php">Home</a> <br>
                    <a href="#courseTitle">Course Title</a>
                    <a href="#courseDescription">Course Description</a>
                    <a href="#syllabus">Syllabus</a>
                    <a href="#lecture">Lectures</a>
                    <a href="#assignment">Assignments</a>
                </div>
    </main>
<?php require "../php-snippets/bottom_template.php"; ?>