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
define('DB_NAME', 'gumbuyac_member');

/** MySQL database username */
//define('DB_USER', 'gumbuyac_admin');
define('DB_USER', 'mwuser');

/** MySQL database password */
//define('DB_PASSWORD', '(s~~tptVa3DE');
define('DB_PASSWORD', 'mwuser');

/** MySQL hostname */
//define('DB_HOST', 'localhost');
define('DB_HOST', '192.168.50.85');

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
define('AUTH_KEY',         '1I&C:4R?hj#Kxf0;nX#1J>xIsaNpBiVN?hez+|h-aATg_h(&^6,eTxVsn^LhV*4b');
define('SECURE_AUTH_KEY',  '6s93W-Z1PAT`p^, >=;fn|Gr+|stTi$p^U{d0BDgpT6]5IpU@DGbo4h[ Php6HRa');
define('LOGGED_IN_KEY',    '`i3?[F^*`dV|3d+Bd^DT4q1c;h|]*jH)Kguj0xx+/UdSG>h7k.S*jW8e0((a0cOf');
define('NONCE_KEY',        '?9owyo_K7X}C+;Pv?{:p[Gg{e#I3B]?c<M})oc(sK@*eCRqw=LMFa!c3=ND!*xv,');
define('AUTH_SALT',        '07}~k7cz|*U&SW;p{#9XZSon^//5)^]^>F)uAIGtSRw*ZkRl)pajrq.TH3o}/`,*');
define('SECURE_AUTH_SALT', 'Py|L}M5])w)chW8^mte4o$>p9+>a6E6EfW0f4L9c2^6n4Z~ObO=B j7TNmwR@qk5');
define('LOGGED_IN_SALT',   '=>}@{b1m >tCH,<58D^WH*rCE4/|@-E LIj#&(;*TW`BSLgpiFRkYeVp5@L?ZMh{');
define('NONCE_SALT',       'j{V*m]18P6Bz$Z7J.7a9qb=-grliA?;P1L59c/6&K8&_G[t&2*d_cVHZ9.NzPSN|');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

define('WP_HOME', 'http://localhost/gumbuyaworld');
define('WP_SITEURL', 'http://localhost/gumbuyaworld');

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
