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

    'accepted' => 'يجب قبول حقل :attribute.',
    'accepted_if' => 'يجب قبول حقل :attribute عندما يكون :other هو :value.',
    'active_url' => 'حقل :attribute يجب أن يكون عنوان URL صالح.',
    'after' => 'يجب أن يكون حقل :attribute تاريخًا بعد :date.',
    'after_or_equal' => 'يجب أن يكون حقل :attribute تاريخًا بعد أو يساوي :date.',
    'alpha' => 'يجب أن يحتوي حقل :attribute على أحرف فقط.',
    'alpha_dash' => 'يجب أن يحتوي حقل :attribute على أحرف وأرقام وشرطات وشرطات سفلية فقط.',
    'alpha_num' => 'يجب أن يحتوي حقل :attribute على أحرف وأرقام فقط.',
    'array' => 'يجب أن يكون حقل :attribute مصفوفة.',
    'ascii' => 'يجب أن يحتوي حقل :attribute على أحرف أبجدية أحادية بايت ورموز فقط.',
    'before' => 'يجب أن يكون حقل :attribute تاريخًا قبل :date.',
    'before_or_equal' => 'يجب أن يكون حقل :attribute تاريخًا قبل أو يساوي :date.',
    'between' => [
        'array' => 'يجب أن يحتوي حقل :attribute على بين :min و :max عنصرًا.',
        'file' => 'يجب أن يكون حجم حقل :attribute بين :min و :max كيلوبايت.',
        'numeric' => 'يجب أن يكون حقل :attribute بين :min و :max.',
        'string' => 'يجب أن يكون حقل :attribute بين :min و :max حرفًا.',
    ],
    'boolean' => 'يجب أن يكون حقل :attribute صحيحًا أو خاطئًا.',
    'confirmed' => 'حقل :attribute التأكيد غير مطابق.',
    'current_password' => 'كلمة المرور غير صحيحة.',
    'date' => 'يجب أن يكون حقل :attribute تاريخًا صحيحًا.',
    'date_equals' => 'يجب أن يكون حقل :attribute تاريخًا مساويًا لـ :date.',
    'date_format' => 'يجب أن يتوافق حقل :attribute مع الشكل :format.',
    'decimal' => 'يجب أن يحتوي حقل :attribute على :decimal أماكن عشرية.',
    'declined' => 'يجب أن يكون حقل :attribute مرفوضًا.',
    'declined_if' => 'يجب أن يكون حقل :attribute مرفوضًا عندما يكون :other هو :value.',
    'different' => 'يجب أن يكون حقل :attribute مختلفًا عن :other.',
    'digits' => 'يجب أن يكون حقل :attribute :digits أرقام.',
    'digits_between' => 'يجب أن يكون حقل :attribute بين :min و :max أرقام.',
    'dimensions' => 'حقل :attribute يحتوي على أبعاد صورة غير صحيحة.',
    'distinct' => 'حقل :attribute يحتوي على قيمة مكررة.',
    'doesnt_end_with' => 'يجب أن لا ينتهي حقل :attribute بأحد القيم التالية: :values.',
    'doesnt_start_with' => 'يجب أن لا يبدأ حقل :attribute بأحد القيم التالية: :values.',
    'email' => 'يجب أن يكون حقل :attribute عنوان بريد إلكتروني صحيح.',
    'ends_with' => 'يجب أن ينتهي حقل :attribute بأحد القيم التالية: :values.',
    'enum' => 'القيمة المحددة لـ :attribute غير صحيحة.',
    'exists' => 'القيمة المحددة لـ :attribute غير صحيحة.',
    'file' => 'يجب أن يكون حقل :attribute ملفًا.',
    'filled' => 'يجب أن يحتوي حقل :attribute على قيمة.',
    'gt' => [
    'array' => 'يجب أن يحتوي حقل :attribute على أكثر من :value عنصر.',
    'file' => 'يجب أن يكون حقل :attribute أكبر من :value كيلوبايت.',
    'numeric' => 'يجب أن يكون حقل :attribute أكبر من :value.',
    'string' => 'يجب أن يكون حقل :attribute أكبر من :value حرفًا.',
    ],
    'gte' => [
    'array' => 'يجب أن يحتوي حقل :attribute على :value عنصر أو أكثر.',
    'file' => 'يجب أن يكون حقل :attribute أكبر من أو يساوي :value كيلوبايت.',
    'numeric' => 'يجب أن يكون حقل :attribute أكبر من أو يساوي :value.',
    'string' => 'يجب أن يكون حقل :attribute أكبر من أو يساوي :value حرفًا.',
    ],
    'image' => 'يجب أن يكون حقل :attribute صورة.',
    'in' => 'القيمة المحددة لـ :attribute غير صحيحة.',
    'in_array' => 'يجب أن يحتوي حقل :attribute على قيمة موجودة في :other.',
    'integer' => 'يجب أن يكون حقل :attribute عددًا صحيحًا.',
    'ip' => 'يجب أن يكون حقل :attribute عنوان IP صحيحًا.',
    'ipv4' => 'يجب أن يكون حقل :attribute عنوان IPv4 صحيحًا.',
    'ipv6' => 'يجب أن يكون حقل :attribute عنوان IPv6 صحيحًا.',
    'json' => 'يجب أن يكون حقل :attribute سلسلة JSON صحيحة.',
    'lowercase' => 'يجب أن يكون حقل :attribute في حالة صغيرة.',
    'lt' => [
    'array' => 'يجب أن يحتوي حقل :attribute على أقل من :value عنصر.',
    'file' => 'يجب أن يكون حقل :attribute أقل من :value كيلوبايت.',
    'numeric' => 'يجب أن يكون حقل :attribute أقل من :value.',
    'string' => 'يجب أن يكون حقل :attribute أقل من :value حرفًا.',
    ],
    'lte' => [
    'array' => 'يجب ألا يحتوي حقل :attribute على أكثر من :value عنصر.',
    'file' => 'يجب أن يكون حقل :attribute أقل من أو يساوي :value كيلوبايت.',
    'numeric' => 'يجب أن يكون حقل :attribute أقل من أو يساوي :value.',
    'string' => 'يجب أن يكون حقل :attribute أقل من أو يساوي :value حرفًا.',
    ],
    'mac_address' => 'يجب أن يكون حقل :attribute عنوان MAC صحيحًا.',
    'max' => [
    'array' => 'يجب ألا يحتوي حقل :attribute على أكثر من :max عنصر.',
    'file' => 'يجب أن يكون حقل :attribute أقل من :max كيلوبايت.',
    'numeric' => 'يجب أن يكون حقل :attribute أقل من :max.',
    'string' => 'يجب ألا يتجاوز حقل :attribute عدد الحروف :max.',
    ],
    'max_digits' => 'يجب ألا يحتوي حقل :attribute على أكثر من :max أرقام.',
    'mimes' => 'يجب أن يكون حقل :attribute ملفًا من النوع: :values.',
    'mimetypes' => 'يجب أن يكون حقل :attribute ملفًا من النوع: :values.',
    'min' => [
    'array' => 'يجب أن يحتوي حقل :attribute على الأقل على :min عنصر.',
    'file' => 'يجب أن يكون حقل :attribute على الأقل :min كيلوبايت.',
    'numeric' => 'يجب أن يكون حقل :attribute على الأقل :min.',
    'string' => 'يجب أن يكون حقل :attribute على الأقل :min حرفًا.',
    ],
    'min_digits' => 'يجب أن يحتوي حقل :attribute على الأقل :min أرقام.',
    'missing' => 'يجب أن يكون حقل :attribute مفقودًا.',
    'missing_if' => 'يجب أن يكون حقل :attribute مفقودًا عندما يكون :other هو :value.',
    'missing_unless' => 'يجب أن يكون حقل :attribute مفقودًا ما لم يكن :other هو :value.',
    'missing_with' => 'يجب أن يكون حقل :attribute مفقودًا عندما يكون :values موجودًا.',
    'missing_with_all' => 'يجب أن يكون حقل :attribute مفقودًا عندما يكون :values موجودًا.',
    'multiple_of' => 'يجب أن يكون حقل :attribute مضاعفًا للقيمة :value.',
    'not_in' => 'القيمة المحددة لحقل :attribute غير صالحة.',
    'not_regex' => 'تنسيق حقل :attribute غير صالح.',
    'numeric' => 'يجب أن يكون حقل :attribute رقمًا.',
    'password' => [
        'letters' => 'يجب أن يحتوي حقل :attribute على حرف واحد على الأقل.',
        'mixed' => 'يجب أن يحتوي حقل :attribute على حرف كبير وحرف صغير على الأقل.',
        'numbers' => 'يجب أن يحتوي حقل :attribute على رقم واحد على الأقل.',
        'symbols' => 'يجب أن يحتوي حقل :attribute على رمز واحد على الأقل.',
        'uncompromised' => 'قيمة :attribute المعطاة قد ظهرت في تسريب بيانات. يرجى اختيار قيمة مختلفة لـ :attribute.',
    ],
    'present' => 'يجب أن يكون حقل :attribute موجودًا.',
    'prohibited' => 'حقل :attribute محظور.',
    'prohibited_if' => 'حقل :attribute محظور عندما يكون :other هو :value.',
    'prohibited_unless' => 'حقل :attribute محظور ما لم يكن :other موجودًا في :values.',
    'prohibits' => 'حقل :attribute يمنع وجود :other.',
    'regex' => 'تنسيق حقل :attribute غير صالح.',
    'required' => 'حقل :attribute مطلوب',
    'required_array_keys' => 'يجب أن يحتوي حقل :attribute على مدخلات لـ :values.',
