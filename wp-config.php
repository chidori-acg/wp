<?php
/**
 * WordPress基础配置文件。
 *
 * 这个文件被安装程序用于自动生成wp-config.php配置文件，
 * 您可以不使用网站，您需要手动复制这个文件，
 * 并重命名为“wp-config.php”，然后填入相关信息。
 *
 * 本文件包含以下配置选项：
 *
 * * MySQL设置
 * * 密钥
 * * 数据库表名前缀
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/zh-cn:%E7%BC%96%E8%BE%91_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL 设置 - 具体信息来自您正在使用的主机 ** //
/** WordPress数据库的名称 */
define( 'DB_NAME', 'chidori' );

/** MySQL数据库用户名 */
define( 'DB_USER', 'root' );

/** MySQL数据库密码 */
define( 'DB_PASSWORD', '密码' );

/** MySQL主机 */
define( 'DB_HOST', '127.0.0.1' );

/** 创建数据表时默认的文字编码 */
define( 'DB_CHARSET', 'utf8mb4' );

/** 数据库整理类型。如不确定请勿更改 */
define( 'DB_COLLATE', '' );

/**#@+
 * 身份认证密钥与盐。
 *
 * 修改为任意独一无二的字串！
 * 或者直接访问{@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org密钥生成服务}
 * 任何修改都会导致所有cookies失效，所有用户将必须重新登录。
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '2d*EW3c~m B`Q#su_8{bZ.&Grmg]]J(s!3;>3+AEkd+&i-%q<dQJ(sD{Sk7GZe+&' );
define( 'SECURE_AUTH_KEY',  '+{I1Vv91C`~b}]n:4Er)D>*]%b.z>`pb8!c=0I~y%Rc79MSY4i/b-L#6s9D4h)YJ' );
define( 'LOGGED_IN_KEY',    ' LfgN> Pw:i$]bzAW19hf*]aNQ<BcjRr[AH(bpcgePYo2=FHR~=Ia{Q2:6!4v%n-' );
define( 'NONCE_KEY',        'dnos{;8<RBcy`X S!}P@I8MSK<&LLyIbRlbbRX.O,XpV`D?B0J7G^nTPO)4.aKHp' );
define( 'AUTH_SALT',        'Cw[MApdPTv<r_OXV,^GK%2b{~2rAH!UjcEd[cufreY:}z/?r{hf)4T>C4/;+>Pgw' );
define( 'SECURE_AUTH_SALT', 'pp&Pcu`u{dCx:BN--5^fWs{=O*(+qkpUKb9yuYK!%%@0H3~tM8%;9}a{?D1u&vxR' );
define( 'LOGGED_IN_SALT',   'eRZw}#W/+5qHd`HoGqy)~CPp5/hB0!}g!M*&6/DjRtF5wit8v:=_*ys7H.m/[*cy' );
define( 'NONCE_SALT',       'Y.6SR0VjBcSY;~U8GP-%L1#tTi%r]3t4:k=taug+}GL6zOXi2suxG[`u@P!6@HiA' );

/**#@-*/

/**
 * WordPress数据表前缀。
 *
 * 如果您有在同一数据库内安装多个WordPress的需求，请为每个WordPress设置
 * 不同的数据表前缀。前缀名只能为数字、字母加下划线。
 */
$table_prefix = 'wp_';

/**
 * 开发者专用：WordPress调试模式。
 *
 * 将这个值改为true，WordPress将显示所有用于开发的提示。
 * 强烈建议插件开发者在开发环境中启用WP_DEBUG。
 *
 * 要获取其他能用于调试的信息，请访问Codex。
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* 好了！请不要再继续编辑。请保存本文件。使用愉快！ */

/** WordPress目录的绝对路径。 */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** 设置WordPress变量和包含文件。 */
require_once( ABSPATH . 'wp-settings.php' );
