<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>

<div class="cdi-container">
    <?php while (have_posts()) {
        the_post();
        global $post ?>
        <div class="cdi-single">
            <div class="cdi-single-post">
                <div class="cdi-single-post-title">
                    <?php echo $post->post_title; ?>
                </div>
                <div class="cdi-single-post-body">
                    <?php echo $post->post_content; ?>
                </div>
                <?php
                $post_coin = get_post_meta($post->ID,'_chidori_coin',true);
                if (mycred_post_is_for_sale($post) && $post_coin) {
                    $user_id = get_current_user_id();
                    if (mycred_user_paid_for_content($user_id, $post->ID)) {
                        ?>
                        <div class="cdi-single-post-car">
                            <?php
                            echo get_post_meta($post->ID,'_resource_url',true).'-'.get_post_meta($post->ID,'_resource_code',true);
                            ?>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="cdi-single-post-nothas">
                            <div class="cdi-single-post-nothas-tips">CHIDORI 小贴士：供献奉納可能会获得神明的报答。</div>
                            <div class="cdi-single-post-nothas-btn">献上 <?php echo $post_coin; ?> 奉納</div>
                        </div>
                        <?php
                    }
                }
                ?>


            </div>
            <div class="cdi-single-author">
                <div class="cdi-single-author-avatar">
                    <?php echo get_avatar($post->post_author, 32); ?>
                </div>
                <div class="cdi-single-author-nickname">
                    <?php
                    $author_info = get_userdata($post->post_author);
                    echo $author_info->display_name;
                    ?>
                </div>
                <div class="cdi-single-author-rick">
                <?php
                $rank_data = mycred_display_users_balance($post->post_author);
                $rank_arr = [10, 20, 100, 500, 1000];
                $rank_index = -1;
                for($i=0; $i<5; $i++) {
                    if ($rank_data < $rank_arr[$i]) {
                        $rank_index = $i;
                        break;
                    }
                }
                ?>
                    <div class="cdi-single-author-rick-num rank_lv<?php echo $rank_index; ?>">Lv<?php echo $rank_index+1; ?></div>
                </div>
            </div>
        </div>
    <?php }
    comments_template();
    ?>
</div>

<?php

get_footer();
