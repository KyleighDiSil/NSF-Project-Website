<!-- Variable for linking stylesheet -->
<?php $PAGE_NAME = "review"?>

<?php require "../php-snippets/top_template.php"; ?>
<?php if (!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"]) {header("Location: ../pages/home.php");} ?>
    <main id="main">
        <div class="post-wrap">
            <input type="text" onclick="createNewReview()" class="post-review" placeholder="Create Review">
        </div>
        <div class="wrap">
            <div class="search">
                <input type="text" class="searchTerm" placeholder="Search....">
                <button type="submit" class="searchButton">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
        <div class="table-wrap">
            <table id="review_list_table">
                <tr>
                    <th>Item</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Rating</th>
                    <th>Date</th>
                </tr>
                <?php

                    $query = "SELECT Name, Title, Content, Reviews.Rating, Date 
                            FROM CourseReviews INNER JOIN Course ON CourseReviews.CourseID = Course.CourseID 
                            INNER JOIN Reviews ON CourseReviews.ReviewID = Reviews.ReviewID;";
                    
                    if (!$result = mysqli_query($conn, $query)) {
                        echo "Error";
                    } else {
                        while($review_row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>".$review_row["Name"]."</td>";
                            echo "<td>".$review_row["Title"]."</td>";
                            echo "<td>".$review_row["Content"]."</td>";
                            // echo "<td>".$review_row["Rating"]."</td>";

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
                        }
                    }

                    $query = "SELECT Name, Title, Content, Reviews.Rating, Date 
                            FROM ProjectReviews INNER JOIN Projects ON ProjectReviews.ProjectID = Projects.ProjectID 
                            INNER JOIN Reviews ON ProjectReviews.ReviewID = Reviews.ReviewID;";
                    
                    if (!$result = mysqli_query($conn, $query)) {
                        echo "Error";
                    } else {
                        while($review_row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>".$review_row["Name"]."</td>";
                            echo "<td>".$review_row["Title"]."</td>";
                            echo "<td>".$review_row["Content"]."</td>";
                            echo "<td>".$review_row["Rating"]."</td>";
                            echo "<td>".$review_row["Date"]."</td>";
                            echo "</tr>";
                        }
                    }

                    $query = "SELECT ID, Title, Content, Reviews.Rating, Date 
                            FROM FileReviews INNER JOIN Files ON FileReviews.FileID = Files.FileID 
                            INNER JOIN Reviews ON FileReviews.ReviewID = Reviews.ReviewID;";
                    
                    if (!$result = mysqli_query($conn, $query)) {
                        echo "Error";
                    } else {
                        while($review_row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>".$review_row["ID"]."</td>";
                            echo "<td>".$review_row["Title"]."</td>";
                            echo "<td>".$review_row["Content"]."</td>";
                            echo "<td>".$review_row["Rating"]."</td>";
                            echo "<td>".$review_row["Date"]."</td>";
                            echo "</tr>";
                            }
                    }
                ?>
            </table>
        </div>
    </main>
    <script>
        function createNewReview() {
            window.location.href = "http://localhost/pages/create_review.php";
        }
    </script>
<?php require "../php-snippets/bottom_template.php"; ?>