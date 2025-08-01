<div class="restricted-comments">
  <?php if (have_comments()) : ?>
    <h3 class="comments-title">
      <?php
      printf(
        _nx('1 комментарий', '%1$s комментариев', get_comments_number(), 'flynt'),
        number_format_i18n(get_comments_number())
      );
      ?>
    </h3>
    
    <ol class="comment-list">
      <?php wp_list_comments(['callback' => 'Flynt\Components\RestrictedComments\customComment']); ?>
    </ol>
  <?php endif; ?>

  <?php if (comments_open()) : ?>
    <?php if (is_user_logged_in()) : ?>
      <div class="comment-form-wrapper">
        <?php
        comment_form([
          'title_reply' => __('Оставить комментарий', 'flynt'),
          'label_submit' => __('Отправить', 'flynt'),
          'class_submit' => 'comment-submit',
          'comment_field' => '<div class="form-group"><textarea id="comment" name="comment" required></textarea></div>'
        ]);
        ?>
      </div>
    <?php else : ?>
      <div class="comment-login-notice">
        <p><?php _e('Только зарегистрированные пользователи могут оставлять комментарии.', 'flynt'); ?></p>
        <?php wp_login_form(['redirect' => get_permalink()]); ?>
        <p><a href="<?php echo wp_registration_url(); ?>"><?php _e('Зарегистрироваться', 'flynt'); ?></a></p>
      </div>
    <?php endif; ?>
  <?php else : ?>
    <p class="comments-closed"><?php _e('Комментарии закрыты.', 'flynt'); ?></p>
  <?php endif; ?>
</div>