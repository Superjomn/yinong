<?php
/** 
 * WordPress 基础配置文件。
 *
 * 本文件包含以下配置选项: MySQL 设置、数据库表名前缀、
 * 密匙、WordPress 语言设定以及 ABSPATH。如需更多信息，请访问
 * {@link http://codex.wordpress.org/Editing_wp-config.php 编辑
 * wp-config.php} Codex 页面。MySQL 设置具体信息请咨询您的空间提供商。
 *
 * 这个文件用在于安装程序自动生成 wp-config.php 配置文件，
 * 您可以手动复制这个文件，并重命名为 wp-config.php，然后输入相关信息。
 *
 *
 * @package WordPress
 */

// ** MySQL 设置 - 具体信息来自您正在使用的主机 ** //
/** WordPress 数据库的名称 */
define('DB_NAME', 'yinong');

/** MySQL 数据库用户名 */
define('DB_USER', 'root');

/** MySQL 数据库密码 */
define('DB_PASSWORD', 'root');

/** MySQL 主机 */
define('DB_HOST', 'localhost');

/** 创建数据表时默认的文字编码 */
define('DB_CHARSET', 'utf8');

/** 数据库整理类型。如不确定请勿更改 */
define('DB_COLLATE', '');

/**#@+
 * 身份密匙设定。
 *
 * 您可以随意写一些字符
 * 或者直接访问 {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org 私钥生成服务}，
 * 任何修改都会导致 cookie 失效，所有用户必须重新登录。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'mX8g5hsyX9[WTRZSxZJ<exZZTfkG&Ew,Ez/<J8zq{D/XmGQE&F^H7iT1+cE!hiHg');
define('SECURE_AUTH_KEY',  '2@(4*bUY/7R5nL @,l})<g:.1lD_cp@/^w;35jkQH]Q~8TPN+^{J;ACBwhLX#!>/');
define('LOGGED_IN_KEY',    'zpaJ*9?.imX=zZ7;ZY.MUc.W88WJ17/eqC]YQ]O_@agpF<kdG1Z0]}H^|bz1Her8');
define('NONCE_KEY',        'wlijJ?tW1fjsKi-Mo:fS[cTg;O9zCHW^~3gKr7j(%`In2f`X~!By;[O2oFtun#%8');
define('AUTH_SALT',        '$1?:8(j BIt&~#UhP+vL0jw.)L2;TZ% W x0d]&&iD8y91m4blAq,4HphGi [c.=');
define('SECURE_AUTH_SALT', '@R6kJ#Kx/{sB5EEe&qy6C/y8>=TClZYWDM]^FRIuuxcj]skYtu_HdSYxM}#sho(K');
define('LOGGED_IN_SALT',   'E4QxqSZQ)YD]N/)R~]md&qOnTWjK7mP {JFGkbymblPzA{V=6U0*]dOQh6R<xg;*');
define('NONCE_SALT',       'iOtyV[mUKUmwMk#$#4-r3.?eEb[S4Jc];NZ)4JxPnQ^4Fd5b%3|u]hD2 *|!^^z0');

/**#@-*/

/**
 * WordPress 数据表前缀。
 *
 * 如果您有在同一数据库内安装多个 WordPress 的需求，请为每个 WordPress 设置不同的数据表前缀。
 * 前缀名只能为数字、字母加下划线。
 */
$table_prefix  = 'yn_';

/**
 * WordPress 语言设置，默认为英语。
 *
 * 本项设定能够让 WordPress 显示您需要的语言。
 * 	wp-content/languages 内应放置同名的 .mo 语言文件。
 * 要使用 WordPress 简体中文界面，只需填入 zh_CN。
 */
define ('WPLANG', 'zh_CN');

/**
 * 开发者专用：WordPress 调试模式。
 *
 * 将这个值改为“true”，WordPress 将显示所有开发过程中的提示。
 * 强烈建议插件开发者在开发环境中启用本功能。
 */
define('WP_DEBUG', false);

/* 好了！请不要再继续编辑。请保存该文件。 */

/** WordPress 目录的绝对路径。 */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** 设置 WordPress 变量和包含文件。 */
require_once(ABSPATH . 'wp-settings.php');
