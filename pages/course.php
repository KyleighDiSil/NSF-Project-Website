<!-- Variable for linking stylesheet -->
<?php $PAGE_NAME = "course"?>

<?php require "../php-snippets/top_template.php"; ?>
<?php if (!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"]) {header("Location: ../pages/home.php");} ?>
    <main id="main">
        <h1 id="courseTitle">Course Title</h1>
        <div id="rating">
            <span class='fa fa-star checked' style="color:orange"></span>
            <span class='fa fa-star checked' style="color:orange"></span>
            <span class='fa fa-star checked' style="color:orange"></span>
            <span class='fa fa-star checked' style="color:orange"></span>
            <span class='fa fa-star'></span>
        </div>
                <div id="courseContent">
                    <h2>Course Description</h2>
                    <p id="courseDescription">
                        &ensp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer 
                        took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, 
                        but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s 
                        with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing 
                        software like Aldus PageMaker including versions of Lorem Ipsum.
                    </p>
                    <h2>Syllabus</h2>
                    <p id="syllabus">
                        &ensp;Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical 
                        Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-
                        Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum 
                        passage, and going through the cites of the word in classical literature, discovered the undoubtable source. 
                        Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good 
                        and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the
                         Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                    </p>
                    <h2>Lectures</h2>
                    <p id="lecture">
                        &ensp;The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections
                         1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original
                          form, accompanied by English versions from the 1914 translation by H. Rackham.
                    </p>
                    <h2>Labs & Homeworks</h2>
                    <p id="labHomework">
                        &ensp; Homework 1 - <a href="review.php">Review</a> <br>
                        &ensp; Lab 1 - <a href="review.php">Review</a> <br>
                        &ensp; Homework 2 - <a href="review.php">Review</a> <br>
                        &ensp; Lab 2 - <a href="review.php">Review</a> <br>
                        &ensp; Homework 3 - <a href="review.php">Review</a> <br>
                        &ensp; Lab 3 - <a href="review.php">Review</a> <br>
                    </p>
                </div>
                <div class="sidenav">
                    <a href="#courseTitle">Course Title</a>
                    <a href="#courseDescription">Course Description</a>
                    <a href="#syllabus">Syllabus</a>
                    <a href="#labHomework">Labs & Homeworks</a>
                </div>
    </main>
<?php require "../php-snippets/bottom_template.php"; ?>