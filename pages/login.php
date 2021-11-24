<!-- Variable for linking stylesheet -->
<?php $PAGE_NAME = "login";?>

<?php require "../php-snippets/top_template.php"; ?>
    <main id="main">
        <div id="login_box">
            <form action="../php-scripts/login.php" method="POST">
                <h1>Sign In</h1>
                <input type="text" id="username" name="username" placeholder="Email" >
                <div id="password-stuff">
                    <input type="password" id="password" name="password" autocomplete="off" placeholder="Password" >
                    <i class="fas fa-eye-slash" id="togglePassword" onclick="showPassword()"></i>
                </div>
                <a href="" id="links"><p>Forgot Password</p></a>
                <input type="submit" id="submit" value="Login" >
                <a href="./create_account.php" id="links"><p>Create Account</p></a>
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


