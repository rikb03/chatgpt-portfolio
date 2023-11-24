// This is used on the login, password change, edit page to show error messages
// Makes error messages visible and sets the error message text.
function error(errorMessage, className = "error") {
    const error = document.getElementsByClassName(className);
    for (let i = 0; i < error.length; i++) {
    error[i].style.display = '';
    error[i].textContent = errorMessage;
    }
}