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
define( 'DB_NAME', 'custom_header' );

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
define( 'AUTH_KEY',         '@{-R<hSa(ts0sm}XfT{uuo{j=uft)hw]8 B5B9NVWb7}(o#f:U<k]peU{P>n%^do' );
define( 'SECURE_AUTH_KEY',  'lM8gcEr[U8=un)==9TinBO Mp,17DVCQ%cB/|G[0Yi@O&m7 Vhe+ibELGc3ak3=@' );
define( 'LOGGED_IN_KEY',    '4}c^L=P:8u lp=K.PDkD72?U&mTz~]:?uq[J~Tm,lXW`5hY)w9+N*bL!~2)CcWVh' );
define( 'NONCE_KEY',        'z=l!Xs=jPiuBQfh([7@RbUobfb5*C1oPc=+{iQ9}3]vyc|h*E/*xwziL?i|fv/5:' );
define( 'AUTH_SALT',        'A0pT%TIQu?ZG%71m$_zww^BN/FnZ-hT&YU)hgBZ2jBUms7_]^tbp]5(tQ@yT~`S?' );
define( 'SECURE_AUTH_SALT', 'Y,SchS8rII2I7rO3M!J.h|PJ6]!q^E.8#.:W+IK~>]a6Nw1*)8m~8gE`y92V=Fny' );
define( 'LOGGED_IN_SALT',   'zG{d[.;+a+>9Ax[V9RM/kJCM_Li[Ej-T9?,J^Z`[sdJ@<f_D35 2~Z19Ge:*TBfW' );
define( 'NONCE_SALT',       '1;{},o%x!l5w@(bOPCYvCt=PS^x-?mxW)PR3-feOwI%e|QU[Sj>BhBjqT=WGI5-;' );

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
