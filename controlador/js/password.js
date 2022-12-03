const form = document.getElementById('form');
const password = document.getElementById('password');
const password2 = document.getElementById('password2');

form.addEventListener('submit', e => {
	e.preventDefault();
	
	checkInputs();
});

function checkInputs() {
	// trim to remove the whitespaces
	const passwordValue = password.value.trim();
	const password2Value = password2.value.trim();
	
		
	if(passwordValue === '') {
		setErrorFor(password, 'Password no debe ingresar en blanco.');
	} else {
		setSuccessFor(password);
	}
	
	if(password2Value === '') {
		setErrorFor(password2, 'Password2 no debe ngresar en blanco');
	} else if(passwordValue !== password2Value) {
		setErrorFor(password2, 'Passwords no coinciden');
	} else{
		setSuccessFor(password2);
	}
}

function setErrorFor(input, message) {
	const pass = input.parentElement;
	const small = pass.querySelector('small');
	pass.className = 'pass error';
	small.innerText = message;
}

function setSuccessFor(input) {
	const pass = input.parentElement;
	pass.className = 'pass success';
}

