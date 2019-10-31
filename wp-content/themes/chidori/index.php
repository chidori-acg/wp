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

<div class="home-header" style="background-image:url('<?php echo get_bloginfo('template_directory').'/image/home_header.jpg';?>')">
</div>
<div class="container">

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

        <div class="section">
            <div class="section-title"><?php echo $the_cat->name; ?></div>
            <div class="section-row">

        <?php

        foreach($posts as $post) {
            ?>
            <div class="post">
                <div class="post-cover" style="background-image:url('<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($post->ID))[0] ?>')">
                </div>
                <div class="post-title">
                    <?php
                    if(mb_strlen($post->post_title, 'UTF8') > 13) {
                        echo mb_substr($post->post_title, 0, 13, 'UTF8').'...';
                    } else {
                        echo $post->post_title;
                    }
                    ?>
                </div>
            </div>
            <?php
        }

        ?>
            </div>
        </div>
        <?php
    }
}
?>
</div>

<?php
get_footer();