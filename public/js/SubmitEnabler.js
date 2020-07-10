function enable(toEnableID) {
	submitElement = document.getElementById(toEnableID);
	if (submitElement.disabled) {
		submitElement.classList.remove("disabled-submit");
		submitElement.classList.add("enabled-submit");
		submitElement.disabled = false;
	}
}