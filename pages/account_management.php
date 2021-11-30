<!-- Variable for linking stylesheet -->
<?php $PAGE_NAME = "account_management";?>

<?php require "../php-snippets/top_template.php"; ?>
<?php if (!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"]) {header("Location: ../pages/home.php");} ?>

    <main id="main">
        <h1>My Account | <a href="../php-scripts/logout.php"><span id="sign-out">sign out</span></a><hr></h1>
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
                <h2 style="text-align: center;">Personal Information</h2>

                <label for="first-name">First Name</label>
                <input class="form-input" id="first-name" type="text" name="first-name" placeholder=<?php echo "'$first'"; ?>/>

                <label for="last-name">Last Name</label>
                <input class="form-input" id="last-name" type="text" name="last-name" placeholder=<?php echo "'$last'"; ?>/>

                <label for="email">Email</label>
                <input class="form-input" id="email" type="email" name="email" placeholder=<?php echo "'$email'"; ?>/>

                <label for="university">University</label>
                <input class="form-input" id="university" type="text" name="university" placeholder=<?php echo "'$university'"; ?>/>

                <label for="course">Course</label>
                <input class="form-input" id="course" type="text" name="course" placeholder=<?php echo "'$course'"; ?>/>

                <input id="save" name="save" class="btn-input" type="submit" value="Save">
                <input id="cancel" name="cancel" class="btn-input" type="button" value="Cancel">

            </form>

            <form id="update-pass" action="../php-scripts/update_password.php" method="post">
                <h2>Change Password</h2>
                <input class="form-input" type="password" name="old-pass" placeholder="Current Password"/>
                <input class="form-input" type="password" name="new-pass" placeholder="New Password"/>
                <input class="form-input" type="password" name="confirm-new-pass" placeholder="Confirm New Password"/>
                <input id="change" class="btn-input" type="submit" value="Change">
            </form>

        </div>
            <?php
                if ($ACCESS > 2)
                {
                    echo "<form action='../php-scripts/update_users.php' id='user-table' method='POST'>";
                    echo "<table id='userTable' border='1'>";
                    echo "<caption>User Management</caption>";
                    echo "<tr>";
                    echo "    <th>First Name</th>";
                    echo "    <th>Last Name</th>";
                    echo "    <th>Email Address</th>";
                    echo "    <th>University</</th>";
                    echo "    <th>Course Title</th>";
                    echo "    <th>Access Level</th>";
                    echo "    <th>Select</th>";
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
                                echo "<td>".$row['Email']."<input id='email' type='hidden' name='email[]' value='".$row['Email']."'/></td>";
                                echo "<td>".$row['University']."</td>";
                                echo "<td>".$row['CourseTitle']."</td>";

                                echo "<td>";
                                echo "<select name='access[]' id='access'>";

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

                                echo "<td><input type='hidden' name='checkbox[]' value='no'><input type='checkbox' id='checkbox' name='checkbox[]' value='Yes'></td>";

                                echo "</tr>";
                            }
                            echo "</table><br>";
                        }
                    }

                    echo "<div id='submit-container'>";
                    echo "<input id='approve' type='submit' name='approve' value='Approve'/>";
                    echo "<input id='delete' type='submit' name='delete' value='Delete'/>";
                    echo "</div>";
                    echo "</form>";
                }
            ?>
    </main>
<?php require "../php-snippets/bottom_template.php"; ?>