<?php
return [
    'adminEmail' => 'admin@example.com',
	'maskMoneyOptions' => [
        'prefix' => html_entity_decode('&#x52;&#x70;. '),
        'suffix' => '',
        'affixesStay' => true,
        'thousands' => '.',
        'decimal' => ',',
        'precision' => 2, 
        'allowZero' => true,
        'allowNegative' => false,
    ]
];
