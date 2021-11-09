<!-- Variable for linking stylesheet -->
<?php $PAGE_NAME = "contact"?>

<?php require "../php-snippets/top_template.php"; ?>
<?php if (!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"]) {header("Location: ../pages/home.php");} ?>
    <main id="main">
        <h1>Contact Us</h1>

        <table id="contact_us_table">
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Summary</th>
                <th>Contact Info</th>
            </tr>
            <tr>
                <td>Daqing Hou</td>
                <td><img id="instructor-image" src="../images/Daqing-Hou.gif"/></td>
                <td>I am interested in finding ways to produce better software faster, including software engineering education. This often entails empirical studies, tools building, and consideration of human factors. I am also interested in using software to solve real-world problems, for example, biometrics (with a focus on keystroke dynamics), smart housing, and smart energy.</td>
                <td>Email: dhou@clarkson.edu
                    Phone: 315/268-7675
                    Office: 127 CAMP Building
                    Mailbox: CU Box 5720</td>
            </tr>
            <tr>
                <td>Yu Liu</td>
                <td><img id="instructor-image" src="../images/Yu-Liu.jpg"/></td>
                <td>Software Engineering, Computer Architecture, High Performance Computing, Wireless Communication</td>
                <td>Email: yuliu@clarkson.edu
                    Phone: 315/268-6510         
                    Office: 166 CAMP Building
                    Mailbox: CU Box 5700</td>
            </tr>
        </table>
    </main>
<?php require "../php-snippets/bottom_template.php"; ?>