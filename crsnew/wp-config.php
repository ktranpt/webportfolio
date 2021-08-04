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
define('WP_CACHE', true);
define( 'WPCACHEHOME', '/home/sydneycollect1v3/public_html/wp-content/plugins/wp-super-cache/' );
define('DB_NAME', '2011889_coll3ct1_crs');

/** MySQL database username */
define('DB_USER', '2011889_coll3ct');

/** MySQL database password */
define('DB_PASSWORD', 'umz[Q{$}9#^C');

/** MySQL hostname */
define('DB_HOST', '207.246.248.58');

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
define('AUTH_KEY',         'F!u>5hG;[cgG*;^ax<Xhgb} mo1>p0KtTEB<;|ci;!7ps!Zbyr/lkI#M}dPZjeiU');
define('SECURE_AUTH_KEY',  'w4M5LFVM%jngWp)FqK80YRxdWyG`u=iWO SR=PIYzZI6,,[:w9YfAt,I&ZL5@Fx0');
define('LOGGED_IN_KEY',    '!VCu458?n,s{PAk<UOPCzA3&r2*Rj_e -MNT?^  B#=Ht]2tmX-w+r(5Ef}~/ZYR');
define('NONCE_KEY',        'ySy]8-;%eh!G$)]/qh@=->bdeb; lh<FB=R*;SR+.VTCr(cc(@Qp9gZ}h=}aZwW,');
define('AUTH_SALT',        'soDl5F[I-lfS5g|8,Ya&$u^5Z;0:*Hst<e-/6Ia]u-zHW!%!]~HC9{CaB(QPfFfC');
define('SECURE_AUTH_SALT', '< ,i05cR#^zbGxx,Jq2aKMw%/:!ynGQBwmuIj/a[VG[7@WO)WicKY_oF`}cB1#?m');
define('LOGGED_IN_SALT',   'zFz]`%1j4;3QH=<&Mu2KDy1+(Z+P1m1g v%36)xL4QL{cB^t:@`<]9ZfC|;]F^G1');
define('NONCE_SALT',       '.JL3X]V&ko-euK[8_,/_xETmF>SL8W2`q&k|hHT*~U?*-IdvQ^Q4.cuS=sB{4Yh]');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

define('WP_HOME','https://crs.business');
define('WP_SITEURL','https://crs.business');

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
