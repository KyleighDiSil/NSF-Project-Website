<!-- Variable for linking stylesheet -->
<?php $PAGE_NAME = "project_list"?>

<?php require "../php-snippets/top_template.php"; ?>
<?php if (!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"]) {header("Location: ../pages/home.php");} ?>
    <main id="main">
        <div id="project_list_contents">
            <h1>Project List</h1>
            <table id="project_list_table" >
                <tr>
                    <th>Project Name</th>
                    <th>Summary</th>
                    <th>Availability</th>
                    <th>Rating</th>
                    <th>Views</th>
                </tr>
                <?php
                    include_once '../php-scripts/connect_to_database.php';
                    include_once '../php-scripts/numberConverter.php';

                    $query = "SELECT Name, Summary, Availability, Rating, Clicks FROM Projects;";

                    if (!$result = mysqli_query($conn, $query))
                    {
                        echo "Error"; # CDL=> Should handle errors better
                    }
                    else
                    {
                        while ($project_row = $result->fetch_assoc())
                        {
                            echo "<tr>";

                            // Project Name
                            if ($ACCESS > 1 || $project_row["Availability"] < 2)
                            {
                                echo "<td><a href='project.php?project=".$project_row["Name"]."'>".$project_row["Name"]."</a></td>";
                            }
                            else
                            {
                                echo "<td>".$project_row["Name"]."</td>";
                            }

                            // Project Summary
                            echo "<td>".$project_row["Summary"]."</td>";

                            // Project Availability
                            echo "<td>";
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
                            echo "</td>";

                            // Project Rating
                            echo "<td style='width: 125px'>";
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
                            echo "</td>";

                            // Project Clicks
                            echo "<td>".thousandsCurrencyFormat($project_row["Clicks"])."</td>";
                        }
                    }
                ?>
            </table>
        </div>
    </main>
<?php require "../php-snippets/bottom_template.php"; ?>