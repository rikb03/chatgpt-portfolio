function error(errorMessage) {
    const error = document.getElementsByClassName("error");
    for (let i = 0; i < error.length; i++) {
    error[i].style.display = '';
    error[i].textContent = errorMessage;
    }
}