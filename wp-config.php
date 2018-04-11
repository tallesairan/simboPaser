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
if ( file_exists( dirname( __FILE__ ) . '/wp-config-local.php' ) ) {
	include( dirname( __FILE__ ) . '/wp-config-local.php' );
} else {
	define( 'DB_NAME', '' );
	define( 'DB_USER', '' );
	define( 'DB_PASSWORD', '' );
	define( 'DB_HOST', '' ); // Probably 'localhost'
}

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('AUTH_KEY',         'j114DbbD?HoRrV%Nq@osP+B-KK<z/5!UY^T++G(Yj_9IBymUA%+V#(VexRfD5<[Z');
define('SECURE_AUTH_KEY',  'z4Ekq;V335W^=3-R|wNO|_7NXqWDUnG+AS?c+tr<|z*|U^t-5+R1P~(M,%x5zEPA');
define('LOGGED_IN_KEY',    '@ +R)V42/poXF#(:>XFrbdRq|Z6_cqEuED8PSpp^tk#}7sU{kXgO>ynj$McS`}tF');
define('NONCE_KEY',        ' U9}jnL<H~iL!C+:uXzFqf(B?x,{N|MDmF-9Q/Q-JgN`s?j8BO*-b6}6&mUbL:pd');
define('AUTH_SALT',        'B_M`POS(h}d*eOsj|9|jfM)|o:wRM!`C| rmR^M6nTx+?N];Q$Q-I}(`nm;uY8nc');
define('SECURE_AUTH_SALT', 'oy0$}.gtPCWO6jtW-^?}>hnhTQ*QWgMvwVs!]$bhzYXirK2x3l.kT ~3i> vE;~=');
define('LOGGED_IN_SALT',   '~p8.p3A%:|%o)|M,U<io5W3VL@a1W` [9a4<=7?`+J/H<URB~1TJ8IRx+ttMw7/&');
define('NONCE_SALT',       'hXY6a3<I0N[g.it9XXniIBz+@Sugqp9P_f@)!!gXK9)oG(n%S0o$K-}y}.*|3c;;');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpcl_';

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
define('WP_DEBUG', 0);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
