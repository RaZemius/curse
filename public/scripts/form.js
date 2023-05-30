let but = document.querySelector('#js');
let reg = document.querySelectorAll('.reg');
but.addEventListener('click', register);
var enter = false

function register() {
    enter = !enter
    console.log(enter)
    if (enter) {
        document.querySelector('#login').placeholder = "ник"
        document.querySelector('h1').innerText = "Регистрация"
        reg.forEach(element => {
            element.style.display = 'block'
        });
        document.querySelector('.divider').style.display = "block"
        document.querySelector('input.button').name = 'register'
        document.querySelector('input.button').value = "создать"

        but.innerHTML = 'вход'
    } else {
        document.querySelector('#login').placeholder = "ник или почта"
        document.querySelector('h1').innerText = "вход"
        reg.forEach(element => {
            element.style.display = 'none'
        });
        but.innerHTML = 'регистрация'
        document.querySelector('.divider').style.display = "block"
        document.querySelector('input.button').name = 'enter'
        document.querySelector('input.button').value = "войти"

    }

}