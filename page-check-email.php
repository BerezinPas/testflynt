<?php
/**
 * Template Name: Check Email
 */
use Timber\Timber;

$context = Timber::context();
$post = Timber::get_post();

// Обработка повторной отправки письма
if (isset($_POST['resend_email_verification'])) {
    $user_login = sanitize_text_field($_POST['user_login']);
    
    // Здесь добавьте логику повторной отправки письма
    // Например, через Profile Builder:
    do_action('wppb_resend_activation_email', $user_login);
    
    // Редирект с параметром resent
    wp_redirect(add_query_arg('resent', '1', $_SERVER['REQUEST_URI']));
    exit;
}

$context['post'] = $post;
$context['is_registration'] = true;
$context['password_reset'] = isset($_GET['password_reset']);
$context['resent'] = isset($_GET['resent']);
$context['user_email'] = sanitize_email($_GET['email'] ?? '');

Timber::render('templates/page-check-email.twig', $context);