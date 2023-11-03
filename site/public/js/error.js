function error(errorMessage, className = "error") {
    const error = document.getElementsByClassName(className);
    for (let i = 0; i < error.length; i++) {
    error[i].style.display = '';
    error[i].textContent = errorMessage;
    }
}