$(document).ready(function () {
    $("#form-login").submit(function (event) {
        event.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "../login/login-process.php",
            data: formData,
            dataType: "json",
            success: function (response) {
                if (response.status === "success") {
                    window.location.href = response.redirect;
                } else {
                    $("#logError").text(response.message);
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    });
});
