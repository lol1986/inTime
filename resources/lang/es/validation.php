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
    'active_url' => ':attribute no es una URL válida.',
    'after' => ':attribute debe ser una fecha posterior a :date.',
    'after_or_equal' => ':attribute debe ser una fecha posterior o igual a :date.',
    'alpha' => ':attribute debe contener solamente letras.',
    'alpha_dash' => ':attribute debe contener solamente, numeros, guiones y guiones bajos.',
    'alpha_num' => ':attribute debe contener solamente letra y números.',
    'array' => ':attribute debe ser un array.',
    'before' => ':attribute debe ser una fecha anterior a :date.',
    'before_or_equal' => ':attribute debe ser una fecha anterior o igual a :date.',
    'between' => [
        'numeric' => ':attribute debe tener entre :min y :max.',
        'file' => ':attribute debe tener entre :min y :max kilobytes.',
        'string' => ':attribute debe tener entre :min y :max carácteres.',
        'array' => ':attribute debe tener entre :min y :max elementos.',
    ],
    'boolean' => 'El campo :attribute debe ser true o false.',
    'confirmed' => 'La confirmación de :attribute no coincide.',
    'date' => ':attribute no es una fecha válida.',
    'date_equals' => ':attribute debe ser una fecha igual a :date.',
    'date_format' => ':attribute no coincide con el formato :format.',
    'different' => ':attribute y :other deben ser diferentes.',
    'digits' => ':attribute debe tener :digits dígitos.',
    'digits_between' => ':attribute debe tener entre :min y :max dígitos.',
    'dimensions' => ':attribute dimesión de imagen no válida.',
    'distinct' => 'El campo :attribute tiene un valor duplicado.',
    'email' => 'El campo :attribute debe contener una dirección de email válida.',
    'ends_with' => 'El campo :attribute debe terminar con uno de los siguientes valores: :values.',
    'exists' => ':attribute no es válido.',
    'file' => ':attribute debe ser un archivo.',
    'filled' => 'El campo :attribute debe tener valor.',
    'gt' => [
        'numeric' => ':attribute debe ser mayor de :value.',
        'file' => ':attribute debe ser mayor de :value kilobytes.',
        'string' => ':attribute debe tener más de :value caráteres.',
        'array' => ':attribute debe tener más de :value elementos.',
    ],
    'gte' => [
        'numeric' => ':attribute debe ser mayor o igual que :value.',
        'file' => ':attribute debe ser mayor o igual de :value kilobytes.',
        'string' => ':attribute debe tener un número de carácteres mayor o igual a :value.',
        'array' => 'The :attribute must have :value items or more.',
    ],
    'image' => ':attribute debe ser una imagen.',
    'in' => ':attribute seleccionado no es válido.',
    'in_array' => 'El campo :attribute no existe en :other.',
    'integer' => ':attribute debe ser un entero.',
    'ip' => ':attribute debe ser una dirección IP válida.',
    'ipv4' => ':attribute debe ser una dirección IPv4 válida.',
    'ipv6' => ':attribute debe ser una dirección IPv6 válida.',
    'json' => ':attribute debe tener un formato JSON válido.',
    'lt' => [
        'numeric' => ':attribute debe ser menor que :value.',
        'file' => ':attribute debe tener menos de :value kilobytes.',
        'string' => ':attribute debe tener menos de :value carácteres.',
        'array' => ':attribute debe tener menos de :value elementos.',
    ],
    'lte' => [
        'numeric' => ':attribute debe ser menor o igual que :value.',
        'file' => ':attribute debe tener un número de kilobytes menor o igual a :value.',
        'string' => ':attribute debe tener un número de carácteres igual o menor a :value.',
        'array' => ':attribute no debe tener más de :value elementos.',
    ],
    'max' => [
        'numeric' => ':attribute no debe ser mayor de :max.',
        'file' => ':attribute no debe tener más de :max kilobytes.',
        'string' => ':attribute no debe tener más de :max carácteres.',
        'array' => ':attribute no debe tener más de :max items.',
    ],
    'mimes' => ':attribute debe ser un fichero de tipo: :values.',
    'mimetypes' => ':attribute debe ser un fichero de tipo: :values.',
    'min' => [
        'numeric' => ':attribute debe ser al menos :min.',
        'file' => ':attribute debe tener al menos :min kilobytes.',
        'string' => ':attribute debe tener al menos :min carácteres.',
        'array' => ':attribute debe tener al menos :min elementos.',
    ],
    'not_in' => 'El :attribute no es válido.',
    'not_regex' => 'El formato de :attribute no es válido.',
    'numeric' => ':attribute debe ser numérico.',
    'password' => 'La contraseña es incorrecta.',
    'present' => 'El campo :attribute debe estar presente.',
    'regex' => 'El formato de :attribute no es válido.',
    'required' => 'El :attribute es obligatorio.',
    'required_if' => 'El campo :attribute es obligatorio cuando el valor de :other es :value.',
    'required_unless' => 'El campo :attribute es obligatorio a menos que :other esté en los valores :values.',
    'required_with' => 'El campo :attribute es obligatorio cuando hay :values.',
    'required_with_all' => 'El campo :attribute es obligatorio cuando los valores :values existen.',
    'required_without' => 'El campo :attribute es obligatorio cuando los valores :values no existen.',
    'required_without_all' => 'El campo :attribute es obligatorio cuando ninguno de los valores :values existe.',
    'same' => ':attribute y :other tienen que coincidir.',
    'size' => [
        'numeric' => ':attribute debe tener una longitud de :size.',
        'file' => ':attribute debe tener un peso de :size kilobytes.',
        'string' => ':attribute debe tener una longitud de :size carácteres.',
        'array' => ':attribute debe contener :size elementos.',
    ],
    'starts_with' => ':attribute debe comenzar por uno de los siguientes valores: :values.',
    'string' => ':attribute debe ser una cadena.',
    'timezone' => ':attribute debe ser una zona válida.',
    'unique' => ':attribute ya se ha usado.',
    'uploaded' => ':attribute no se pudo cargar.',
    'url' => 'El formato de :attribute no es válido.',
    'uuid' => ':attribute debe ser un UUID válido.',

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
