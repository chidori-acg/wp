<?php
/**
 * Chidori functions and definitions
 *
 * @link https://www.sometimesnaive.com.cn
 *
 * @package Futaba
 * @subpackage Chidori
 * @since 1.0.0
 */


/**
 * SVG Icons class.
 */
require get_template_directory() . '/classes/class-twentynineteen-svg-icons.php';

/**
 * Custom Comment Walker template.
 */
require get_template_directory() . '/classes/class-twentynineteen-walker-comment.php';

/**
 * Enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * SVG Icons related functions.
 */
require get_template_directory() . '/inc/icon-functions.php';

/**
 * Custom template tags for the theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';


/**
 * 此以下为 chidori 核心代码
 * 请勿随意修改，可能会导致主题崩溃
 * by Futaba
 * MyCrown1234@hotmail.com
 */

/**
 * 自定义路由
 * ---------------------------------------------------------
 */
function loadCustomTemplate($template) {
    global $wp_query;
    if(!file_exists($template)) return;
    $wp_query->is_page = true;
    $wp_query->is_single = false;
    $wp_query->is_home = false;
    $wp_query->comments = false;
// 如果 http 出现 404 状态码
    if ($wp_query->is_404) {
        unset($wp_query->query["error"]);
        $wp_query->query_vars["error"]="";
        $wp_query->is_404=false;
    }
// 修改为 200 状态码
    header("HTTP/1.1 200 OK");
    include($template);
    exit;
}
function templateRedirect() {
    $basename = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);
    // 确认模板寻找路由为 pages 下的同名 php 文件
    loadCustomTemplate(TEMPLATEPATH.'/pages/'."/$basename.php");
}
add_action('template_redirect', 'templateRedirect');
/**
 * ----------------------------------------------------------
 */

/**
 * 加载自定义脚本
 * ----------------------------------------------------------
 */
function wp_add_scripts() {
    // jquery
    wp_enqueue_script('jquery');

    // less 压缩样式
    wp_enqueue_style('less_css', get_bloginfo('template_directory').'/styles.min.css');
}
add_action('wp_enqueue_scripts', 'wp_add_scripts');
/**
 * ----------------------------------------------------------
 */

/**
 * 去除除后台的顶部管理栏
 * ----------------------------------------------------------
 */
add_filter('show_admin_bar', '__return_false');
/**
 * ----------------------------------------------------------
 */

/**
 * 编辑器自定义字段
 * ----------------------------------------------------------
 */
/* 链接 */
add_action( 'add_meta_boxes', 'resource_url' );
function resource_url() {
    add_meta_box(
        'resource_url',
        '神秘链接',
        'resource_url_meta_box',
        'post',
        'side',
        'low'
    );
}

function resource_url_meta_box($post) {
    // 创建临时隐藏表单，为了安全
    wp_nonce_field( 'resource_url_meta_box', 'resource_url_meta_box_nonce' );
    // 获取之前存储的值
    $value = get_post_meta( $post->ID, '_resource_url', true );
    ?>
    <label for="resource_url"></label>
    <input type="text" id="resource_url" name="resource_url" value="<?php echo esc_attr( $value ); ?>" >
    <?php
}

add_action( 'save_post', 'resource_url_save_meta_box' );
function resource_url_save_meta_box($post_id)
{
    // 安全检查
    // 检查是否发送了一次性隐藏表单内容（判断是否为第三者模拟提交）
    if (!isset($_POST['resource_url_meta_box_nonce'])) {
        return;
    }
    // 判断隐藏表单的值与之前是否相同
    if (!wp_verify_nonce($_POST['resource_url_meta_box_nonce'], 'resource_url_meta_box')) {
        return;
    }
    // 判断该用户是否有权限
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // 判断 Meta Box 是否为空
    if (!isset($_POST['resource_url'])) {
        return;
    }

    $resource_url = sanitize_text_field($_POST['resource_url']);
    update_post_meta($post_id, '_resource_url', $resource_url);
}

/* 提取码 */
add_action( 'add_meta_boxes', 'resource_code' );
function resource_code() {
    add_meta_box(
        'resource_code',
        '提取码',
        'resource_code_meta_box',
        'post',
        'side',
        'low'
    );
}

function resource_code_meta_box($post) {
    // 创建临时隐藏表单，为了安全
    wp_nonce_field( 'resource_code_meta_box', 'resource_code_meta_box_nonce' );
    // 获取之前存储的值
    $value = get_post_meta( $post->ID, '_resource_code', true );
    ?>
    <label for="resource_code"></label>
    <input type="text" id="resource_code" name="resource_code" value="<?php echo esc_attr( $value ); ?>" />
    <?php
}

