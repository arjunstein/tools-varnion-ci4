// Get Started

// Get ID Form
var loginForm = $("#loginForm");
var usernameError = $("#usernameError");
var passwordError = $("#passwordError");
var submitError = $("#submit");

// Function Username / Logic
$("#username").focus(function () {
    var username = $("#username").val();

    if (username.length == 0) {
        $("#username").attr("class", "is-invalid form-control");
        usernameError.attr("class", "invalid-feedback ml-1");
        usernameError.html("Username cannot be empty!");
        submitError.attr("disabled", true);
    } else {
    }
});
// Validation Form Username
function validationUsername() {
    var username = $("#username").val();

    if (
        username.length == 0 ||
        username == "" ||
        username == " " ||
        username == "  " ||
        username == "   " ||
        username == "   " ||
        username == "    " ||
        username == "     " ||
        username == "      " ||
        username == "       " ||
        username == "        " ||
        username == "         " ||
        username == "          "
    ) {
        $("#username").attr("class", "is-invalid form-control");
        usernameError.attr("class", "invalid-feedback ml-1");
        usernameError.html("Username cannot be empty!");
        submitError.attr("disabled", true);

        return false;
    }

    submitError.removeAttr("disabled");
    $("#username").attr("class", "is-valid form-control");
    usernameError.attr("class", "valid-feedback ml-1");
    usernameError.html("");
}
// Function Password / Logic
$("#password").focus(function () {
    var password = $("#password").val();

    if (password.length == 0) {
        $("#password").attr("class", "is-invalid form-control");
        passwordError.attr("class", "invalid-feedback ml-1");
        passwordError.html("Password cannot be empty!");
        submitError.attr("disabled", true);
    } else {
    }
});
// Validation Password Form
function validationPassword() {
    var password = $("#password").val();

    if (
        password.length == 0 ||
        password == "" ||
        password == " " ||
        password == "  " ||
        password == "   " ||
        password == "   " ||
        password == "    " ||
        password == "     " ||
        password == "      " ||
        password == "       " ||
        password == "        " ||
        password == "         " ||
        password == "          "
    ) {
        $("#password").attr("class", "is-invalid form-control");
        passwordError.attr("class", "invalid-feedback ml-1");
        passwordError.html("Password cannot be empty!");
        submitError.attr("disabled", true);

        return false;
    }

    // if (password.length <= 6) {
    //     $("#password").attr("class", "is-invalid form-control");
    //     passwordError.attr("class", "invalid-feedback ml-1");
    //     passwordError.html("Password minimal 6 karakter!");
    //     submitError.attr("disabled", true);

    //     return false;
    // }

    submitError.removeAttr("disabled");
    $("#password").attr("class", "is-valid form-control");
    passwordError.attr("class", "valid-feedback ml-1");
    passwordError.html("");
}
