<?php

return [

    /*
    |--------------------------------------------------------------------------
    | 驗證 語言列
    |--------------------------------------------------------------------------
    |
    | 以下語言列包含驗證程式類別所使用的預設錯誤訊息。
    | 其中一些規則具有多個版本，例如字元長度與大小。
    | 請隨意調整這些訊息。
    |
    */

    'accepted' => '必須接受 :attribute。',
    'accepted_if' => '當 :other 為 :value 時，必須接受 :attribute。',
    'active_url' => ':attribute 必須是可使用的URL地址',
    'after' => ':attribute 必須是在 :date 之後的日期',
    'after_or_equal' => ':attribute 的日期必須晚於或等於:date。',
    'alpha' => ':attribute 只能包含英文字母',
    'alpha_dash' => ':attribute 只能包含英文字母，數字和-',
    'alpha_num' => ':attribute 只能包含英文字母和數字',
    'array' => ':attribute 必須是陣列',
    'before' => ':attribute 必須是在 :date. 之前的日期',
    'before_or_equal' => ':attribute 的日期必須早於或等於 :date。',
    'between' => [
        'array' => ':attribute 包含的長度必須介於 :min 至 :max 個之間',
        'file' => ':attribute 大小必須介於 :min kb 至 :max kb 之間',
        'numeric' => ':attribute 必須介於 :min 至 :max 之間',
        'string' => ':attribute 長度必須介於 :min 至 :max 之間',
    ],
    'boolean' => ':attribute 必須是 true 或 false',
    'confirmed' => ':attribute 必須一致',
    'current_password' => '密碼不正確。',
    'date' => ':attribute 不是有效的日期',
    'date_equals' => ':attribute 必須是等於 :date 的日期。',
    'date_format' => ':attribute 必須符合格式 :format',
    'declined' => '必須拒絕 :attribute',
    'declined_if' => '當 :other 為 :value 時必須拒絕 :attribute。',
    'different' => ':attribute 與 :other 必須不同',
    'digits' => ':attribute 必須是 :digits 位數',
    'digits_between' => ':attribute 的位數必須介於 :min 與 :max 之間',
    'dimensions' => ':attribute 具有無效的圖片尺寸。',
    'distinct' => ':attribute 已存在',
    'doesnt_end_with' => ':attribute 不能以下列之一結尾：:values.',
    'doesnt_start_with' => ':attribute 不能以下列之一開頭：:values.',
    'email' => ':attribute 必須是有效的電子郵件位址',
    'ends_with' => ':attribute 必須以下列之一結尾：:values.',
    'enum' => '所選的 :attribute 無效。',
    'exists' => ':attribute 須存在',
    'file' => ':attribute 必須是檔案。',
    'filled' => ':attribute 為必填',
    'gt'=> [
        'array' => ':attribute 必須有多個 :value 個項目。',
        'file' => ':attribute 必須大於 :value KB。',
        'numeric' => ':attribute 必須大於:value。',
        'string' => ':attribute 必須大於 :value 個字元。',
    ],
    'gte' => [
        'array' => ':attribute 必須有 :value 個項目或更多。',
        'file' => ':attribute 必須大於或等於 :value KB。',
        'numeric' => ':attribute 必須大於或等於:value。',
        'string' => ':attribute 必須大於或等於 :value 個字元。',
    ],
    'image' => ':attribute 必須是圖片',
    'in' => ':attribute 不是有效值',
    'in_array' => ':attribute 不存在於 :other',
    'integer' => ':attribute 必須是整數',
    'ip' => ':attribute 必須是有效的 IP 位址',
    'ipv4' => ':attribute 必須是有效的 IPv4 地址。',
    'ipv6' => ':attribute 必須是有效的 IPv6 地址。',
    'json' => ':attribute 必須是有效的 JSON 字串',
    'lowercase' => ':attribute 必須是小寫。',
    'lt' => [
        'array' => ':attribute 必須小於 :value 項目。',
        'file' => ':attribute 必須小於 :value KB。',
        'numeric' => ':attribute 必須小於 :value.',
        'string' => ':attribute 必須小於 :value 個字元。',
    ],
    'lte' => [
        'array' => ':attribute 不能超過 :value 項目。',
        'file' => ':attribute 必須小於或等於 :value KB。',
        'numeric' => ':attribute 必須小於或等於:value。',
        'string' => ':attribute 必須小於或等於 :value 個字元。',
    ],
    'mac_address' => ':attribute 必須是有效的 MAC 地址。',
    'max' => [
        'array' => ':attribute 不能包含超過 :max 個',
        'file' => ':attribute 的大小不能超過 :max KB',
        'numeric' => ':attribute 不能大於 :max',
        'string' => ':attribute 不能超過 :max 個字元',
    ],
	'max_digits' => 'The :attribute must not have more than :max digits.',
    'mimes' => ':attribute 必須是一個 :values 檔案',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'array' => ':attribute 必須至少有 :min 個',
        'file' => ':attribute 的大小不能小於 :min kb',
        'numeric' => ':attribute 不能小於 :min',
        'string' => ':attribute 必須至少 :min 個字元',
    ],
    'min_digits' => 'The :attribute must have at least :min digits.',
    'multiple_of' => 'The :attribute must be a multiple of :value.',
    'not_in' => ':attribute 是無效值',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => ':attribute 必須是數字',
    'password' => [
        'letters' => 'The :attribute must contain at least one letter.',
        'mixed' => 'The :attribute must contain at least one uppercase and one lowercase letter.',
        'numbers' => 'The :attribute must contain at least one number.',
        'symbols' => 'The :attribute must contain at least one symbol.',
        'uncompromised' => 'The given :attribute has appeared in a data leak. Please choose a different :attribute.',
    ],
    'present' => ':attribute 必須出現',
    'prohibited' => 'The :attribute field is prohibited.',
    'prohibited_if' => 'The :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'The :attribute field is prohibited unless :other is in :values.',
    'prohibits' => 'The :attribute field prohibits :other from being present.',																			   
    'regex' => ':attribute 格式無效',
    'required' => ':attribute 為必填',
    'required_array_keys' => 'The :attribute field must contain entries for: :values.',	
    'required_if' => '當 :other 是 :value時，:attribute 為必填',
	'required_if_accepted' => 'The :attribute field is required when :other is accepted.',
    'required_unless' => '除非 :other 在 :values 之中，:attribute 為必填',
    'required_with' => '當 :values 出現時，:attribute 為必填',
    'required_with_all' => '當 :values 出現時，:attribute 為必填',
    'required_without' => '當 :values 沒有出現時，:attribute 為必填',
    'required_without_all' => '當 :values 沒有出現時，:attribute 為必填',
    'same' => ':attribute 與 :other 須相符',
    'size' => [
        'array' => ':attribute 必須包含 :size 個',
        'file' => ':attribute 必須是 :size kb',
        'numeric' => ':attribute 必須是 :size',
        'string' => ':attribute 必須有 :size 個字元',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values.',																					 
    'string' => ':attribute 必須是字串',
    'timezone' => ':attribute 必須是有效的時區',
    'unique' => ':attribute 已存在',
    'uploaded' => 'The :attribute failed to upload.',
    'uppercase' => 'The :attribute must be uppercase.',
    'url' => ':attribute 必須是有效的url',
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
