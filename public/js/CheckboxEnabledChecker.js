function enableOrDisableField(checkboxClass, fieldID) {
	field = document.getElementById(fieldID);
	if (document.querySelector(checkboxClass).checked)
		setValues(
			"default-field",
			"active-field",
			"",
			"password",
			false
		);
	else
		setValues(
			"active-field",
			"default-field",
			"Password de Administrador de Empresa",
			"text",
			true
		);
}

function setValues(remove, add, value, type, disabled) {
	field.classList.remove(remove);
	field.classList.add(add);
	field.value = value;
	field.type = type;
	field.disabled = disabled;
}