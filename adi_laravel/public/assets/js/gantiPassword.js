$(document).ready(function() {
    $(".toggle-password").click(function() {
        var passwordInput = $(this).siblings("input[type='password']");
        if (passwordInput.attr("type") === "password") {
            passwordInput.attr("type", "text");
        } else {
            passwordInput.attr("type", "password");
        }
    });
});