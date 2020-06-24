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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

 function fromenv($key, $default = null) {
  $value = getenv($key);
  if ($value === false) {
    $value = $default;
  }
  return $value;
}

$DSN = parse_url(fromenv('DATABASE_URL', 'mysql://be2c3c76d4ce13:b428a5cd@us-cdbr-east-05.cleardb.net/heroku_70bfee49b22f1fe?reconnect=true'));
// $DSN = parse_url(fromenv('DATABASE_URL', 'mysql://root:root@localhost:8888/stallionafricar'));

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', substr($DSN['path'], 1));
/** MySQL database username */
define('DB_USER', $DSN['user']);
/** MySQL database password */
define('DB_PASSWORD', $DSN['pass']);
/** MySQL hostname */
define('DB_HOST', $DSN['host']);
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
define( 'AUTH_KEY',         'B!:hxsVx4q%w#od+r JUOAU~cDpI<2*XFNd/Jl}?*&cK~5;o9&WxWo$q|r[Pxd1f' );
define( 'SECURE_AUTH_KEY',  'c$r@<_S7&+MJQ@*cg>sF1#i}Uu?2yL)=rLmH%E8H3#avS+lH5/yC;*,v<+Jr])O!' );
define( 'LOGGED_IN_KEY',    '7A)4{$/Ve^9N:BC#jqEEL@AAZpK~{b1N(q`/hn5F2PaPFK{-s;h|VU5n|kc!z^bK' );
define( 'NONCE_KEY',        'Eb%%kJrby$rge79(,l=1J^I0mWTESq5dw^?>=`;l7yvro,`k4hG~<k!t>/t3+TJ*' );
define( 'AUTH_SALT',        'C1(fDpv3;4e8&Y7yKs2#:JM3Mgz(m$XzY.6]#Kt=mR)!:nc&^j:iJopTo>IFJ)Zm' );
define( 'SECURE_AUTH_SALT', 'cO5#JPIZ/!j`q{d#OSE8gSERPIv/O8K}<oAY1`(;&w mPu !_{8j?1m-kki^*Vd}' );
define( 'LOGGED_IN_SALT',   '8ur~4|2c/;}Z8O=&DbuGWvi[fri}POB?tA~/afo6 +*6vE})UDIbSv|YMv}#=7>J' );
define( 'NONCE_SALT',       '~;${Br1_O{5Kk}FisGM#1J2/ VaOE4V:6YH6kbs#|(g6L0T!2Z*iPyWsx3OTxr4E' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
