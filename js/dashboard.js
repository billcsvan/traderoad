$(document).ready(function () {

    // Log Out 
    $("#logout").click(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "../afterlogin/logout.php",
            success: function () {
                window.location.href = "../index.php"; //
            }
        });
    });

    // Performance Chart
    $.ajax({
        type: "GET",
        url: "../includes/chart.php",
        dataType: "json",
        success: function (data) {
            console.log(data)
            Highcharts.chart('charts1', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Perfomance',
                    align: 'left'
                },
                xAxis: {
                    type: 'datetime',
                    dateTimeLabelFormats: {
                        day: '%b %e, %Y'
                    },
                    title: {
                        text: 'Time'
                    }
                },
                yAxis: {
                    title: {
                        text: 'Total Revenue'
                    }
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle'
                },
                series: [{
                    name: 'Revenue',
                    data: data,
                    tooltip: {
                        xDateFormat: '%b %e, %Y',
                        valuePrefix: '$',
                        valueDecimals: 2
                    }
                }],
                responsive: {
                    rules: [{
                        condition: {
                            maxWidth: 500
                        },
                        chartOptions: {
                            legend: {
                                layout: 'horizontal',
                                align: 'center',
                                verticalAlign: 'bottom'
                            }
                        }
                    }]
                }
            });
        },
        error: function () {
            console.log("Error fetching revenue data.");
        }
    });



    // Portfolio
    var offset = 5;
    var limit = 100;

    $(".see-more-link1").click(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "../includes/portfolio.php",
            data: { offset: offset, limit: limit },
            success: function (data) {
                console.log(data.length)
                console.log(data)
                $(".portfolio-content").append(data);
                offset += limit;
            },
            error: function () {
                console.log("Error loading portfolio.");
            }
        });
    });

    $(".sell-button-container").fadeOut();

    $(".asset").click(function () {
        var assetContainer = $(this);
        assetContainer.find(".theThing").css("opacity", 0.1);
        assetContainer.find(".sell-button-container").fadeIn();
    });

    $(".cancel-sell-button").click(function (e) {
        e.stopPropagation();
        var assetContainer = $(this).closest(".asset");
        assetContainer.find(".theThing").css("opacity", 1);
        assetContainer.find(".sell-button-container").fadeOut();
    });

    $(".sell-button").click(function () {
        var symbol = $(this).data("symbol");
        if (confirm("Are you sure you want to sell this asset?")) {
            $.ajax({
                type: "POST",
                url: "../includes/sell.php",
                data: { symbol: symbol },
                dataType: "json",
                success: function (response) {
                    alert(response.message);
                    location.reload();
                },
                error: function () {
                    alert("Error selling asset.");
                }
            });
        }
    });

    // Transactions History
    var offset2 = 5;
    var limit2 = 100;
    $(".see-more-link2").click(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "../includes/history.php",
            data: { offset: offset2, limit: limit2 },
            success: function (data) {
                $(".more-history").append(data);
                offset2 += limit2;
            },
            error: function () {
                console.log("Error loading history data.");
            }
        });
    });

    // Change Info
    $("#accountForm").submit(function (e) {
        e.preventDefault();

        var newFirstName = $("#newFirstName").val();
        var newLastName = $("#newLastName").val();
        var newEmail = $("#newEmail").val();

        $.ajax({
            type: "POST",
            url: "../includes/account.php",
            data: {
                changeInfo: true,
                newFirstName: newFirstName,
                newLastName: newLastName,
                newEmail: newEmail
            },
            success: function (response) {
                $("#response-message").html(response);
                $(".current-info").load(location.href + " .current-info");
            },
            error: function () {
                $("#response-message").html("Error changing account information.");
            }
        });
    });


    // Change Password
    $("#changePasswordForm").submit(function (e) {
        e.preventDefault();

        var oldPassword = $("#oldPassword").val();
        var newPassword = $("#newPassword").val();
        var confirmPassword = $("#confirmPassword").val();

        if (newPassword !== confirmPassword) {
            $("#passwordResponseMessage").html("New passwords do not match.");
            return;
        }

        $.ajax({
            type: "POST",
            url: "../includes/account.php",
            data: {
                changePassword: true,
                oldPassword: oldPassword,
                newPassword: newPassword
            },
            success: function (response) {
                $("#passwordResponseMessage").html(response);
            },
            error: function () {
                $("#passwordResponseMessage").html("Error changing password.");
            }
        });
    });


    // Deposit Fund
    $("#depositForm").submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "../includes/deposit.php",
            data: $("#depositForm").serialize(),
            dataType: "json",
            success: function (response) {
                if (response.success) {
                    $("#depositResponseMessage").html(response.message);
                    $(".sidebar").load(location.href + " .sidebar");
                }
            },
            error: function () {
                $("#depositResponseMessage").html("Error depositing funds.");
            }
        });
    });

    // Withdraw Funds
    $("#withdrawForm").submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "../includes/withdraw.php",
            data: $("#withdrawForm").serialize(),
            dataType: "json",
            success: function (response) {
                $("#withdrawResponseMessage").html(response.message);
                $(".sidebar").load(location.href + " .sidebar");

            },
            error: function () {
                $("#withdrawResponseMessage").html("Error withdrawing funds.");
            }
        });
    });


})