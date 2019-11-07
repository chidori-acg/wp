<?php
/**
 *
 * 这是千鸟居 WEB 门户所使用主题。
 * 它不允许被其他商用网站使用或者上传，若要使用请联系网站管理员或者作者。
 *
 * @link https://www.sometimesnaive.com.cn
 *
 * @package sakuru
 * @subpackage chidori
 * @since 1.0.0
 */

/**
 * 若为登录则重定向到登录页
 * origin 用于记录重定向源地址，便于登录校验完成之后返回
 */
if(!is_user_logged_in()) {
    header("Location: /wp-login.php?origin=index");
}

get_header();
?>

<div class="cdi-container">

<?php

global $cat;
$cats = get_categories([
    'child_of' => $cat,
    'parent' => $cat,
    'hide_empty' => 0
]);

$c = get_category($cat);
foreach($cats as $the_cat) {
    $posts = get_posts([
        'category' => $the_cat->cat_ID,
        'numberposts' => 5,
    ]);
    if(!empty($posts)) {
        ?>

        <div class="cdi-home-classify">
            <div class="cdi-home-classify-title"><?php echo $the_cat->name; ?></div>
            <div class="cdi-home-classify-row">

        <?php

        foreach($posts as $post) {
            ?>
            <a class="cdi-post" href="<?php echo get_permalink($post->ID) ?>">
                <div class="cdi-post-cover" style="background-image:url('<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($post->ID))[0] ?>')">
                </div>
                <div class="cdi-post-info">
                    <span class="cdi-post-info-time"><?php echo substr($post->post_date, 0, 10); ?></span>
                    <span class="cdi-post-info-author"><?php echo get_userdata($post->post_author)->display_name; ?></span>
                </div>
                <div class="cdi-post-title">
                    <?php
                    if(mb_strlen($post->post_title, 'UTF8') > 13) {
                        echo mb_substr($post->post_title, 0, 13, 'UTF8').'...';
                    } else {
                        echo $post->post_title;
                    }
                    ?>
                </div>
            </a>
            <?php
        }

        ?>
            </div><!--cdi-home-classify-row-->
        </div><!--cdi-home-classify-->
        <?php
    }
}
?>
</div>

<?php
get_footer();
