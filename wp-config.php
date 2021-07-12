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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress1' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'k!Gw2mfiLZeq{PT}kKKDVvjeVoQQs/Io98e}??G{=_$C/MV[4!z],=o}pf)K*Sl&' );
define( 'SECURE_AUTH_KEY',  'q%wn9{!dno5Ei^a6>6ojW{AHrdYQ(/Jg=e[+^^.X[ocyNy^QA3NgDPQp[eLUz#oB' );
define( 'LOGGED_IN_KEY',    '8+5$iP9&OV=?ouE_@7!O&SVRjF_WiS, &,.Y</{?rx?[xf>):f)n]j:js:Oo[>w:' );
define( 'NONCE_KEY',        '2K0z2cPa9p#A-,^%bIk-1 SH<.-dnQP;z4XCJ[d;ikp3[}k28/-;mv%8]v;;q%O-' );
define( 'AUTH_SALT',        '54^#Y%`Ak4zd6*s-gp}ypVl:A&mdR)2[YNN4+sr>(=/;!1>IpB3t0O&<-SW5@msq' );
define( 'SECURE_AUTH_SALT', '3w$T6YewT3z`iCP`I_c:{AqrYhy+7L7:DRUgXPe:=?bw]Dy<dM]OO5N72$LM,S2C' );
define( 'LOGGED_IN_SALT',   '0}A9]wqf2~e`DeKV Q9hR?mufPn=+$8=aS2U,Cvj#TT$Fz7_W]gvKU}QA|%]<h_a' );
define( 'NONCE_SALT',       '.kyS>E^`eGd9V^<.~D!vwJ$-ydk{n;`][N L9B3u!6Ab/Tr@GBLA_aj!5*;>7)ZZ' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp1_';

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
