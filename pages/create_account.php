<!-- Variable for linking stylesheet -->
<?php $PAGE_NAME = "create_account"?>

<?php require "../php-snippets/top_template.php"; ?>
    <main id="main">
        <div id="create_account">
            <form action="../php-scripts/create_account.php" method="POST">
                <h1>Create Account</h1>
                <input type="text" id="firstName" name="firstName" placeholder="First Name" onkeyup="validateInputs()">

                <input type="text" id="lastName" name="lastName" placeholder="Last Name" onkeyup="validateInputs()">

                <input type="text" id="email" name="email" placeholder="Email" onkeyup="validateInputs()">

                <input type="text" id="university" name="university" placeholder="University" onkeyup="validateInputs()">

                <input type="text" id="course" name="course" placeholder="Course" onkeyup="validateInputs()">

                <div id="password-stuff">
                    <input type="password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  autocomplete="off" placeholder="Password" onkeyup="validatePasswords();validateInputs()">
                    <i class="fas fa-eye-slash" id="togglePassword" onclick="showPassword()"></i>
                </div>

                <div id="password-stuff">
                    <input type="password" id="passwordConfirmation" name="passwordConfirmation" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  autocomplete="off" placeholder="Password Confirmation" onkeyup="validatePasswords();validateInputs()">
                    <i class="fas fa-eye-slash" id="togglePasswordConfirmation" onclick="showPasswordConfirmation()"></i>
                </div>

                <div id="message">
                    <h4>Password Validation:</h4>
                    <p id="letter"  class="invalid">A <b>lowercase</b> letter</p>
                    <p id="capital" class="invalid">A <b>uppercase</b> letter</p>
                    <p id="number"  class="invalid">A <b>number</b></p>
                    <p id="length"  class="invalid">Minimum <b>8 characters</b></p>
                    <p id="match"   class="invalid">Passwords <b>match</b></p>
                </div>

                <input type="submit" id="submit" value="Create Account" disabled>
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
        function showPasswordConfirmation() {
            const togglePassword = document.querySelector('#togglePasswordConfirmation');
            const password = document.querySelector('#passwordConfirmation');
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
        var password = document.getElementById("password");
        var passwordConfirmation = document.getElementById("passwordConfirmation");
        var letter = document.getElementById("letter");
        var capital = document.getElementById("capital");
        var number = document.getElementById("number");
        var length = document.getElementById("length");
        var match = document.getElementById("match");

        // When the user starts to type something inside the password field
        function validatePasswords() {
            // Validate lowercase letters
            var lowerCaseLetters = /[a-z]/g;
            if(password.value.match(lowerCaseLetters)) {
                letter.classList.remove("invalid");
                letter.classList.add("valid");
            } else {
                letter.classList.remove("valid");
                letter.classList.add("invalid");
            }

            // Validate capital letters
            var upperCaseLetters = /[A-Z]/g;
            if(password.value.match(upperCaseLetters)) {
                capital.classList.remove("invalid");
                capital.classList.add("valid");
            } else {
                capital.classList.remove("valid");
                capital.classList.add("invalid");
            }

            // Validate numbers
            var numbers = /[0-9]/g;
            if(password.value.match(numbers)) {
                number.classList.remove("invalid");
                number.classList.add("valid");
            } else {
                number.classList.remove("valid");
                number.classList.add("invalid");
            }

            // Validate length
            if(password.value.length >= 8) {
                length.classList.remove("invalid");
                length.classList.add("valid");
            } else {
                length.classList.remove("valid");
                length.classList.add("invalid");
            }

            // Validate password match
            if(password.value == passwordConfirmation.value) {
                match.classList.remove("invalid");
                match.classList.add("valid");
            } else {
                match.classList.remove("valid");
                match.classList.add("invalid");
            }
        }
    </script>
    <script type="text/javascript">
        function validateInputs() {
            // Full input validation
            var firstName = document.getElementById("firstName");
            var lastName = document.getElementById("lastName");
            var email = document.getElementById("email");
            var university = document.getElementById("university");
            var course = document.getElementById("course");
            var password = document.getElementById("password");
            var passwordConfirmation = document.getElementById("passwordConfirmation");

            var letter = document.getElementById("letter");
            var capital = document.getElementById("capital");
            var number = document.getElementById("number");
            var length = document.getElementById("length");
            var match = document.getElementById("match");
            var submit = document.getElementById("submit");

            if ((firstName.value == "" ||
                lastName.value == "" ||
                email.value == "" ||
                university.value == "" ||
                course.value == "" ||
                letter.classList.contains("invalid") ||
                capital.classList.contains("invalid") ||
                number.classList.contains("invalid") ||
                length.classList.contains("invalid") ||
                match.classList.contains("invalid")
            ))
            {
                submit.disabled = true;
            }
            else
            {
                submit.disabled = false;
            }
        }
    </script>
<?php require "../php-snippets/bottom_template.php"; ?>