<!-- Variable for linking stylesheet -->
<?php $PAGE_NAME = "create_account"?>

<?php require "../php-snippets/top_template.php"; ?>
    <main id="main">
        <div>
            <form action="../php-scripts/create_account.php" method="POST">
                <label id="firstNameLabel" for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName">

                <label id="lastNameLabel" for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName">

                <label id="emailLabel" for="email">Email Address:</label>
                <input type="text" id="email" name="email">

                <label id="universityLabel" for="university">University:</label>
                <input type="text" id="university" name="university">

                <label id="courseLabel" for="course">Course:</label>
                <input type="text" id="course" name="course">

                <label id="passwordLabel" for="password">Password:</label>
                <input type="password" id="password" name="password">
                <div id="showPassbox">
                    <input type="checkbox" id="checkShowPass" onclick="showPass()">
                    <label id="showPassLabel" for="checkShowPass">Show Password</label>
                </div>
                <label id="passwordConfirmationLabel" for="passwordConfirmation">Confirm Password:</label>
                <input type="passwordConfirmation" id="passwordConfirmation" name="passwordConfirmation">

                <input type="submit" id="submit" value="Create Account">

            </form>
            <div class="rightpw" style="display: none;">
                    <span onclick="this.parentElement.style.display='none';">&times;</span>
                    Valid Username and Password!
            </div>

            <div class="wrongpw">
                    <span onclick="this.parentElement.style.display='none';">&times;</span>
                    Incorrect Password or Username!
            </div>
        </div>
    </main>
<?php require "../php-snippets/bottom_template.php"; ?>