function enable(btnID) {
	submitBtn = document.getElementById(btnID);
	if (submitBtn.disabled) {
		submitBtn.classList.remove("disabled-submit");
		submitBtn.classList.add("enabled-submit");
		submitBtn.disabled = false;
	}
}