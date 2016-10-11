<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Polje following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'Polje :attribute mora biti prihvaćeno.',
    'active_url'           => 'Polje :attribute nije validan URL.',
    'after'                => 'Polje :attribute mora biti datum poslije :date.',
    'alpha'                => 'Polje :attribute može sadržati samo slova.',
    'alpha_dash'           => 'Polje :attribute može sadržati samo slova, brojeve i crtice.',
    'alpha_num'            => 'Polje :attribute može sadržati samo slova i brojeve.',
    'array'                => 'Polje :attribute mora biti niz.',
    'before'               => 'Polje :attribute mora biti datum prije :date.',
    'between'              => [
        'numeric' => 'Polje :attribute mora biti između :min i :max.',
        'file'    => 'Polje :attribute mora biti između :min i :max kilobajta.',
        'string'  => 'Polje :attribute mora biti između :min i :max karaktera.',
        'array'   => 'Polje :attribute mora imati između :min i :max elemenata.',
    ],
    'boolean'              => 'Polje :attribute field must be true or false.',
    'confirmed'            => 'Polje :attribute se ne poklapa.',
    'date'                 => 'Polje :attribute nije validan datum.',
    'date_format'          => 'Polje :attribute does not match the format :format.',
    'different'            => 'Polje :attribute and :other must be different.',
    'digits'               => 'Polje :attribute must be :digits digits.',
    'digits_between'       => 'Polje :attribute must be between :min and :max digits.',
    'dimensions'           => 'Polje :attribute has invalid image dimensions.',
    'distinct'             => 'Polje :attribute field has a duplicate value.',
    'email'                => 'Polje :attribute mora biti validna email adresa.',
    'exists'               => 'Polje selected :attribute is invalid.',
    'file'                 => 'Polje :attribute mora biti fajl.',
    'filled'               => 'Polje :attribute field is required.',
    'image'                => 'Polje :attribute mora biti slika.',
    'in'                   => 'Polje selected :attribute is invalid.',
    'in_array'             => 'Polje :attribute field does not exist in :other.',
    'integer'              => 'Polje :attribute mora biti cijeli broj.',
    'ip'                   => 'Polje :attribute must be a valid IP address.',
    'json'                 => 'Polje :attribute must be a valid JSON string.',
    'max'                  => [
        'numeric' => 'Polje :attribute ne može biti veće od :max.',
        'file'    => 'Polje :attribute ne može biti veće od :max kilobajta.',
        'string'  => 'Polje :attribute ne može biti veće od :max karaktera.',
        'array'   => 'Polje :attribute may not have more than :max items.',
    ],
    'mimes'                => 'Polje :attribute mora biti tipa: :values.',
    'mimetypes'            => 'Polje :attribute mora biti fajl tipa: :values.',
    'min'                  => [
        'numeric' => 'Polje :attribute mora biti najmanje :min.',
        'file'    => 'Polje :attribute mora biti najmanje :min kilobajta.',
        'string'  => 'Polje :attribute mora biti najmanje :min karaktera.',
        'array'   => 'Polje :attribute mora sadržati najmanje :min elemenata.',
    ],
    'not_in'               => 'Polje selected :attribute is invalid.',
    'numeric'              => 'Polje :attribute must be a number.',
    'present'              => 'Polje :attribute field must be present.',
    'regex'                => 'Polje :attribute format is invalid.',
    'required'             => 'Polje :attribute je obavezno.',
    'required_if'          => 'Polje :attribute field is required when :other is :value.',
    'required_unless'      => 'Polje :attribute field is required unless :other is in :values.',
    'required_with'        => 'Polje :attribute field is required when :values is present.',
    'required_with_all'    => 'Polje :attribute field is required when :values is present.',
    'required_without'     => 'Polje :attribute field is required when :values is not present.',
    'required_without_all' => 'Polje :attribute field is required when none of :values are present.',
    'same'                 => 'Polje :attribute i :other se moraju poklapati.',
    'size'                 => [
        'numeric' => 'Polje :attribute mora biti :size.',
        'file'    => 'Polje :attribute mora biti :size kilobajta.',
        'string'  => 'Polje :attribute mora biti :size karaktera.',
        'array'   => 'Polje :attribute must contain :size items.',
    ],
    'string'               => 'Polje :attribute must be a string.',
    'timezone'             => 'Polje :attribute must be a valid zone.',
    'unique'               => ':attribute je već zauzet.',
    'username'             => 'Polje :attribute može sadržati samo slova, brojeve, crte i tačke',
    'uploaded'             => 'Polje :attribute failed to upload.',
    'url'                  => 'Polje :attribute ima loš format.',

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
    | Polje following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'password' => 'Lozinka',
        'password_confirmation' => 'Ponovi lozinku',
        'first_name' => 'Ime',
        'last_name' => 'Prezime',
        'username' => 'Korisničko ime',
        'email' => 'Email',
        'uploads.*' => 'Prilog'
    ],

];
