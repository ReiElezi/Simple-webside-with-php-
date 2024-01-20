<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>logIn</title>
    <link rel="stylesheet" href="css/login.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <div class="container mt-5" id="loginContainer">
        <h2 class="infoo">Login</h2>
        <form id="loginForm" onsubmit="return validateForm()"  action="login_process.php" method="post">
            <!-- Your login form fields -->
            <label class="infoo" for="email">Email</label>
            <input type="text" id="email" name="email" placeholder="Enter your email" required>
            <label class="infoo" for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
            <input id="btn" type="submit" value="Login">
            <a class="singup" href="#" onclick="toggleForms()">Sign Up</a>
            <div class="btn-row">
                <button class="btn-google">
                    <i class="material-icons ">account_circle</i>
                </button>
                <button class="btn-facebook">
                    <i class="material-icons">facebook</i>
                </button>
            </div>
        </form>
    </div>

    <div class="container mt-5" id="signupContainer" style="display: none;">
        <h2 class="infoo">Sign Up</h2>
        <form id="signupForm" onsubmit="return validateSignup()" action="register.php" method="post">

            <label class="infoo" for="signupFirstName">First Name</label>
            <input type="text" id="signupFirstName" name="signupFirstName" placeholder="Enter your First name" required>

            <label class="infoo" for="signupLastName">Last Name</label>
            <input type="text" id="signupLastName" name="signupLastName" placeholder="Enter your Last name" required>

            <label class="infoo" for="signupEmail">Email</label><br>
            <input type="email" id="signupEmail" name="signupEmail" placeholder="Enter your email" required>
            <br>

            <label class="infoo" for="signupPassword">Password</label>
            <input type="password" id="signupPassword" name="signupPassword" placeholder="Enter your password" required>

            <label class="infoo" for="role">Role</label>
            <input type="text" id="role" name="role" placeholder="Enter your role in this web" required>

            <input id="signupBtn" type="submit" value="Sign Up">
            <a href="#" onclick="toggleForms()">Back to Login</a>
        </form>
    </div>
</body>
</html>

<script>
    function validateForm() {
        let username = document.getElementById("username").value;
        let password = document.getElementById("password").value;

        // Perform simple validation (e.g., check if fields are not empty)
        if (username.trim() === "" || password.trim() === "") {
            alert("Please enter both username and password.");
            return false;
        }
        // You can add further validation or connect to a backend for authentication here

        return true; // Allow form submission
    };

    function toggleForms() {
        var loginContainer = document.getElementById("loginContainer");
        var signupContainer = document.getElementById("signupContainer");

        if (loginContainer.style.display === "block") {
            loginContainer.style.display = "none";
            signupContainer.style.display = "block";
        } else {
            loginContainer.style.display = "block";
            signupContainer.style.display = "none";
        }
    }



</script>