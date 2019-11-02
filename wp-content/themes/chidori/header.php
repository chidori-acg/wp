<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>
<style>
    header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        z-index: 999;
        background-color: hsla(0, 0%, 100%, .4);
        box-shadow: 0 1px 2px rgba(0, 0, 0, .1);
    }
    .header {
        width: 1000px;
        height: 42px;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
    }
    .site-logo {
        height: 30px;
    }
    .site-logo>img {
        height: 100%;
    }
    .user {
        display: inline-flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
    }
    .user>.user-avatar {
        width: 30px;
        height: 30px;
    }
    .user>.user-avatar>img {
        width: 100%;
        height: 100%;
    }

    .user-opt {
        margin: 0;
        padding: 0 0 0 10px;
        display: flex;
        flex-direction: row;
        list-style-type: none;
    }
    .user-opt li {
        display: inline-flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
    }
    .user-opt li a {
        color: #111;
        font-size: 14px;
    }

    .home-header {
        width: 100%;
        height: 170px;
        background-size: cover;
        background-position: center;
    }

    .container {
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .container>.section {
        width: 1000px;
        margin: 10px 0;
    }
    .section>.section-title {
        font-size: 24px;
        margin-bottom: 10px;
    }
    .section>.section-row {
        width: 100%;
        overflow: hidden;
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        align-items: center;
    }
    .post {
        width: 160px;
        margin: 0 10px;s
        padding: 10px 0;
    }
    .post>.post-cover {
        width: 100%;
        height: 100px;
        background-position: center;
        background-size: cover;
        border-radius: 4px;
    }
    .post>.post-title {
        font-size: 12px;
    }
</style>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header>
    <div class="header">
        <div class="site-logo">
            <img src="<?php echo get_bloginfo('template_directory').'/image/site_logo.png';?>" />
        </div>
        <div class="user">
            <a class="user-avatar" href="<?php echo site_url().'/member/' ?>">
                <?php
                global $current_user, $display_name, $user_email;
                get_currentuserinfo();
                echo get_avatar($current_user->user_email, 32);
                ?>
            </a>
            <ul class="user-opt">
                <li><a href="<?php echo admin_url();?>">控制台</a></li>
            </ul>
        </div>
    </div>
</header>
