<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
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
define( 'DB_NAME', 'intro-cms' );

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
define( 'AUTH_KEY',         '~+Ot]Fc6%h1Skgp*[S%GkeyMH4*mUh8ngc1L1eAsATg8lkY2Fe-LQD+@tL+;nXBy' );
define( 'SECURE_AUTH_KEY',  'UK880^bzgcigk95B1>.<tXCPyILr2!q<ToIz{pz9F4`|BIo<!jRBaE[s==8DPILM' );
define( 'LOGGED_IN_KEY',    'KY0`^N!3F`F*rc=E!rdG;uHygW0h4n4gykbrown)iuT8KZ9K]69OzwmjIb8uMgUG' );
define( 'NONCE_KEY',        'F,LE,%&,0M9 RtbZZ JqZTb-|L{Q88bq.mBID~EC79[Ix2[PIJ1Qg jXZARZ_*52' );
define( 'AUTH_SALT',        'Hh2hc-;5-=;:v!I0tq1##)fdg,c`:l{O[1G%V@50xB8~ j:{4KFdN[,&Z>cm&q^j' );
define( 'SECURE_AUTH_SALT', 'O~3X,v 5(Ym6OVLki+S;]3z (zG%C#o&q#zDDc!3pZr[.$$zN,_2ovnUm0>zx_?Z' );
define( 'LOGGED_IN_SALT',   '-}Y%bkNl3#0S2{@1nT;P$w>F~Z>U4pC?Odjf%~&=+l%Zwo*,n@lCF#(6I18DMUy[' );
define( 'NONCE_SALT',       '*HaTkt$Ty3z(6Vz1h/&/@^.GL2Q/0b}-:;D!Sy[i3`nB{R)1tROZ,GDgJ|! w8{^' );

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
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
