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

<div class="cdi_single_container">
    <?php while (have_posts()) {
        the_post();
        global $post ?>
        <div class="cdi_single">
            <div class="cdi_single-post">
                <div class="cdi_single-post-title">
                    <?php echo $post->post_title; ?>
                </div>
                <div class="cdi_single-post-body">
                    <?php echo $post->post_content; ?>
                </div>
            </div>
            <div class="cdi_single-author">
                <div class="cdi_single-author-avatar">
                    <?php echo get_avatar($post->post_author, 32); ?>
                </div>
                <div class="cdi_single-author-nickname">
                    <?php
                    $author_info = get_userdata($post->post_author);
                    echo $author_info->display_name;
                    ?>
                </div>
                <div class="cdi_single-author-rick">
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
                    <div class="cdi_single-author-rick-num rank_lv<?php echo $rank_index; ?>">Lv<?php echo $rank_index+1; ?></div>
                </div>
            </div>
        </div>
    <?php }?>
</div>

<?php
get_footer();
