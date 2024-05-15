<div id="form">
    <div id="signin" class="form">
        <h2>Login</h2>
        <form action="../login/login-process.php" method="post" id="form-login">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" placeholder="Username or Email" name="username" required>

            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" placeholder="Password" name="password" required>
                <span id="logError" class="error-msg"></span>
            </div>
            <div class="form-group">
                <input type="submit" value="Log In">
            </div>
        </form>
        <div class="form-group">
            <p>Don't have an account? <a id="reg">Sign up</a></p>
        </div>
        <div class="form-group">
            <p><a id="forgotPW">Forgot Password?</a></p>
        </div>
        <br>
        <h3 style="text-align: center;">Or</h3>
        <br>
        <!-- This doesn't work -->
        <div class="otherLogin">
            <img src="../images/google.png" alt="Sign in with google">
            <img src="../images/apple.png" alt="Sign in with apple">
            <img src="../images/github.png" alt="Sign in with github" style="width: 48px; height:48px;">
        </div>
        <!-- This doesn't work -->
        <p class="close">close</p>
    </div>
    <div id="signup" class="form">
        <h2>Sign up</h2>
        <form action="../signup/signup_process.php" method="post" id="form-signup">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="usernameReg" placeholder="Enter an username" name="username" required>
                <span id="usernameError" class="error-msg"></span>
            </div>
            <div class="form-group">
                <label for="emailReg">Email:</label>
                <input type="email" id="emailReg" placeholder="Enter your email" name="emailReg" required>
                <span id="emailError" class="error-msg"></span>
            </div>
            <div class="form-group">
                <label for="passwordReg">Password:</label>
                <input type="password" id="passwordReg" placeholder="Choose a password" name="passwordReg" required>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password:</label>
                <input type="password" id="confirmPassword" placeholder="Re-enter your password" name="confirmPassword"
                    required>
                <span id="passwordMatchError" class="error-msg"></span>
            </div>

            <h4>Information</h4>
            <div class="form-group">
                <input type="text" id="fname" placeholder="First name" name="fname" required>
                <input type="text" id="lname" placeholder="Last Name" name="lname" required>
                <label for="dob" style="margin-top: 5%;">Date of Birth:</label>
                <input type="date" id="dob" name="dob" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Sign up">
            </div>
        </form>
        <p class="close">close</p>
    </div>
    <div id="findPW" class="form">
        <h2>Find Your Password</h2>
        <form action="findPw.php" method="post" id="form-findPw">
            <div class="form-group">
                <label for="getEmail">Enter your Email:</label>
                <input type="text" id="getEmail" placeholder="example@test.ca" name="getEmail" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Send">
            </div>
        </form>
        <p class="close">close</p>
    </div>
</div>