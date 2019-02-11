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
