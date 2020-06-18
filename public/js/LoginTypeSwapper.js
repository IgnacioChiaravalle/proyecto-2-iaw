function checkBothActive() {
	if (document.getElementsByClassName("active-field").length == 2) {
		var script = document.createElement('script');
		document.body.appendChild(script);
		script.setAttribute('src', 'js/SubmitEnabler.js');
		script.onload = function() { enable("submit-btn-login"); }
	}
}

function swapType(field) {
	if (field.type == "text")
		field.type = "password";
}