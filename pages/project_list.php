<!-- Variable for linking stylesheet -->
<?php $PAGE_NAME = "project_list"?>

<?php require "../php-snippets/top_template.php"; ?>
<?php if (!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"]) {header("Location: ../pages/home.php");} ?>
    <main id="main">
        <h1>Project List</h1>

        <table id="project_list_table">
            <tr>
                <th>Project Name</th>
                <th>Summary</th>
                <th>Availability</th>
                <th>Rating</th>
                <th>More Details</th>
            </tr>
            <tr>
                <td>Xfig</td>
                <td>Vector graphics editor on UNIX like platforms, figure libraries and supporting JPG, PNG, EPS. </td>
                <td><div class="tag"><p>Available</p></div></td>
                <td style="width: 125px">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </td>
                <td>IDK what to put here lmao</td>
            </tr>
        </table>
    </main>
<?php require "../php-snippets/bottom_template.php"; ?>