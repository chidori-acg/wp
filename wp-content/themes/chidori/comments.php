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
</div>

