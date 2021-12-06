<!-- Variable for linking stylesheet -->
<?php $PAGE_NAME = "contact"?>

<?php require "../php-snippets/top_template.php"; ?>
<?php if (!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"]) {header("Location: ../pages/home.php");} ?>
    <main id="main">
        <h1 style="text-align:center">Contact Us</h1>

        <table id="contact_us_table" style="margin-left:auto;margin-right:auto">
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Role & Expertise</th>
                <th>Responsibilities</th>
                <th>Contact Info</th>
            </tr>
            <tr>
                <td>Daqing Hou</td>
                <td><img id="instructor-image" src="../images/Daqing-Hou.gif"/></td>
                <td>PI; software engineering education & research</td>
                <td> General project management and oversight, coordination with VCU, lead on development of course projects and reference course, and dissemination</td>
                <td><b>Email:</b><br>dhou@clarkson.edu<br>
                    <b>Phone:</b><br>315/268-7675<br>

            </tr>
            <tr>
                <td>Yu Liu</td>
                <td><img id="instructor-image" src="../images/Yu-Liu.jpg"/></td>
                <td>co-PI; software engineering education</td>
                <td>Development of course projects and reference course, teaching with developed materials</td>
                <td><b>Email:</b><br>yuliu@clarkson.edu<br>
                    <b>Phone:</b><br>315/268-6510<br>         
            </tr>
            <tr>
                <td>Jan E Dewaters</td>
                <td><img id="instructor-image" src="../images/Jan-DeWaters.jpg"/></td>
                <td>co-PI; engineering education research</td>
                <td>Design and development of assessment tools, data analysis and interpretation, liaison to external evaluator</td>
                <td><b>Email:</b><br>jdewater@clarkson.edu<br>
                    <b>Phone:</b><br>315/268-6577<br>
            </tr>
            <tr>
                <td>Mary Margaret Small</td>
                <td><img id="instructor-image" src="../images/Mary-Margaret-Small.gif"/></td>
                <td>External Evaluator; STEM education</td>
                <td>Organization and implementation of all assessment components; evaluation of overall program outcomes</td>
                <td><b>Email:</b><br>mmsmall@clarkson.edu<br>
                    <b>Phone:</b><br>315/268-3791<br>
            </tr>
            <tr>
                <td>David C Shepherd</td>
                <td><img id="instructor-image" src="../images/David-Shepherd.jpg"/></td>
                <td>PI; SE education & research, a decade of industrial research</td>
                <td>Project management, coordination with CU, development of course projects and reference course, teaching with developed materials, lead on workshops</td>
                <td><b>Email:</b><br>shepherdd@vcu.edu<br>
                    <b>Phone:</b><br>804/827-2631<br>
            </tr>
        </table>
        </div>
    </main>
<?php require "../php-snippets/bottom_template.php"; ?>