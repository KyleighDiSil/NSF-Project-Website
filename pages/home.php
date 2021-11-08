<!-- Variable for linking stylesheet -->
<?php $PAGE_NAME = "home"?>

<?php require "../php-snippets/top_template.php"; ?>
    <main id="main">
                <div id="welcome-page">
                    <?php echo "<h1 id='welcome'>$STATUS $ACCESS</h1>"; ?>
                </div>

                <div id="announcement-bar">
                    <a href="announcements.php" id="bar-title-link"><div id="bar-title">Announcements</div></a>
                    <a href="announcements.php" id="title-link"><div id="title">This is a very long title called title no i do not want to add a whole bunch of text</div></a>
                    <!-- <a href="announcements.php"><p id="bar-title">Announcements</p></a>
                    <p id="title">This is a very long title called title no i do not want to add a whole bunch of text</p> -->
                </div>

        <img id="home-image" src="../images/summary.PNG"/>
        <p id="summary"><b>Fig. 1.</b> Software engineering PBL scaffolded via active learning activities in classroom and lab and supported by project-specific guidance from instructors during offic hours (Right), increases academic rigor and produces higher level of students learning and thus success in PBL. Scaffolding and supports for PBL are provided as part of the curated course projects produced by this project.</p>
    </main>
<?php require "../php-snippets/bottom_template.php"; ?>
