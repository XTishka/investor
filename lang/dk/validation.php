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

    'accepted' => ':attribute skal accepteres.',
    'accepted_if' => ':attribute skal accepteres når :other er :value.',
    'active_url' => ':attribute er ikke en gyldig URL.',
    'after' => ':attribute skal være en dato efter :date.',
    'after_or_equal' => ':attribute skal være en dato efter eller lig med :date.',
    'alpha' => ':attribute må kun indeholde bogstaver.',
    'alpha_dash' => ':attribute må kun indeholde bogstaver, numre, tankestreger og underscores.',
    'alpha_num' => ':attribute må kun indeholde bogstaver og tal.',
    'array' => ':attribute skal være en sekvens.',
    'before' => ':attribute skal være en dato før :date.',
    'before_or_equal' => ':attribute skal være en dato før og lig med :date.',
    'between' => [
        'array' => ':attribute skal være mellem :min og :max antal.',
        'file' => ':attribute skal være mellem :min og :max kilobytes.',
        'numeric' => ':attribute skal være mellem :min og :max.',
        'string' => ':attribute skal være mellem :min og :max karakterer.',
    ],
    'boolean' => ':attribute feltet skal være sandt eller falsk.',
    'confirmed' => ':attribute bekræftelsen matcher ikke.',
    'current_password' => 'Kodeordet er forkert.',
    'date' => ':attribute er ikke en gyldig dato.',
    'date_equals' => ':attribute skal være en dato som er lig med :date.',
    'date_format' => ':attribute matcher ikke formatet :format.',
    'declined' => ':attribute blev afvist.',
    'declined_if' => ':attribute bliver afvist når :other er :value.',
    'different' => ':attribute og :other skal være forskellige.',
    'digits' => ':attribute skal være :digits tal.',
    'digits_between' => ':attribute skal være mellem :min og :max tal.',
    'dimensions' => ':attribute har ugyldige billede dimensioner.',
    'distinct' => ':attribute feltet en duplikeret værdi.',
    'email' => ':attribute skal være en gyldig e-mail adresse.',
    'ends_with' => ':attribute skal slutte med en af følgende: :values.',
    'enum' => 'Den valgte :attribute er ikke gyldigt.',
    'exists' => 'Den valgte :attribute er ugyldig.',
    'file' => ':attribute skal være en fil.',
    'filled' => ':attribute feltet skal have en værdi.',
    'gt' => [
        'array' => ':attribute skal have flere end :value elementer.',
        'file' => ':attribute skal være større end :value kilobytes.',
        'numeric' => ':attribute skal være større end :value.',
        'string' => ':attribute skal være flere end :value karakterer.',
    ],
    'gte' => [
        'array' => ':attribute skal have :value elementer eller flere.',
        'file' => ':attribute skal være større end eller lig med :value kilobytes.',
        'numeric' => ':attribute skal være større eller lig med :value.',
        'string' => ':attribute skal være større end eller lig med :value karakterer.',
    ],
    'image' => ':attribute skal være et billede.',
    'in' => 'Den valgte :attribute er ugyldig.',
    'in_array' => ':attribute feltet eksiterer ikke i :other.',
    'integer' => ':attribute skal være et helt tal.',
    'ip' => ':attribute skal være en gyldig IP adresse.',
    'ipv4' => ':attribute skal være en gyldig IPv4 adresse.',
    'ipv6' => ':attribute skal være en gyldig IPv6 adresse.',
    'json' => ':attribute skal være en gyldig JSON string.',
    'lt' => [
        'array' => ':attribute skal have mindre end :value elementer.',
        'file' => ':attribute skal være mindre end :value kilobytes.',
        'numeric' => ':attribute skal være mindre end :value.',
        'string' => ':attribute skal være mindre end :value karakterer.',
    ],
    'lte' => [
        'array' => ':attribute må ikke have flere end :value elementer.',
        'file' => ':attribute skal være mindre end eller lig med :value kilobytes.',
        'numeric' => ':attribute skal være mindre end eller lig med :value.',
        'string' => ':attribute skal være mindre end eller lig med :value karakterer.',
    ],
    'mac_address' => ':attribute skal være en gyldig MAC adresse.',
    'max' => [
        'array' => ':attribute må ikke have flere end :max elementer.',
        'file' => ':attribute må ikke være størrer end :max kilobytes.',
        'numeric' => ':attribute må ikke være større end :max.',
        'string' => ':attribute må ikke være flere end :max karakterer.',
    ],
    'mimes' => ':attribute skal være af filtypen: :values.',
    'mimetypes' => ':attribute skal være af filtypen: :values.',
    'min' => [
        'array' => ':attribute skal have mindst :min elementer.',
        'file' => ':attribute skal være mindst :min kilobytes.',
        'numeric' => ':attribute skal være mindst :min.',
        'string' => ':attribute skal være mindst :min karakterer.',
    ],
    'multiple_of' => ':attribute skal gå op i :value.',
    'not_in' => 'Den valgte :attribute er ugyldig.',
    'not_regex' => ':attribute formatet er ugyldigt.',
    'numeric' => ':attribute skal være et nummer.',
    'present' => ':attribute feltet skal være tilstede.',
    'prohibited' => ':attribute feltet er forbudt.',
    'prohibited_if' => ':attribute feltet er forbudt når :other er :value.',
    'prohibited_unless' => ':attribute feltet er forbudt medmindre at :other er :values.',
    'prohibits' => ':attribute feltet forhindrer :other fra at være tilstede.',
    'regex' => ':attribute formatet er ugyldigt.',
    'required' => ':attribute feltet skal udfyldes.',
    'required_array_keys' => ':attribute feltet skal indeholde data for: :values.',
    'required_if' => ':attribute feltet er krævet når :other er :value.',
    'required_unless' => ':attribute feltet er krævet med mindre at :other er :values.',
    'required_with' => ':attribute feltet er krævet når :values er tilstede.',
    'required_with_all' => ':attribute feltet er krævet når :values er tilstede.',
    'required_without' => ':attribute feltet er krævet når :values ikke er tilstede.',
    'required_without_all' => ':attribute feltet er krævet når ingen af :values er tilstede.',
    'same' => ':attribute og :other skal være ens.',
    'size' => [
        'array' => ':attribute skal indeholde :size elementer.',
        'file' => ':attribute skal være :size kilobytes.',
        'numeric' => ':attribute skal være :size.',
        'string' => ':attribute skal være :size karakterer.',
    ],
    'starts_with' => ':attribute skal begynde med en af følgende: :values.',
    'string' => ':attribute skal være en værdi.',
    'timezone' => ':attribute skal være en gyldig tidszone.',
    'unique' => ':attribute er allerede blevet taget.',
    'uploaded' => ':attribute fejlede ved upload.',
    'url' => ':attribute skal være en gyldigt URL.',
    'uuid' => ':attribute skal være en gyldig UUID.',

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
