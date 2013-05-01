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
define('DB_NAME', 'dummy');

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
define('AUTH_KEY',         '-tV22ihjD>!rmxB.Oh:N6vU ;HoTW_3+-V0Vk>(<S8>i7&a(?(!yW@!<jW]]UQeM');
define('SECURE_AUTH_KEY',  'z}H{x=i#P$ZS.HlZT}._g~lgf8cwWcJ6XA,Znlm>jYO(alylu9mC&u|~d*{_Ukph');
define('LOGGED_IN_KEY',    'sGM =IE!Vs|LVWdW5!8=Dk@I0pWOx.FI:g3s}:gV}Amy[[_G4q0c>AnHdhq5HufP');
define('NONCE_KEY',        'tS gv~H>3e~{sjT=cl1>4IN^/<E!Uec9T]x%PWOK:qgjx.and&&TmdtNcx45F#JD');
define('AUTH_SALT',        'nOw@smR>a6G-Mhh M;/uh&LTp&fhe4mi5di&iH=w^e, jzrJ5tv;(Tkw^Kbs_w&f');
define('SECURE_AUTH_SALT', '4O_Vthyd7Fs~51r(aBZazB$HI}>3L@T]}G!Hs4[(>!b0:F3<%+_!^}yLYx;e*j!/');
define('LOGGED_IN_SALT',   'emesj/[U`$d<e$M(KWE@G^[SsgFW>X y/7{w|lV(~?w[^B)BMhy :6?BK{2?]v41');
define('NONCE_SALT',       '9h0&$86z[i(/h im81*F$0f>B_/;@{]q8/<|/;AV#^~zI.Z|26*9?@--9%8A|(w-');

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
