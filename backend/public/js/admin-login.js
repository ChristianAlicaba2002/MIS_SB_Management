function ShowPassword() {
    const password = document.querySelector('#password');
    const showpassword = document.querySelector('#showpassword');

    if (password.type === 'password') {
        password.type = 'text';
        showpassword.classList.add('show');
    } else {
        password.type = 'password';
        showpassword.classList.remove('show');
    }
}

document.querySelector('.form-controller').addEventListener('submit', function () {
    document.getElementById('loader').style.display = 'flex';
});
