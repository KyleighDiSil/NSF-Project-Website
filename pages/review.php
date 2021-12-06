<!-- Variable for linking stylesheet -->
<?php $PAGE_NAME = "review"?>

<?php require "../php-snippets/top_template.php"; ?>
<?php if (!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"]) {header("Location: ../pages/home.php");} ?>
    <main id="main">
        <div class="post-wrap">
            <input type="text" onclick="createNewReview()" class="post-review" placeholder="Create Review">
        </div>
        <div class="table-wrap">
            <input name="reset" class="reset-input" type="button" value="RESET TABLE" onclick="resetTable()">
            <table id="review_list_table">
                <tr>
                    <?php
                        if(empty($_GET)) {
                            echo "<th>Name</th>";
                            $item = "";
                            $name = "";
                        } else {
                            $item = $_GET['item'];
                            $name = $_GET['name'];
                            if($item == "") {
                                echo "<th>Name</th>";
                            } else if ($item == "Projects") {
                                echo "<th>Project Name</th>";
                            } else if ($item == "Course") {
                                echo "<th>Course Name</th>";
                            } else if ($item == "Files") {
                                echo "<th>File Name</th>";
                            } else {
                                echo "<th>Name</th>";
                            }
                        }
                    ?>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Rating</th>
                    <th>Date</th>
                </tr>
                <?php

                    if($item != "" && $item != "Course") {
                        //do not display course reviews
                        $query_DB = false;
                    } else if($item == "Course") {
                        $query = "SELECT Name, Title, Content, Reviews.Rating, Date
                            FROM (CourseReviews INNER JOIN Course ON CourseReviews.CourseID = Course.CourseID
                            INNER JOIN Reviews ON CourseReviews.ReviewID = Reviews.ReviewID) WHERE Name = \"".$name."\";";
                        $query_DB = true;
                    } else {
                        $query = "SELECT Name, Title, Content, Reviews.Rating, Date
                            FROM CourseReviews INNER JOIN Course ON CourseReviews.CourseID = Course.CourseID
                            INNER JOIN Reviews ON CourseReviews.ReviewID = Reviews.ReviewID;";
                        $query_DB = true;
                    }

                    if(!$query_DB) {
                        //do not display course reviews
                    } else if (!$result = mysqli_query($conn, $query)) {
                        echo "Error";
                    } else {/*
                        while($review_row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>".$review_row["Name"]."</td>";
                            echo "<td>".$review_row["Title"]."</td>";
                            echo "<td>".$review_row["Content"]."</td>";

                            echo "<td style='width: 125px'>";
                            $i = 0;
                            while ($i < $review_row["Rating"]) {
                                echo "<span class='fa fa-star checked'></span>";
                                ++$i;
                            }
                            while ($i < 5) {
                                echo "<span class='fa fa-star'></span>";
                                ++$i;
                            }
                            echo "</td>";

                            echo "<td>".$review_row["Date"]."</td>";
                            echo "</tr>";
                        }*/
                            while($review_row = $result->fetch_assoc()) {
                                echo "<div id='container'>";
                                echo "<h1>".$review_row["Title"]."</h1>";
                                echo "<div id='inside-container'>";
                                echo "<p id='name'>".$review_row["Name"]."</p>";
                                echo "<div id='stars'>";
                                $i = 0;
                                while ($i < $review_row["Rating"]) {
                                    echo "<span class='fa fa-star checked'></span>";
                                    ++$i;
                                }
                                while ($i < 5) {
                                    echo "<span class='fa fa-star'></span>";
                                    ++$i;
                                }
                                echo "</div>";
                                echo "<p id='date'>".$review_row["Date"]."</p>";
                                echo "</div>";
                                echo "<p id='content'>".$review_row["Content"]."</p>";
                                echo "</div>";
                            }
                    }


                    if($item != "" && $item != "Projects") {
                        $query_DB = false;
                    } else if($item == "Projects") {
                        $query = "SELECT Name, Title, Content, Reviews.Rating, Date
                        FROM (ProjectReviews INNER JOIN Projects ON ProjectReviews.ProjectID = Projects.ProjectID
                        INNER JOIN Reviews ON ProjectReviews.ReviewID = Reviews.ReviewID) WHERE Name = \"".$name."\";";
                        $query_DB = true;
                    } else {
                        $query = "SELECT Name, Title, Content, Reviews.Rating, Date
                        FROM ProjectReviews INNER JOIN Projects ON ProjectReviews.ProjectID = Projects.ProjectID
                        INNER JOIN Reviews ON ProjectReviews.ReviewID = Reviews.ReviewID;";
                        $query_DB = true;
                    }

                    if(!$query_DB) {
                        //do not display project reviews
                    } else if (!$result = mysqli_query($conn, $query)) {
                        echo "Error";
                    } else {/*
                        while($review_row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>".$review_row["Name"]."</td>";
                            echo "<td>".$review_row["Title"]."</td>";
                            echo "<td>".$review_row["Content"]."</td>";

                            echo "<td style='width: 125px'>";
                            $i = 0;
                            while ($i < $review_row["Rating"]) {
                                echo "<span class='fa fa-star checked'></span>";
                                ++$i;
                            }
                            while ($i < 5) {
                                echo "<span class='fa fa-star'></span>";
                                ++$i;
                            }
                            echo "</td>";

                            echo "<td>".$review_row["Date"]."</td>";
                            echo "</tr>";
                        }*/
                        /////////
                        while($review_row = $result->fetch_assoc()) {
                            echo "<div id='container'>";
                            echo "<h1>".$review_row["Title"]."</h1>";
                            echo "<div id='inside-container'>";
                            echo "<p id='name'>".$review_row["Name"]."</p>";
                            echo "<div id='stars'>";
                            $i = 0;
                            while ($i < $review_row["Rating"]) {
                                echo "<span class='fa fa-star checked'></span>";
                                ++$i;
                            }
                            while ($i < 5) {
                                echo "<span class='fa fa-star'></span>";
                                ++$i;
                            }
                            echo "</div>";
                            echo "<p id='date'>".$review_row["Date"]."</p>";
                            echo "</div>";
                            echo "<p id='content'>".$review_row["Content"]."</p>";
                            echo "</div>";
                        }
                    }

                    if($item != "" && $item != "Files") {
                        $query_DB = false;
                    } else if ($item == "Files") {
                        $query = "SELECT ID, Title, Content, Reviews.Rating, Date
                                FROM (FileReviews INNER JOIN Files ON FileReviews.FileID = Files.FileID
                                INNER JOIN Reviews ON FileReviews.ReviewID = Reviews.ReviewID) WHERE ID = \"".$name."\";";
                        $query_DB = true;
                    } else {
                        $query = "SELECT ID, Title, Content, Reviews.Rating, Date
                                FROM FileReviews INNER JOIN Files ON FileReviews.FileID = Files.FileID
                                INNER JOIN Reviews ON FileReviews.ReviewID = Reviews.ReviewID;";
                        $query_DB = true;
                    }

                    if(!$query_DB) {
                        //do not display file reviews
                    } else if (!$result = mysqli_query($conn, $query)) {
                        echo "Error";
                    } else {/*
                        while($review_row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>".$review_row["Name"]."</td>";
                            echo "<td>".$review_row["Title"]."</td>";
                            echo "<td>".$review_row["Content"]."</td>";

                            echo "<td style='width: 125px'>";
                            $i = 0;
                            while ($i < $review_row["Rating"]) {
                                echo "<span class='fa fa-star checked'></span>";
                                ++$i;
                            }
                            while ($i < 5) {
                                echo "<span class='fa fa-star'></span>";
                                ++$i;
                            }
                            echo "</td>";

                            echo "<td>".$review_row["Date"]."</td>";
                            echo "</tr>";
                            }*/
                            while($review_row = $result->fetch_assoc()) {
                                echo "<div id='container'>";
                                echo "<h1>".$review_row["Title"]."</h1>";
                                echo "<div id='inside-container'>";
                                echo "<p id='name'>".$review_row["Name"]."</p>";
                                echo "<div id='stars'>";
                                $i = 0;
                                while ($i < $review_row["Rating"]) {
                                    echo "<span class='fa fa-star checked'></span>";
                                    ++$i;
                                }
                                while ($i < 5) {
                                    echo "<span class='fa fa-star'></span>";
                                    ++$i;
                                }
                                echo "</div>";
                                echo "<p id='date'>".$review_row["Date"]."</p>";
                                echo "</div>";
                                echo "<p id='content'>".$review_row["Content"]."</p>";
                                echo "</div>";
                            }
                    }
                ?>
            </table>
        </div>
    </main>
    <script>
        function createNewReview() {
            window.location.href = "../pages/create_review.php?title=&content=&item=&name=&rating=";
        }
        function resetTable() {
            window.location.href = "../pages/review.php?item=&name=";
        }
    </script>
<?php require "../php-snippets/bottom_template.php"; ?>