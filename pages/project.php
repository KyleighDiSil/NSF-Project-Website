<!-- Variable for linking stylesheet -->
<?php $PAGE_NAME = "project"?>

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
        <?php

            include_once '../php-scripts/connect_to_database.php';
            include_once '../php-scripts/numberConverter.php';

            $query = "SELECT Name, Summary, Availability, Rating, Clicks FROM Projects".$where." LIMIT 1;";

            if (!$result = mysqli_query($conn, $query))
            {
                echo "Error"; # CDL=> Should handle errors better
            }
            else
            {
                $project_row = $result->fetch_assoc();

                echo "<div id='card'>";
                echo "<h1 id='title'>".$project_row["Name"]."</h1>";

                echo "<div id='project-info'>";
                # Stars!
                echo "<a id='link' href='review.php'>";
                $i = 0;
                while ($i < $project_row["Rating"])
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
                echo "<p id='clicks'>".thousandsCurrencyFormat($project_row["Clicks"])."</p>";

                echo "<div id='tags'>";
                switch ($project_row["Availability"])
                {
                    case 0:
                        echo "<div class='available_tag'>";
                        echo "    <i class='far fa-check-circle' style='padding-left: 5px;'></i>";
                        echo "    Available";
                        echo "</div>";
                        break;
                    case 1:
                        echo "<div class='pending_tag'>";
                        echo "    <i class='far fa-question-circle' style='padding-left: 5px;'></i>";
                        echo "    Under Review";
                        echo "</div>";
                        break;
                    case 2:
                        echo "<div class='development_tag'>";
                        echo "    <i class='fas fa-tools' style='padding-left: 5px;'></i>";
                        echo "    Under Development";
                        echo "</div>";
                        break;
                    case 3:
                        echo "<div class='unavailable_tag'>";
                        echo "    <i class='far fa-times-circle' style='padding-left: 5px;'></i>";
                        echo "    Future Project";
                        echo "</div>";
                        break;
                }
                echo "</div>";
                echo "</div>";

                echo "<p id='summary'>".$project_row["Summary"]."</p>";

                echo "</div>";
            }

            
        ?>
    </main>
<?php require "../php-snippets/bottom_template.php"; ?>