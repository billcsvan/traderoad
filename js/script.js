$(document).ready(function () {
    const container = $(".container");
    const forms = $(".form");

    // Show a form and hide other forms and the container
    function showForm(formId) {
        forms.not(formId).fadeOut();
        container.fadeOut();
        $(formId).fadeIn().css("display", "block");
    }

    // Show login form
    $("#login").on("click", function () {
        showForm("#signin");
        $("#username").focus();
    });

    // Show password recovery form
    $("#forgotPW").on("click", function () {
        showForm("#findPW");
        $("#getEmail").focus();
    });

    // Show signup form
    $("#reg").on("click", function () {
        showForm("#signup");
        $("#username").focus();
    });

    // Show signup form from footer
    $('#footerSignup').on("click", function () {
        showForm("#signup");
        $("#username").focus();
    });

    // Close a form and show the container
    $(".close").on("click", function () {
        forms.fadeOut();
        container.fadeIn();
    });

    // Form validation for login form
    $("#form-login").submit(function (event) {
        const username = $("#username").val();
        const password = $("#password").val();

        if (username.trim() === "" || password.trim() === "") {
            event.preventDefault();
            alert("Please enter both username/email and password.");
        }
    });
});
