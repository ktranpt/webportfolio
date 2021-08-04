<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'yellowhats');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'ndj~IH*pY*wy)u2DaqGJm{B2us(Bu8q9b9rfb<e~<*ia!oenXiA>d$PCo!,Hv186');
define('SECURE_AUTH_KEY',  'zU(E@lCTWa*In`mxPv<F$:GeOn}a[Se#cCM3#-Y#eJGyPZ}AIf3F6Ut-XzZNHJZU');
define('LOGGED_IN_KEY',    '9MQrlcRYIK9WC_3KBSb0#$ehUNS:wIFmo6)=4L8;I(>N?My,J rmfa##ZlYc}WRI');
define('NONCE_KEY',        '7*ff{l9$<tL<gZkH0?le=/xFDIwR:5oR/?6jQU0xgM[2-fF:0{x<A}9s&J36EwF^');
define('AUTH_SALT',        '1TrN fnc32b>Y$)eJ(yG@<Ik`Xyj4r[.4Z-?vAdALa9rP-)+ZrWh9iwbW:6W@C6;');
define('SECURE_AUTH_SALT', '%0F70nW8S)L?*9zqe`W=J@&G.gG:.=s$6EgOkvK$S&R;h~<x=xNPZS=jc!Xu#n O');
define('LOGGED_IN_SALT',   '-U?!$w0fO(<n>s+62zd>{;<}Tcj`KYU.J0qFZ:I9^@x-s*`G0Y6am3!oGEh4ol7%');
define('NONCE_SALT',       'AT3~l69I_gtekRb&s8;R5Lnb*GzgiLNVR,O0oGHjO_}DLTP;@T>k1H6^[04b<HqM');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