'required_if' => 'يجب أن يكون حقل :attribute مطلوبًا عندما يكون :other هو :value.',
'required_if_accepted' => 'يجب أن يكون حقل :attribute مطلوبًا عندما يتم قبول :other.',
'required_unless' => 'يجب أن يكون حقل :attribute مطلوبًا ما لم يكن :other موجودًا في :values.',
'required_with' => 'يجب أن يكون حقل :attribute مطلوبًا عندما يكون :values موجودًا.',
'required_with_all' => 'يجب أن يكون حقل :attribute مطلوبًا عندما يكون :values موجودًا.',
'required_without' => 'يجب أن يكون حقل :attribute مطلوبًا عندما لا يكون :values موجودًا.',
'required_without_all' => 'يجب أن يكون حقل :attribute مطلوبًا عندما لا يكون أيًا من :values موجودًا.',
'same' => 'يجب أن يتطابق حقل :attribute مع :other.',
'size' => [
'array' => 'يجب أن يحتوي حقل :attribute على :size عنصرًا.',
'file' => 'يجب أن يكون حجم حقل :attribute :size كيلوبايت.',
'numeric' => 'يجب أن يكون حقل :attribute بحجم :size.',
'string' => 'يجب أن يكون حقل :attribute بطول :size أحرف.',
],
'starts_with' => 'يجب أن يبدأ حقل :attribute بأحد القيم التالية: :values.',
'string' => 'يجب أن يكون حقل :attribute نصًا.',
'timezone' => 'يجب أن يكون حقل :attribute منطقة زمنية صالحة.',
'unique' => 'قيمة :attribute مُستخدمة بالفعل.',
'uploaded' => 'فشل تحميل حقل :attribute.',
'uppercase' => 'يجب أن يكون حقل :attribute بحروف كبيرة.',
'url' => 'يجب أن يكون حقل :attribute عنوان URL صالحًا.',
'ulid' => 'يجب أن يكون حقل :attribute ULID صالحًا.',

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