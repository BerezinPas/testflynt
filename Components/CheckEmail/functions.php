<?php

namespace Flynt\Components\CheckEmail;

add_filter('Flynt/addComponentData?name=CheckEmail', function ($data) {
    // Параметры из URL
    $data['isPasswordReset'] = isset($_GET['password_reset']);
    $data['resent'] = isset($_GET['resent']);
    $data['user_email'] = sanitize_email($_GET['email'] ?? ''); // Безопасное получение email
    
    return $data;
});