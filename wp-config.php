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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         't]wa| /-}~}d1@0Um[~3G_8|Nu$>2U1~x,R?-V`tbUYfV.!#KcD~-j `pI-CVmm!' );
define( 'SECURE_AUTH_KEY',  '}Oa|Kic4wi+ucYG*Bs{mt^>f%@B :P:Z!p6Gn6Q6!7X<UXQ%k]Y9JI]d;ko7I]{B' );
define( 'LOGGED_IN_KEY',    '3eCuI?*RQvP,bE.:uH(R.CjEvC|G|wgxcQN<Sr ~*Lj65DNqxb99BK>nUVR!qRT*' );
define( 'NONCE_KEY',        'ufjW}~L4akGmuR?9+@zeh*CibiNX$},n*.T1_baOIipQVN)HPsjE]p/6@3 fU)nq' );
define( 'AUTH_SALT',        'v=:v.FD}nhnJU@`jFm<;bWJ#d>lp[_5niYK;y` Kr}b]n[YMff^Q+Cp-Te^3UZLj' );
define( 'SECURE_AUTH_SALT', 'm*-RGrye^jDd:+]DNf=&P6eY8hK]n$1C9q]>@n!mK;s*c[PK_ad$]z^(-]i}dXW[' );
define( 'LOGGED_IN_SALT',   '=a`(!460K) k/&}pM_PVT*QR7k 0;h%N|S<T|wdwb@c9vI4>L;0+E6nLS]1*7*Kr' );
define( 'NONCE_SALT',       '_]P $D6$Te`m+=n:hW]0P56TakRWDencH@43]pmj<(&]aL1ic*<2wv[m2D@z2SdB' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
