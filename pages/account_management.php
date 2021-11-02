<!-- Variable for linking stylesheet -->
<!-- <?php $PAGE_NAME = "account_management";?> -->

<?php require "../php-snippets/top_template.php"; ?>
    <main id="main">
        <h1>Manage Your Account</h1>
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
                <h1>Change Password</h1>
                <input class="form-input" type="password" name="old-pass" placeholder="Current Password"/>
                <input class="form-input" type="password" name="new-pass" placeholder="New Password"/>
                <input class="form-input" type="password" name="confirm-new-pass" placeholder="Confirm New Password"/>
                <input id="change" class="btn-input" type="submit" value="Change">
            </form>

            <a href="../php-scripts/logout.php"><p>Sign Out</p></a>
        </div>
        <table id="userTable" border="1">
            <caption>Users</caption>
            <!-- <tr> makes a new row-->
            <tr>
                <!-- <th> is the title of the column-->
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Access</th>
                <th>Select</th>
            </tr>
            <tr>
                <!-- <td> is the table data -->
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
            </tr>
            <!-- Maybe how to create table
                http://css.insttech.washington.edu/~lab/Support/HowtoUse/php-scripts/display_table.php-->
        </table>

        <div id="submit-container">
            <input id="approve" type="button" name="approve" value="Approve"/>
            <input id="delete" type="button" name="delete" value="Delete"/>
        </div>
        <script>
            var accountTable = document.getElementById('userTable');
            var row = accountTable.insertRow(2);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            var cell5 = row.insertCell(4);
            var cell6 = row.insertCell(5);
            cell1.innerHTML = "New Cell";
            cell2.innerHTML = "New Cell 2";
            cell3.innerHTML = "New Cell 3";
            cell4.innerHTML = "New Cell 4";
            var access = document.createElement("select");
            var option1 = document.createElement("option");
            option1.innerHTML = "User";
            access.append(option1);
            var option2 = document.createElement("option");
            option2.innerHTML = "Team Member";
            access.append(option2);
            cell5.append(access);
            var chk = document.createElement('input');
            chk.setAttribute('type', 'checkbox');
            cell6.append(chk);
        </script>
    </main>
<?php require "../php-snippets/bottom_template.php"; ?>