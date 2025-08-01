<?php

namespace Flynt\Components\UserFields;

use Timber\Timber;

add_filter('Flynt/addComponentData?name=UserFields', function ($data) {
    $user_id = get_current_user_id();

    $referralId = get_field('referral_id', 'user_' . $user_id);
    $telegram = get_field('telegram', 'user_' . $user_id);

    $data['referralId'] = $referralId;
    $data['telegram'] = $telegram;

    $user_form = [
        'post_id' => 'user_' . $user_id,
        'fields' => ['avatar', 'telegram', 'activity'],
        'submit_value' => 'Сохранить',
        // 'fields' => ['field_userComponents'],
        // 'post_id'       => $user_id,
        // 'form' => true,
        // 'form_attributes' => array(),
        // 'post_title'    => false,
        // //'field_groups' => array(251),
        // 'fields' => array('telegram'),
        // 'return' => add_query_arg( 'updated', 'true', get_permalink() ),
        // 'submit_value'  => __('Update Profile')
    ];

    $data['user_form'] = $user_form;
    $data['form'] = acf_form($user_form);

    return $data;
});
