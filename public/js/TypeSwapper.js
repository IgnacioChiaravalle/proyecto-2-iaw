function checkAllActive(total, toEnableID) {
	if (document.getElementsByClassName("active-field").length == total) {
		var script = document.createElement('script');
		document.body.appendChild(script);
		script.setAttribute('src', 'js/SubmitEnabler.js');
		script.onload = function() { enable(toEnableID); }
	}
}

function swapType(field) {
	if (field.type == "text")
		field.type = "password";
}