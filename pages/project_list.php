<!-- Variable for linking stylesheet -->
<?php $PAGE_NAME = "project_list"?>

<?php require "../php-snippets/top_template.php"; ?>
<?php if (!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"]) {header("Location: ../pages/home.php");} ?>
    <main id="main">
        <h1>Project List</h1>

        <table id="project_list_table" >
            <tr>
                <th>Project Name</th>
                <th>Summary</th>
                <th>Availability</th>
                <th>Rating</th>
            </tr>
            <tr>
                <td><a href="">Xfig</a></td>

                <td>Vector graphics editor on UNIX like platforms, figure libraries and supporting JPG, PNG, EPS. </td>
                <td>
                    <div class="available_tag">
                        <i class="far fa-check-circle" style="padding-left: 5px;"></i>
                        Available
                    </div>
                </td>
                <td style="width: 125px">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </td>
            </tr>
            <tr>
                <td><a href="">Mango</a></td>

                <td>Web-based (Tomcat, Ajax) platform for sensor and M2M control, data acquisition and visualization.</td>
                <td>
                    <div class="pending_tag">
                        <i class="far fa-question-circle" style="padding-left: 5px;"></i>
                        Under Review
                    </div>
                </td>
                <td style="width: 125px">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </td>
            </tr>
        </table>
    </main>
<?php require "../php-snippets/bottom_template.php"; ?>