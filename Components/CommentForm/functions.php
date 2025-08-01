<?php
namespace Flynt\Components\CommentForm;

function customComment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment; ?>
    
    <li <?php comment_class('comment-item'); ?> id="comment-<?php comment_ID(); ?>">
        <div class="comment-avatar">
            <?php echo get_avatar($comment, 60); ?>
        </div>
        
        <div class="comment-body">
            <div class="comment-meta">
                <span class="comment-author"><?php comment_author(); ?></span>
                <span class="comment-date">
                    <?php printf(__('%1$s в %2$s'), get_comment_date(), get_comment_time()); ?>
                </span>
            </div>
            
            <div class="comment-content">
                <?php comment_text(); ?>
            </div>
        </div>
    </li>
<?php }