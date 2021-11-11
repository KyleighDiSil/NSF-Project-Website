<!-- Variable for linking stylesheet -->
<?php $PAGE_NAME = "account_management";?>

<?php require "../php-snippets/top_template.php"; ?>
<?php if (!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"]) {header("Location: ../pages/home.php");} ?>

    <main id="main">
        <h1>My Account<hr></h1>
        <p id="sign-out"><a href="../php-scripts/logout.php">Sign Out</a></p>
        <style>
        </style>
        <div id="account-info">
            <form id="personal-info" action="../php-scripts/update_account.php" method="post">
                <?php
                    include_once '../php-scripts/connect_to_database.php';

                    if (!$result = mysqli_query($conn, "SELECT FirstName, LastName, Email, University, CourseTitle, UserID FROM Users WHERE UserID = ".$_SESSION['userID'].";"))
                    {
                        echo "Error"; # CDL=> Should handle errors better
                    }
                    else
                    {
                        while ($row = $result->fetch_assoc())
                        {
                            $first = $row["FirstName"];
                            $last = $row["LastName"];
                            $email = $row["Email"];
                            $university = $row["University"];
                            $course = $row["CourseTitle"];
                        }
                    }
                ?>
                <label for="first-name">First Name</label>
                <input class="form-input" type="text" name="first-name" placeholder=<?php echo "'$first'"; ?>/>

                <label for="last-name">Last Name</label>
                <input class="form-input" type="text" name="last-name" placeholder=<?php echo "'$last'"; ?>/>

                <label for="email">Email</label>
                <input class="form-input" type="email" name="email" placeholder=<?php echo "'$email'"; ?>/>

                <label for="university">University</label>
                <input class="form-input" type="text" name="university" placeholder=<?php echo "'$university'"; ?>/>

                <label for="course">Course</label>
                <input class="form-input" type="text" name="course" placeholder=<?php echo "'$course'"; ?>/>

                <input name="save" class="btn-input" type="submit" value="Save">
                <input name="cancel" class="btn-input" type="button" value="Cancel">

            </form>
            
            <form id="update-pass" action="../php-scripts/update_password.php" method="post">
                <h2>Change Password<hr></h2>
                <input class="form-input" type="password" name="old-pass" placeholder="Current Password"/>
                <input class="form-input" type="password" name="new-pass" placeholder="New Password"/>
                <input class="form-input" type="password" name="confirm-new-pass" placeholder="Confirm New Password"/>
                <input id="change" class="btn-input" type="submit" value="Change">
            </form>

        </div>
            <?php
                if ($ACCESS > 2)
                {
                    echo "<table id='userTable' border='1'>";
                    echo "<caption>User Management</caption>";
                    echo "<tr>";
                    echo "    <th>First Name</th>";
                    echo "    <th>Last Name</th>";
                    echo "    <th>Email Address</th>";
                    echo "    <th>University</</th>";
                    echo "    <th>Course Title</th>";
                    echo "    <th>Access Level</th>";
                    echo "</tr>";

                    // Connect to the database
                    include_once '../php-scripts/connect_to_database.php';

                    $sql = "SELECT FirstName, LastName, Email, University, CourseTitle, Access FROM Users WHERE Access < $ACCESS;";

                    // Execute Query and error check
                    if (!$result = mysqli_query($conn, $sql))
                        {echo (mysqli_error($conn));}
                    else
                    {
                        if ($result->num_rows > 0)
                        {
                            while ($row = mysqli_fetch_assoc($result))
                            {
                                echo "<tr>";
                                echo "<td>".$row['FirstName']."</td>";
                                echo "<td>".$row['LastName']."</td>";
                                echo "<td>".$row['Email']."</td>";
                                echo "<td>".$row['University']."</td>";
                                echo "<td>".$row['CourseTitle']."</td>";

                                echo "<td>";
                                echo "<select name='access' id='access'>";

                                if ($ACCESS == 4)      // Admin
                                {
                                    echo "<option value='-1'".(($row['Access'] != -1) ?: 'Selected').">Pending User</option>";
                                    echo "<option value='1'".(($row['Access'] != 1)  ?: 'Selected').">Authorized User</option>";
                                    echo "<option value='2'".(($row['Access'] != 2)  ?: 'Selected').">Team Member</option>";
                                    echo "<option value='3'".(($row['Access'] != 3)  ?: 'Selected').">Webmaster</option>";
                                }
                                elseif ($ACCESS == 3)  // Webmaster
                                {
                                    echo "<option value='-1'".(($row['Access'] != -1) ?: 'Selected').">Pending User</option>";
                                    echo "<option value='1'".(($row['Access'] != 1)  ?: 'Selected').">Authorized User</option>";
                                    echo "<option value='2'".(($row['Access'] != 2)  ?: 'Selected').">Team Member</option>";
                                }
                                elseif ($ACCESS == 2)  // Team Member
                                {
                                    echo "<option value='-1'".(($row['Access'] != -1) ?: 'Selected').">Pending User</option>";
                                    echo "<option value='1'".(($row['Access'] != 1)  ?: 'Selected').">Authorized User</option>";
                                }
                                else                   // Instructor
                                {

                                }

                                echo "</select>";
                                echo "</td>";
                                echo "</tr>";
                            }
                            echo "</table><br>";
                        }
                    }
                }
            ?>
            <!-- <tr>
                <td>Kyleigh</td>
                <td>DiSilvestro</td>
                <td>disilvkj@clarkson.edu</td>
                <td>Pending</td>
                <td>
                    <select name="access" id="access">
                        <option value="User">User</option>
                        <option value="team-member">Team Member</option>
                    </select>
                </td>
                <td><input type="checkbox"/></td>
            </tr> -->
            <!-- Maybe how to create table
                http://css.insttech.washington.edu/~lab/Support/HowtoUse/php-scripts/display_table.php-->

        <div id="submit-container">
            <input id="approve" type="button" name="approve" value="Approve"/>
            <input id="delete" type="button" name="delete" value="Delete"/>
        </div>
    </main>
<?php require "../php-snippets/bottom_template.php"; ?>