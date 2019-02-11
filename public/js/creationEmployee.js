function displayDiv(id){
	var divElement = document.getElementById(id);

	if(divElement.style.display == 'none') {
		divElement.style.display = 'block';
	}
}

function hideDiv(id){
	var divElement = document.getElementById(id);

	if(divElement.style.display == 'block') {
		divElement.style.display = 'none';
	}
}

(function() {
	'use strict';
	window.addEventListener('load', function() {
		var forms = document.getElementsByClassName('needs-validation');
		var validation = Array.prototype.filter.call(forms, function(form) {
			form.addEventListener('submit', function(event) {
				if (form.checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				}
				form.classList.add('was-validated');
			}, false);
		});
	}, false);
})();