<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
*/
if (post_password_required()) return;

if (!comments_open()) return;

?>

<div class="cdi-comments">
<?php

if (have_comments()) {
    ?>
    <div class="cdi-comments-list">
        <?php
        wp_list_comments(array(
            'style' => 'ul',
            'type' => 'comment',
            'callback' => 'get_comments_list'
        ));
        ?>
    </div>
    <?php
}

?>
    <div class="cdi-comments-post">
        <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
            <textarea name="comment" placeholder="说点什么吧..."></textarea>
            <?php
            global $current_user;
            wp_get_current_user();
            ?>
            <input type="hidden" name="email" value="<?php echo $current_user->user_email; ?>" />
            <input type="hidden" name="author" value="<?php echo $current_user->display_name; ?>" />
            <?php comment_id_fields(); ?>
            <div class="cdi-comments-post-btn">
                <div class="cdi-comments-post-btn-submit">提交</div>
                <div class="cdi-comments-post-btn-cancel">取消</div>
            </div>
        </form>
    </div>
</div>


