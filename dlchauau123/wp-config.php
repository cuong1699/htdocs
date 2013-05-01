<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
//define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/home/thuytn/public_html/dulich/dulichchauau123.com/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'thuytn_wrdp17');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Rwrcr@T5DReHS4/jZ04Ms5cDnE0f:x_U@F9dirz=:$_8GYWmcm0H16(e?Y^X;');
define('SECURE_AUTH_KEY',  'yiUIjV<e8nfw0oH;MDz;AMn/V;olSON~VD#CM(\`JeRjLKc;lADYoTeJ5JIp!i');
define('LOGGED_IN_KEY',    'XX;qbX75>0fnGi(x@Qj^D/N9bL@_7O@-0A*FsKzVkCzDy1r3Edm<YD#q|ZqW6\`70');
define('NONCE_KEY',        '_:Jeu<cWpz_|x#;w:aa5V;3C/Hqp6@KKsU?Q5;cw/8(L;By?H?x);vhiUE\`crgqAoptb');
define('AUTH_SALT',        'I25i\`5y<A\`4v5_Kw|DzrOSY$vx|KlHWG@Ik?gQE8T:C|5-^@pIIp>?sgNh?)Q^-vYAOF$p#hU');
define('SECURE_AUTH_SALT', 'MB*kk?CBk\`<5<>e9$F==wu(QEbb~!ED)yy3BPDVE>DnOGW9W*qmzLGGnMBbMc(');
define('LOGGED_IN_SALT',   'AprZQfNrAov_)vSv*9:4\`Mk@\`y$aVFxzFPyau;sw-#w>Nj@wIsE:oCCI$cqZmEc-\`niLzvkRH/5:B60A');
define('NONCE_SALT',       '(VZ^<ixO$Y?I5AAsY0>;87>N>ofCb:XTeXk_M7Cxt7nMBn|^0hsW;N^>;?c@VakU@y*1g');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
