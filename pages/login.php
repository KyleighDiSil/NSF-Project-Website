<!-- Variable for linking stylesheet -->
<?php $PAGE_NAME = "login";?>

<?php require "../php-snippets/top_template.php"; ?>
    <main id="main">
        <div id="signInForm">
            <form action="../php-scripts/login.php" method="POST">
                <h1>Sign in</h1>
                <input type="text" class="" id="username" name="username" placeholder="Email" onkeyup=validateInputs()>
                <div id="password-stuff">
                    <input type="password" class="" id="password" name="password" autocomplete="off" placeholder="Password" onkeyup=validateInputs()>
                    <i class="fas fa-eye-slash" id="togglePassword" onclick="showPassword()"></i>
                </div>
                <p id="invalidLogin" style="display: none;">Wrong Email or Password</p>
                <p class="forgotPass"><a href="" class="forgotPass">Forgot Password?</a></p>
                <input type="submit" id="submit" value="Login" disabled>
                <p id="makeAccount">Or <a href="./create_account.php">Create Account</a></p>
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
    <script type="text/javascript">
        function validateInputs() {
            const email = document.querySelector('#username');
            const password = document.querySelector('#password');
            const button = document.querySelector('#submit');
            console.log("A");
            if (!emailIsValid(email.value))
            {
                button.disabled = true;
            }
            else if (password.value == "")
            {
                button.disabled = true;
            }
            else
            {
                button.disabled = false;
            }
        }

        function emailIsValid (email) {
            return /\S+@\S+\.\S+/.test(email)
        }
    </script>
    <script>
        $(document).ready(function () {
            if(window.location.href.indexOf("#LoginFailure") > -1) {
            $('#invalidLogin').show();
            } else {
            $('#invalidLogin').hide();
            }
        });
    </script>
<?php require "../php-snippets/bottom_template.php"; ?>


