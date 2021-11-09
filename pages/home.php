<!-- Variable for linking stylesheet -->
<?php $PAGE_NAME = "home"?>

<?php require "../php-snippets/top_template.php"; ?>
    <main id="main">
                <div id="welcome-page">
                    <?php echo "<h1 id='welcome'>$STATUS $ACCESS</h1>"; ?>
                </div>

                <h1>Welcome</h1>

                <div id="announcement-bar">
                    <a href="announcements.php" id="bar-title-link"><div id="bar-title">Announcements</div></a>
                    <a href="announcements.php" id="title-link"><div id="title">This is a very very very very very very very very very very very long title</div></a>
                    <!-- <a href="announcements.php"><p id="bar-title">Announcements</p></a>
                    <p id="title">This is a very long title called title no i do not want to add a whole bunch of text</p> -->
                </div>

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
        <img id="home-image" src="../images/summary.PNG"/>
        <p id="Fig1"><b>Fig. 1.</b> Software engineering PBL scaffolded via active learning activities in classroom and lab and supported by project-specific guidance from instructors during offic hours (Right), increases academic rigor and produces higher level of students learning and thus success in PBL. Scaffolding and supports for PBL are provided as part of the curated course projects produced by this project.</p>
    </main>
<?php require "../php-snippets/bottom_template.php"; ?>
