<?php
    include_once  "connect_to_database.php";

    $type = $_GET['type'];
    $id = $_GET['id'];

    if ($type == 'course')
    {
        echo "Courses";
        if ($result = mysqli_query($conn, "SELECT AVG(Rating) AS Rating FROM reviews INNER JOIN coursereviews ON reviews.reviewid = coursereviews.reviewid WHERE coursereviews.courseid = $id;"))
        {
            $row = $result->fetch_assoc();
            $rating = intval($row['Rating']);
            mysqli_query($conn, "UPDATE Course SET Rating=$rating WHERE courseid=$id;");
        }
    }
    elseif ($type == 'project')
    {
        echo "Projects";
        $SQL = "SELECT AVG(Rating) AS Rating FROM reviews INNER JOIN projectreviews ON reviews.reviewid = projectreviews.reviewid WHERE projectreviews.projectid = $id;";
        echo $SQL;
        if ($result = mysqli_query($conn, $SQL))
        {
            $row = $result->fetch_assoc();
            $rating = intval($row['Rating']);
            mysqli_query($conn, "UPDATE Projects SET Rating=$rating WHERE projectid=$id;");
        }
    }
    else
    {
        echo "ERROR";
        header("Location: ../../index.php");
    }
    header("Location: ../pages/review.php?item=&name=");
?>