add_action( 'save_post', 'resource_code_save_meta_box' );
function resource_code_save_meta_box($post_id)
{
    // 安全检查
    // 检查是否发送了一次性隐藏表单内容（判断是否为第三者模拟提交）
    if (!isset($_POST['resource_code_meta_box_nonce'])) {
        return;
    }
    // 判断隐藏表单的值与之前是否相同
    if (!wp_verify_nonce($_POST['resource_code_meta_box_nonce'], 'resource_code_meta_box')) {
        return;
    }
    // 判断该用户是否有权限
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // 判断 Meta Box 是否为空
    if (!isset($_POST['resource_code'])) {
        return;
    }

    $resource_code = sanitize_text_field($_POST['resource_code']);
    update_post_meta($post_id, '_resource_code', $resource_code);
}

/* 奉納 */
add_action( 'add_meta_boxes', 'chidori_coin' );
function chidori_coin() {
    add_meta_box(
        'chidori_coin',
        '奉納',
        'chidori_coin_meta_box',
        'post',
        'side',
        'low'
    );
}

function chidori_coin_meta_box($post) {
    // 创建临时隐藏表单，为了安全
    wp_nonce_field( 'chidori_coin_meta_box', 'chidori_coin_meta_box_nonce' );
    // 获取之前存储的值
    $value = get_post_meta( $post->ID, '_chidori_coin', true );
    ?>
    <label for="chidori_coin"></label>
    <input type="number" id="chidori_coin" name="chidori_coin" value="<?php echo esc_attr( $value ); ?>" />
    <?php
}

add_action( 'save_post', 'chidori_coin_save_meta_box' );
function chidori_coin_save_meta_box($post_id)
{
    // 安全检查
    // 检查是否发送了一次性隐藏表单内容（判断是否为第三者模拟提交）
    if (!isset($_POST['chidori_coin_meta_box_nonce'])) {
        return;
    }
    // 判断隐藏表单的值与之前是否相同
    if (!wp_verify_nonce($_POST['chidori_coin_meta_box_nonce'], 'chidori_coin_meta_box')) {
        return;
    }
    // 判断该用户是否有权限
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // 判断 Meta Box 是否为空
    if (!isset($_POST['chidori_coin'])) {
        return;
    }

    $chidori_coin = sanitize_text_field($_POST['chidori_coin']);
    update_post_meta($post_id, '_chidori_coin', $chidori_coin);
}
/**
 * ----------------------------------------------------------
 */

/**
 * ajax
 * ----------------------------------------------------------
 */
add_action("wp_ajax_single_buy", "ajax_single_buy");

function ajax_single_buy() {
    $user_id = get_current_user_id();
    $post_id = (int)($_POST['post_id']);
    $post = get_post($post_id);
    if (mycred_post_is_for_sale($post) && !mycred_user_paid_for_content($user_id, $post_id)) {
        $result = mycred_sell_content_new_purchase($post, $user_id, 'chidori_coin');
        header( "Content-Type: application/json" );
        if ($result) {
            echo json_encode([
                "encode" => 0,
                "message" => [
                    "user_id" => $user_id,
                    "post_id" => $post_id,
                    "post_coin" => mycred_get_content_price($post_id),
                    "resource_url" => get_post_meta($post_id,'_resource_url',true),
                    "resource_code" => get_post_meta($post_id,'_resource_code',true)
                ],
                "result" => $result
            ]);
        } else {
            echo json_encode([
                "encode" => 1
            ]);
        }
    }
    exit;
}
/**
 * -----------------------------------------------------------
 */

/**
 * mycred post price filter
 * -----------------------------------------------------------
 */
function chidori_post_price($price, $post_id) {
    return (int)get_post_meta($post_id,'_chidori_coin',true);
}

add_filter("mycred_get_content_price", "chidori_post_price", 10, 2);

/**
 * -----------------------------------------------------------
 */

/**
 * comments list get template
 * -------------------------------------------------------------
 */
function get_comments_list($comment, $args, $depth) {

    ?>
    <li class="cdi-comment" data-id="<?php echo $comment->comment_ID; ?>">
        <div class="cdi-comment-author">
            <div class="cdi-comment-author-avatar"><?php echo get_avatar($comment->user_id, 32); ?></div>
            <div class="cdi-comment-author-info">
                <div class="cdi-comment-author-nickname"><?php echo $comment->comment_author; ?><div class="cdi-comment-author-rank"></div></div>
                <div class="cdi-comment-author-time"><?php echo $comment->comment_date; ?></div>
            </div>
            <div class="cdi-comment-author-reply-btn">回复</div>
        </div>
        <div class="cdi-comment-body"><?php echo $comment->comment_content; ?></div>
    </li>
<?php
}
/**
 * --------------------------------------------------------------
 */
