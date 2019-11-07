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
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header>
    <div class="cdi-header">
        <a class="cdi-header-logo" href="<?php echo home_url(); ?>">
            <img src="<?php echo get_bloginfo('template_directory').'/image/site_logo.png';?>" />
        </a>
        <div class="cdi-header-user">
            <a class="cdi-header-user-avatar" href="<?php echo site_url().'/member/' ?>">
                <?php
                global $current_user, $display_name, $user_email;
                get_currentuserinfo();
                echo get_avatar($current_user->user_email, 32);
                ?>
            </a>
            <ul class="cdi-header-user-opt">
                <li><a href="<?php echo admin_url();?>">控制台</a></li>
            </ul>
        </div>
    </div>
</header>

<?php if (is_home() || is_front_page()) { ?>
    <div class="cdi-index-header" style="background-image:url('<?php echo get_bloginfo('template_directory').'/image/home_header.jpg';?>')"></div>
<?php } ?>
