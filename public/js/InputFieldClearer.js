function clearFieldIfDefault(field) {
	if (field.classList.contains("default-field")) {
		field.value = "";
		field.classList.remove("default-field");
		field.classList.add("active-field");
	}
}