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