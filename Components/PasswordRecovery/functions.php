<?php

namespace Flynt\Components\PasswordRecovery;

use Flynt\Utils\Options;

add_filter('Flynt/addComponentData?name=PasswordRecovery', function ($data) {

    return $data;
});

Options::addTranslatable('PasswordRecovery', [
    [
        'label' => __('Title', 'flynt'),
        'name' => 'title',
        'type' => 'text',
        'default_value' => __('Password recovery', 'flynt')
    ],
    [
        'label' => __('Text', 'flynt'),
        'name' => 'text',
        'type' => 'text',
        'default_value' => __("Enter the information you provided during registration. If you don't remember them, write to technical support.", 'flynt')
    ],
]);
