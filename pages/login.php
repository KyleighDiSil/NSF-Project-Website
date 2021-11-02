<!-- Variable for linking stylesheet -->
<?php $PAGE_NAME = "login";?>

<?php require "../php-snippets/top_template.php"; ?>
    <main id="main">
        <div>
            <form action="../php-scripts/login.php" method="POST">
                <label id="usernameLabel" for="username">Username:</label>
                <input type="text" id="username" name="username" autocomplete="off">
                <label id="passwordLabel" for="password">Password:</label>
                <input type="password" id="password" name="password" autocomplete="off">
                <div id="lower">
                    <div id="showPassbox">
                        <input type="checkbox" id="checkShowPass" onclick="showPass()">
                        <label id="showPassLabel" for="checkShowPass">Show Password</label>
                    </div>
                    <input type="submit" id="submit" value="Login">
                </div>
            </form>
        </div>
    </main>
    <script src="http://code.jquery.com/jquery-2.1.4.js"></script>
    <script type="text/javascript">
        function showPass() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
<?php require "../php-snippets/bottom_template.php"; ?>


