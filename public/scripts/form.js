let but = document.querySelector('#js');
let reg = document.querySelectorAll('.reg');
but.addEventListener('click', register);
function register(){
	h = document.querySelector('h1')
	console.log(h)
	reg.forEach(element => {
		element.style.display = 'block'
	});
	document.querySelector('input.button').name = 'register'
	h.innerText = "Регистрация"
}