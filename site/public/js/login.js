// Shower the login form and hide the sign up form
function showLoginForm() {
    document.getElementById('loginForm').style.display = '';
    document.getElementById('signUpForm').style.display = 'none';
    document.title = 'Login';
}
// Show the sign up form and hide the login form
function showSignUpForm() {
    document.getElementById('loginForm').style.display = 'none';
    document.getElementById('signUpForm').style.display = '';
    document.title = 'Sign Up';
}
// On error, show the login form and display the error message
function errorLogin(errorMessage) {
    document.getElementById('errorLogin').style.display = '';
    document.getElementById('errorLogin').textContent = errorMessage;
}
// On error, show the sign up form and display the error message
function errorSignup(errorMessage) {
    showSignUpForm();
    document.getElementById('errorSignup').style.display = '';
    document.getElementById('errorSignup').textContent = errorMessage;
}