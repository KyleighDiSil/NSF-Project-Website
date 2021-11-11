<!-- Variable for linking stylesheet -->
<?php $PAGE_NAME = "announcements"?>

<?php require "../php-snippets/top_template.php"; ?>
<?php if (!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"]) {header("Location: ../pages/home.php");} ?>
    <main id="main">
        <h1 id="page-title">Announcements</h1>
        <div id="announcement-container">
            <h2 id="title">Title of Announcement</h2>
            <p id="date">Announcement Date</p>
            <p id="content">The Content</p>
        </div>
    </main>
<?php require "../php-snippets/bottom_template.php"; ?>