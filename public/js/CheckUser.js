function clearFieldIfDefault(field) {
	if (field.classList.contains("default-field")) {
		field.value = "";
		field.classList.remove("default-field");
		field.classList.add("active-field");
		checkBothActive();
	}
}

function checkBothActive() {
	if (document.getElementsByClassName("active-field").length == 2) {
		submitBtn = document.getElementById("submit-btn");
		submitBtn.classList.remove("disabled-submit");
		submitBtn.classList.add("enabled-submit");
		submitBtn.disabled = false;
	}
}

function swapType(field) {
	if (field.type == 'text')
		field.type = 'password';
}