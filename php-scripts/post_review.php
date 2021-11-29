<?php

    require "../php-scripts/get_access.php";

    // Connect to the database
    include_once 'connect_to_database.php';

    $title = $_POST['title'];
    $content = $_POST['content'];
    $item = $_POST['items'];
    $name = $_POST['item-name'];
    $rating = $_POST['rating-num'];

    if($title == "" || $content == "" || $item=="" || $name == "" || $rating == "0") {
        header("Location: http://localhost/pages/create_review.php?title=".$title."&content=".$content."&item=".$item."&name=".$name."&rating=".$rating);
    } else {
        $today = date("Y-m-d");
        $query = "INSERT INTO Reviews (Title, Content, Rating, Date) VALUES(\"".$title."\", \"".$content."\", ".$rating.", ".$today.");";

        if (!$result = mysqli_query($conn, $query)) {
            echo "Error";
        } else {
            if($item == "Projects") {
                
                $project_query = "SELECT ProjectID FROM Projects WHERE Name=\"".$name."\";"; 
                $review_query = "SELECT ReviewID FROM Reviews WHERE Title=\"".$title."\" AND Content=\"".$content."\" AND Rating=".$rating." AND Date=".$today.";";

                if ((!$project_result = mysqli_query($conn, $project_query)) || (!$review_result = mysqli_query($conn, $review_query))) {
                    echo "Error";
                } else {
                    $project_row = $project_result->fetch_assoc();
                    $review_row = $review_result->fetch_assoc();
                    $project_ID = $project_row["ProjectID"];
                    $review_ID = $review_row["ReviewID"];

                    $query = "INSERT INTO ProjectReviews (ProjectID, ReviewID) VALUES(".$project_ID.", ".$review_ID.");";

                    if (!$result = mysqli_query($conn, $query)) {
                        echo "Error";
                    } else {
                        header("Location: http://localhost/pages/review.php?item=".$item."&name=".$name);
                    }
                }
            } else {
                $course_query = "SELECT CourseID FROM Course WHERE Name=\"".$name."\";"; 
                $review_query = "SELECT ReviewID FROM Reviews WHERE Title=\"".$title."\" AND Content=\"".$content."\" AND Rating=".$rating." AND Date=".$today.";";

                if ((!$course_result = mysqli_query($conn, $course_query)) || (!$review_result = mysqli_query($conn, $review_query))) {
                    echo "Error";
                } else {
                    $course_row = $course_result->fetch_assoc();
                    $review_row = $review_result->fetch_assoc();
                    $course_ID = $course_row["CourseID"];
                    $review_ID = $review_row["ReviewID"];

                    $query = "INSERT INTO CourseReviews (CourseID, ReviewID) VALUES(".$course_ID.", ".$review_ID.");";

                    if (!$result = mysqli_query($conn, $query)) {
                        echo "Error";
                    } else {
                        header("Location: http://localhost/pages/review.php?item=".$item."&name=".$name);
                    }
                }
            }

        }

    }

?>