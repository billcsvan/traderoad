
$(document).ready(function () {
    $("#form-signup").submit(function (event) {
        // Prevent the form from submitting
        event.preventDefault();

        // Clear any previous error messages
        $(".error-msg").text("");

        // Perform validation
        var isValid = true;

        // Validate username
        var username = $("#usernameReg").val();
        if (username.length < 5 || username > 12) {
            $("#usernameError").text("Username greater than 5 and less than 12");
            isValid = false;
        }

        // Validate email
        var email = $("#emailReg").val();
        var emailPattern = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/;
        if (!emailPattern.test(email)) {
            $("#emailError").text("Email is required.");
            isValid = false;
        }

        // Validate password confirmation
        var password = $("#passwordReg").val();
        var confirmPassword = $("#confirmPassword").val();
        if (confirmPassword === "") {
            $("#passwordMatchError").text("Please confirm your password.");
            isValid = false;
        } else if (password !== confirmPassword) {
            $("#passwordMatchError").text("Passwords do not match.");
            isValid = false;
        }

        // If all validations pass, submit the form via Ajax
        if (isValid) {
            $.ajax({
                type: "POST",
                url: "../signup/signup_process.php",
                data: $(this).serialize(),
                success: function (response) {
                    alert(response);
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        }
    });
});