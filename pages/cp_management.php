<!-- Variable for linking stylesheet -->
<?php $PAGE_NAME = "cp_management"?>

<?php require "../php-snippets/top_template.php"; ?>
<?php if (!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"]) {header("Location: ../pages/home.php");} ?>
    <main id="main">
        <h1>Course/Project Management</h1>
    </main>
<?php require "../php-snippets/bottom_template.php"; ?>