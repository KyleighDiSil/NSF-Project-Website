<!-- Variable for linking stylesheet -->
<?php $PAGE_NAME = "project_page"?>

<?php require "../php-snippets/top_template.php"; ?>
<?php if (!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"]) {header("Location: ../pages/home.php");} ?>
<?php
    $where = " ";
    if (isset($_GET['project']) && strlen($_GET['project']) > 0 )
    {
        $where = " WHERE Name = '".$_GET['project']."'";
    }
?>
    <main id="main">
        <h1>Project Page</h1>
        <?php
            include_once '../php-scripts/connect_to_database.php';

            $query = "SELECT Name, Summary, Availability, Rating, Clicks FROM Projects".$where." LIMIT 1;";

            if (!$result = mysqli_query($conn, $query))
            {
                echo "Error"; # CDL=> Should handle errors better
            }
            else
            {
                $project_row = $result->fetch_assoc();

                echo "<p>Name: ".$project_row["Name"]."</p>";
                echo "<p>Summary: ".$project_row["Summary"]."</p>";
                echo "<p>Availability: ".$project_row["Availability"]."</p>";
                echo "<p>Rating: ".$project_row["Rating"]."</p>";
                echo "<p>Clicks: ".$project_row["Clicks"]."</p>";

            }
        ?>
    </main>
<?php require "../php-snippets/bottom_template.php"; ?>