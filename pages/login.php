<!-- Variable for linking stylesheet -->
<?php $PAGE_NAME = "login";?>

<?php require "../php-snippets/top_template.php"; ?>
    <main id="main">
        <div id="signInForm">
            <form action="../php-scripts/login.php" method="POST">
                <h1>Sign in</h1>
                <input type="text" id="username" name="username" placeholder="Email" >
                <div id="password-stuff">
                    <input type="password" id="password" name="password" autocomplete="off" placeholder="Password" >
                    <i class="fas fa-eye-slash" id="togglePassword" onclick="showPassword()"></i>
                </div>
                <p class="forgotPass"><a href="" class="forgotPass">Forgot Password?</a></p>
                <input type="submit" id="submit" value="Login" >
                <p id="makeAccount">Or Create <a href="./create_account.php">Account</a></p>
            </form>
        </div>
    </main>
    <script src="http://code.jquery.com/jquery-2.1.4.js"></script>
    <script type="text/javascript">
        function showPassword() {
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#password');
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            if (togglePassword.getAttribute("class") == "fas fa-eye-slash")
            {
                togglePassword.setAttribute("class", "fas fa-eye");
            }
            else
            {
                togglePassword.setAttribute("class", "fas fa-eye-slash");
            }
        }
    </script>
<?php require "../php-snippets/bottom_template.php"; ?>


