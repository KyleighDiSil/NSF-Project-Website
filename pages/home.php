<!-- Variable for linking stylesheet -->
<?php $PAGE_NAME = "home"?>

<?php require "../php-snippets/top_template.php"; ?>
    <main id="main">
                <div id="announcement-bar">
                    <a href="announcements.php" id="bar-title-link"><div id="bar-title">Announcements</div></a>
                    <a href="announcements.php" id="title-link"><div id="title">This is a very very very very very very very very very very very long title</div></a>
                    <!-- <a href="announcements.php"><p id="bar-title">Announcements</p></a>
                    <p id="title">This is a very long title called title no i do not want to add a whole bunch of text</p> -->
                </div>

                <div id="welcome-page">
                    <?php echo "<h1 id='welcome'>$STATUS $ACCESS</h1>"; ?>
                </div>

                <h1>Welcome</h1>

                <div id="AboutUs">
                    <h2>About Us</h2>
                    <p id="summary">
                        &ensp;This NSF website was designed by Clarkson University students and
                        professors to better enable software engineering teachers around
                        the world. This website contains several engaging software engineering
                        projects for professors to pull from. There is also a course
                        structure page for professors to reference when designing their own
                        courses surrounding these projects.<br><br>
                        &ensp;On our Contact Us page you can find more information about the advisors
                        of this website and how to contact them. We highly encourage creating a
                        account under the Login page to get started exploring our projects and
                        resources!
                    </p>
                </div>

                <div id="ourGoal">
                    <h2>Our Goal</h2>
                    <p id="goal-sum"> &ensp;To enable professors around the world with projects and project guidance
                        we hope to lead software engineering in classrooms to a more Project Based
                        Learning method. Provided with the right projects and guidance students will be 
                        able to enter a higher level of learning and Rigor.
                    </p>
                    <img id="home-image" src="../images/summary.PNG"/>
                    <p id="Fig1"><b>Fig. 1.</b> Software engineering PBL (Project Based Learning??) scaffolded via active learning activities in classroom and lab and supported by project-specific guidance from instructors during office hours (Right), increases academic rigor and produces higher level of students learning and thus success in PBL. Scaffolding and supports for PBL are provided as part of the curated course projects produced by this project.</p>
                </div>

                <div id="canidate-projects">
                    <h2 style="padding-bottom: 10px;">Canidate Course Projects</h2>
                    <table id="project-table" border="1">
                        <tr>
                            <th>Open Source Project</th>
                            <th>Brief Description</th>
                            <th>Language</th>
                            <th>Domain</th>
                            <th>Platform</th>
                        </tr>
                        <tr>
                            <td>WordPress [52]</td>
                            <td>Open-source software for creating website, blog, or app.</td>
                            <td>PHP</td>
                            <td>Content Mgmt</td>
                            <td>Web</td>
                        </tr>
                        <tr>
                            <td>MuseScore [28]</td>
                            <td>Music notation and writing software.</td>
                            <td>C++</td>
                            <td>Music</td>
                            <td>Desktop</td>
                        </tr>
                        <tr>
                            <td>VSCode [53]</td>
                            <td>Microsoft's notation and writing software</td>
                            <td>JavaScript</td>
                            <td>Developer</td>
                            <td>Desktop</td>
                        </tr>
                        <tr>
                            <td>Hunt [54]</td>
                            <td>Virtual scavenger hunt mobile app where players
                                can join a game, select a team and solve hints to
                                aquire treasure. The team with the most points wins.
                            </td>
                            <td>Java</td>
                            <td>Gaming</td>
                            <td>Mobile</td>
                        </tr>
                        <tr>
                            <td>iTrust [55]</td>
                            <td>Electronic medical records web application that
                                supports patients and medical staff in securely
                                managing healthcare workflows.
                            </td>
                            <td>Java</td>
                            <td>Healthcare</td>
                            <td>Web</td>
                        </tr>
                        <tr>
                            <td>Qt [56]</td>
                            <td>Cross-platform application and UI framework, active
                                developer community. 
                            </td>
                            <td>C</td>
                            <td>Developer</td>
                            <td>Desktop</td>
                        </tr>
                        <tr>
                            <td>SuperTuxKart [57]</td>
                            <td>3D open-source arcade racer with a variety characters,
                                tracks, and modes to play.
                            </td>
                            <td>C++</td>
                            <td>Gaming</td>
                            <td>Desktop</td>
                        </tr>
                        <tr>
                            <td>Xfig [58]</td>
                            <td>Vector graphics editor on UNIX like platforms, 27
                                figure libraries and supporting JPG, PNG, EPS.
                            </td>
                            <td>C</td>
                            <td>Tool</td>
                            <td>Desktop</td>
                        </tr>
                        <tr>
                            <td>Mango [59]</td>
                            <td>Web-based (Tomcat, Ajax) platform for sensor and
                                M2M control, data acquisition and visualization.
                            </td>
                            <td>Java</td>
                            <td>IoT</td>
                            <td>Web</td>
                        </tr>
                        <tr>
                            <td>Mozilla [60]</td>
                            <td>Well-known web browser with strong support for
                                software engineering education.
                            </td>
                            <td>C++</td>
                            <td>Developer</td>
                            <td>Desktop</td>
                        </tr>
                        <tr>
                            <td>WinMerge [61]</td>
                            <td>Text file merging and comparison tool for Windows
                                used in software course [36].
                            </td>
                            <td>C++</td>
                            <td>Developer</td>
                            <td>Desktop</td>
                        </tr>
                        <tr>
                            <td>Moodle [62]</td>
                            <td>Platform for educations/learners to create personalized 
                                learning enviroments.
                            </td>
                            <td>PHP JavaScript</td>
                            <td>Education</td>
                            <td>Web</td>
                        </tr>
                    </table>
                </div>
    </main>
<?php require "../php-snippets/bottom_template.php"; ?>
