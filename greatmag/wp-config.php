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
define('DB_NAME', 'wpdatabase');

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
define('AUTH_KEY',         '}j<om|wi+?R`i}ATf;Vq 6[52JBeOe/L%>[P#h,szYZ_]o<>qr+6o2?M]N8Y!S7f');
define('SECURE_AUTH_KEY',  '([<(;IRgXWSjj~#-*:o4n|m2WI33gB1=aT^@zp.)q~n]1`70S@$a_%e4h+>i~_ca');
define('LOGGED_IN_KEY',    'tU*ytKC[}#L>4:(ebU<l/wGSXl`Eez7Om`Sf~QB.uy5FznUOU`+s9</{V:h@F&S*');
define('NONCE_KEY',        '+XA?d_%3B?eeZQl1v&YU{f6oL V-t.w/$-x1iahcdRz-jk&U^N=~JXfakuLpIT.u');
define('AUTH_SALT',        'bS/E[3`**Y1l~Bq~Zv]%Vz^8>VB/8n|+!}(6O3CwZQI!cm$8O:suJd+dcr&mv,P!');
define('SECURE_AUTH_SALT', '&&vEr]=::|x$7i[PlWRw9w,E4B$I7*4Z@lR&7w*P`+-?^%{t)gP;zi2&fb)JeNN;');
define('LOGGED_IN_SALT',   '{G8)qz$cD6$I!L}u6UC[mS3oP~k@+|K|DF|CC}mTR]eshq:B7`N4nv^$y#@iJiMm');
define('NONCE_SALT',       ' e6!B;9W^^M)+a]bvB,_*8U7OMcH#(&y`HR2}q/9]/wL8i,I*No~?2fd/3(q]OI*');

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
