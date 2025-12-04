<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          '`~uYe)S?aI:H{hh&1m0#F!c=S-J&v~QJ4S1;i?TPUeVb!=RpM nVaqDa,V3wU3(/' );
define( 'SECURE_AUTH_KEY',   'HHx6arD?nKOWzaY+9nc%Ybjcw%@c[!zpG8{?K*ZH:k![(.7!I%yKLULc:7bE={yb' );
define( 'LOGGED_IN_KEY',     '-Pv`w)FS)z2.G,ltOisIptY:k]U{=iAt:/kz3P;A-_X m0Cz;f.^i|euD@/rGTTF' );
define( 'NONCE_KEY',         '=T8R ClxQIR0!CJFs{n5%$~vO$rVY38bZprNMAW>kAhL6 F;]j{@Lujsx#d:0uhC' );
define( 'AUTH_SALT',         '++CpO@c!0UBj~8&h?nQA6A>-k8JV=;mS2v}YYw/N<XV/+-T~SEJb(_/,v$U7;t5l' );
define( 'SECURE_AUTH_SALT',  'f`ETqb0L;kl!My2~:T,-Z#e2 t.RlquGQW.i|u7|5Z~X4E8W,0$E9y%%YErhRi:n' );
define( 'LOGGED_IN_SALT',    'm7.!inkP^Qqf~.TG//5@{E(dqI%Ahz.)d/ig(wQaDIcGc[jme5qIjgnFzb_%ZBR+' );
define( 'NONCE_SALT',        'kz9k<kgfNNizD|F&<d%Xj)czT XeX]Fi[~ncYxwNDHgdBNjcFO;55G]$(P_:k}9L' );
define( 'WP_CACHE_KEY_SALT', '!En6^4;gEfvYt`7Jx)SdOx[Z#sKSl,^FqjEGa~61h)m=t<}}|()]pn&km?v?Dt :' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
