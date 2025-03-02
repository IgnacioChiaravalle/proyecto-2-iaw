<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/

	'accepted' => 'El :attribute debe ser aceptado.',
	'active_url' => 'El :attribute no es una URL válida.',
	'after' => 'El :attribute debe ser una fecha posterior a :date.',
	'after_or_equal' => 'El :attribute debe ser una fecha igual o posterior a :date.',
	'alpha' => 'El :attribute sólo puede contener letras.',
	'alpha_dash' => 'El :attribute sólo puede contener letras, números, guiones y guiones bajos.',
	'alpha_num' => 'El :attribute sólo puede contener letras y números.',
	'array' => 'El :attribute debe ser un arreglo.',
	'before' => 'El :attribute debe ser una fecha anterior a :date.',
	'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
	'between' => [
		'numeric' => 'The :attribute must be between :min and :max.',
		'file' => 'The :attribute must be between :min and :max kilobytes.',
		'string' => 'The :attribute must be between :min and :max characters.',
		'array' => 'The :attribute must have between :min and :max items.',
	],
	'boolean' => 'The :attribute field must be true or false.',
	'confirmed' => 'La confirmación de :attribute ha fallado (los campos no contienen los mismos valores).',
	'date' => 'The :attribute is not a valid date.',
	'date_equals' => 'The :attribute must be a date equal to :date.',
	'date_format' => 'The :attribute does not match the format :format.',
	'different' => 'The :attribute and :other must be different.',
	'digits' => 'The :attribute must be :digits digits.',
	'digits_between' => 'The :attribute must be between :min and :max digits.',
	'dimensions' => 'The :attribute has invalid image dimensions.',
	'distinct' => 'Hay un duplicado ya almacenado para el valor ingresado en el campo :attribute.',
	'email' => 'El atributo :attribute debe ser una dirección válida de e-mail.',
	'ends_with' => 'The :attribute must end with one of the following: :values.',
	'exists' => 'El :attribute ingresado es inválido.',
	'file' => 'The :attribute must be a file.',
	'filled' => 'The :attribute field must have a value.',
	'gt' => [
		'numeric' => 'The :attribute must be greater than :value.',
		'file' => 'The :attribute must be greater than :value kilobytes.',
		'string' => 'The :attribute must be greater than :value characters.',
		'array' => 'The :attribute must have more than :value items.',
	],
	'gte' => [
		'numeric' => 'The :attribute must be greater than or equal :value.',
		'file' => 'The :attribute must be greater than or equal :value kilobytes.',
		'string' => 'The :attribute must be greater than or equal :value characters.',
		'array' => 'The :attribute must have :value items or more.',
	],
	'image' => 'La :attribute debe ser una imagen.', //Only used on covers.
	'in' => 'The selected :attribute is invalid.',
	'in_array' => 'The :attribute field does not exist in :other.',
	'integer' => 'El :attribute debe ser un valor entero.',
	'ip' => 'The :attribute must be a valid IP address.',
	'ipv4' => 'The :attribute must be a valid IPv4 address.',
	'ipv6' => 'The :attribute must be a valid IPv6 address.',
	'json' => 'The :attribute must be a valid JSON string.',
	'lt' => [
		'numeric' => 'The :attribute must be less than :value.',
		'file' => 'The :attribute must be less than :value kilobytes.',
		'string' => 'The :attribute must be less than :value characters.',
		'array' => 'The :attribute must have less than :value items.',
	],
	'lte' => [
		'numeric' => 'The :attribute must be less than or equal :value.',
		'file' => 'The :attribute must be less than or equal :value kilobytes.',
		'string' => 'The :attribute must be less than or equal :value characters.',
		'array' => 'The :attribute must not have more than :value items.',
	],
	'max' => [
		'numeric' => 'El :attribute no puede ser mayor que :max.',
		'file' => 'El :attribute no puede ocupar más de :max kilobytes.',
		'string' => 'El :attribute no puede contener más de :max caracteres.',
		'array' => 'El :attribute no puede contener más de :max ítems.',
	],
	'mimes' => 'La :attribute debe ser un archivo de tipo: :values.',
	'mimetypes' => 'La :attribute debe ser un archivo de tipo: :values.',
	'min' => [
		'numeric' => 'El :attribute debe ser al menos :min.',
		'file' => 'El :attribute debe ocupar al menos :min kilobytes.',
		'string' => 'El :attribute debe tener al menos :min caracteres.',
		'array' => 'El :attribute debe tener al menos :min ítems.',
	],
	'not_in' => 'The selected :attribute is invalid.',
	'not_regex' => 'The :attribute format is invalid.',
	'numeric' => 'El :attribute debe ser un número.',
	'password' => 'El password ingresado es incorrecto.',
	'present' => 'The :attribute field must be present.',
	'regex' => 'El atributo :attribute tiene un máximo de dos posiciones decimales.',
	'required' => 'El campo :attribute es requerido.',
	'required_if' => 'El campo :attribute es requerido cuando :other está :value.',
	'required_unless' => 'The :attribute field is required unless :other is in :values.',
	'required_with' => 'The :attribute field is required when :values is present.',
	'required_with_all' => 'The :attribute field is required when :values are present.',
	'required_without' => 'The :attribute field is required when :values is not present.',
	'required_without_all' => 'The :attribute field is required when none of :values are present.',
	'same' => 'The :attribute and :other must match.',
	'size' => [
		'numeric' => 'The :attribute must be :size.',
		'file' => 'The :attribute must be :size kilobytes.',
		'string' => 'The :attribute must be :size characters.',
		'array' => 'The :attribute must contain :size items.',
	],
	'starts_with' => 'The :attribute must start with one of the following: :values.',
	'string' => 'En el campo :attribute debe ingresarse una cadena de texto.',
	'timezone' => 'The :attribute must be a valid zone.',
	'unique' => 'El :attribute ya está siendo usado por otro usuario.',
	'uploaded' => 'The :attribute failed to upload.',
	'url' => 'The :attribute format is invalid.',
	'uuid' => 'The :attribute must be a valid UUID.',

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => [
		'attribute-name' => [
			'rule-name' => 'custom-message',
		],
	],

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap our attribute placeholder
	| with something more reader friendly such as "E-Mail Address" instead
	| of "email". This simply helps us make our message more expressive.
	|
	*/

	'attributes' => [],

];
