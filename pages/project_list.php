<!-- Variable for linking stylesheet -->
<?php $PAGE_NAME = "project_list"?>

<?php require "../php-snippets/top_template.php"; ?>
<?php if (!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"]) {header("Location: ../pages/home.php");} ?>
    <main id="main">
        <div id="project_list_contents">
            <h1>Project List</h1>
            <table id="project_list_table" >
                <tr>
                    <th onclick="sortTable(0)">Project Name</th>
                    <th>Summary</th>
                    <th onclick="sortTable(2)">Availability</th>
                    <th onclick="sortTable(3)">Rating</th>
                    <th onclick="sortTable(4)">Views</th>
                </tr>
                <?php
                    include_once '../php-scripts/connect_to_database.php';
                    include_once '../php-scripts/numberConverter.php';

                    $query = "SELECT Name, Summary, Availability, Rating, Clicks, ProjectID FROM Projects;";

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
                                echo "<td><a href='project.php?project=".$project_row["Name"]."' onclick=trackProjectClicks(".$project_row["ProjectID"].")>".$project_row["Name"]."</a></td>";
                            }
                            else
                            {
                                echo "<td>".$project_row["Name"]."</td>";
                            }

                            // Project Summary
                            echo "<td>".$project_row["Summary"]."</td>";

                            // Project Availability
                            echo "<td><div id='tags'>";
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
                            echo "</div></td>";

                            // Project Rating
                            echo "<td style='width: 125px'><a id='link' href='review.php?item=Projects&name=".$project_row["Name"]."'>";
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
                            echo "</a></td>";

                            // Project Clicks
                            echo "<td>".thousandsCurrencyFormat($project_row["Clicks"])."</td>";

                            echo "</tr>";
                        }
                    }
                ?>
            </table>
        </div>
    </main>
    <script>
        // https://www.w3schools.com/howto/howto_js_sort_table.asp
        function sortTable(n) {
        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
        table = document.getElementById("project_list_table");
        switching = true;
        // Set the sorting direction to ascending:
        dir = "asc";
        /* Make a loop that will continue until
        no switching has been done: */
        while (switching) {
            // Start by saying: no switching is done:
            switching = false;
            rows = table.rows;
            /* Loop through all table rows (except the
            first, which contains table headers): */
            for (i = 1; i < (rows.length - 1); i++) {
            // Start by saying there should be no switching:
            shouldSwitch = false;
            /* Get the two elements you want to compare,
            one from current row and one from the next: */
            x = rows[i].getElementsByTagName("td")[n];
            y = rows[i + 1].getElementsByTagName("td")[n];
            /* Check if the two rows should switch place,
            based on the direction, asc or desc: */
            if (dir == "asc") {
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                // If so, mark as a switch and break the loop:
                shouldSwitch = true;
                break;
                }
            } else if (dir == "desc") {
                if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                // If so, mark as a switch and break the loop:
                shouldSwitch = true;
                break;
                }
            }
            }
            if (shouldSwitch) {
            /* If a switch has been marked, make the switch
            and mark that a switch has been done: */
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            // Each time a switch is done, increase this count by 1:
            switchcount ++;
            } else {
            /* If no switching has been done AND the direction is "asc",
            set the direction to "desc" and run the while loop again. */
            if (switchcount == 0 && dir == "asc") {
                dir = "desc";
                switching = true;
            }
            }
        }
        }
    </script>
    <script src="http://code.jquery.com/jquery-2.1.4.js"></script>
    <script>
        function trackProjectClicks(projectID)
        {
            $.post("../php-scripts/track_clicks.php", {projectID: projectID});
        }
    </script>
<?php require "../php-snippets/bottom_template.php"; ?>