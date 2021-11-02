<?php
    include_once '../php/connect_to_database.php';

    session_start();
    $STATUS = false;
    $ACCESS = 0;
    if ($_SESSION["loggedin"])
    {
        $STATUS = true;
        if (!$result = mysqli_query($conn, "SELECT Access from Users where UserID = " .$_SESSION['userID']. ";"))
        {
            echo "Error";
        }
        else
        {
            while ($row = $result->fetch_assoc())
            {
            $ACCESS = $row["Access"];
            }
        }
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xfig</title>
    <link rel="icon" href="../images/NSF_logo.png">
    <link rel="stylesheet" href="../css/account_management.css"/>
    <link rel="stylesheet" href="../css/common.css"/>
    <!--Font Awesome is where you can get all kinds of different Fonts to use in websites and icons-->
    <script src="https://use.fontawesome.com/1c8abdfb6d.js"></script>
    <script src="https://kit.fontawesome.com/3247a548fe.js" crossorigin="anonymous"></script>
    <script src="../JS/main.js"></script>
</head>

<body>
    <header id="header" class="header">
        <nav>
            <a href="../index.php"><img id="logo" src="../images/NSF_logo.png" alt="logo"></a>
            <div class="nav-links">
                <ul>
                    <!--We would make a html file for each href-->
                    <li><a href="course.html">Course</a></li>
                    <li><a href="projectList.html">Project List</a></li>
                    <li><a href="contact.html">Contact Us</a></li>
                    <li><a href="review.html">Reviews</a></li>
                    <?php if ($STATUS) {echo "<li><a href='html/account_manage.php'>Manage Account</a></li>";} else {echo "<li><a href='html/login.html'>Login</a></li>";} ?>
                </ul>
            </div>
        </nav>
    </header>

    <main id="main">
        <h1>Manage Your Account</h1>
        <style>
        </style>
        <div id="account-info">
            <form id="personal-info" method="post">
                <label for="first-name">First Name</label>
                <input class="form-input" type="text" name="first-name" placeholder="current-fname"/>
                
                <label for="last-name">Last Name</label>
                <input class="form-input" type="text" name="last-name" placeholder="current-lname"/>
                
                <label for="email">Email</label>
                <input class="form-input" type="email" name="email" placeholder="current-email"/>
                
                <label for="university">University</label>
                <input class="form-input" type="text" name="university" placeholder="current-univ"/>
                
                <label for="course">Course</label>
                <input class="form-input" type="text" name="course" placeholder="current-course">
                
                <input id="save" class="btn-input" type="button" value="Save"> 
                <input id="cancel" class="btn-input" type="button" value="Cancel">
                <input id="sign-out" class="btn-input" type="button" value="Sign Out">
            </form>
            <form id="update-pass">
                <h1>Change Password</h1>
                <input class="form-input" type="password" name="old-pass" placeholder="Current Password"/>
                <input class="form-input" type="password" name="new-pass" placeholder="New Password"/>
                <input class="form-input" type="password" name="confirm-new-pass" placeholder="Confirm New Password"/>
                <input id="change" class="btn-input" type="button" value="Change">
            </form>
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
                http://css.insttech.washington.edu/~lab/Support/HowtoUse/PHP/display_table.html-->
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

    <footer>
        <div class="social-links">
            <ul>
                <li class="social-items"><a href="https://linkedin.com/in/kyleigh-disilvestro-8aa044191" style="color: #0072b1;"><i class="fab fa-linkedin"></i></a></li>
                <li class="social-items"><a href="#" style="color: 	#1DB954;"><i class="fab fa-spotify"></i></a></li>
            </ul>
        </div>
        <div class="footer-links">
            <ul>
                <li><a href="#header">Return to Top</a></li>
                <li><a href="contact.html">Contact Us</a></li>
            </ul>
        </div>

        <p id="Copyright">Copyright &copy; <script>document.write(new Date().getFullYear());</script></p>
    </footer>
</body>

<?php  
    if(isset($_POST['sign-out'])) {
        $_SESSION['loggedin'] = false;
        header("Location: ../index.php");
    }
    else
    {
        echo "Nothing";
    }
?>

</html>
