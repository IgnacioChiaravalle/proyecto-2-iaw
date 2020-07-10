function clearFieldIfDefault(field) {
	if (field.classList.contains("default-field"))
		field.value = "";
}

function activateField(field) {
	if (field.classList.contains("default-field")) {
		field.classList.remove("default-field");
		field.classList.add("active-field");
	}
}