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
define( 'DB_NAME', 'marcus' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'J9E,p18)&HlraJwz)?Ehfe{(1jM(:jq,> *.qrR_$Qy2@{)lf+r`7|iL2j#!E%d7' );
define( 'SECURE_AUTH_KEY',  'dY^KH{P5x~(=[1)J}iI?=vZ~)%;,XD}i~G=Y`OB@?RV &pV>A8(12X,7V`~?!!%D' );
define( 'LOGGED_IN_KEY',    'Io_hm[c](NXU`QHJC WF4{utq>D0f[d [#Ap#l _h,6}2ID{QghC@KTz#88N9~SM' );
define( 'NONCE_KEY',        'AwBtzAk`BFo.)lwfm+d_{Hq*#TRjF.l!v/O-tKokEtWxtjv1eEHU&0_4uuBWuI{>' );
define( 'AUTH_SALT',        'tK*KeBiE6ezu07ESO3eKK)y/HVL]`(Vc*R]<]|@[;m9ahYH/u{?j!<N%[;sjX;bW' );
define( 'SECURE_AUTH_SALT', 'ArO@CN)og#^O7~o7 W#`heeH}9<3tUqUiK28qed$*6CtR4h){/[p:P6^;mj7Ib+O' );
define( 'LOGGED_IN_SALT',   '1v1+X.)x[-i188#C@c!p]4}W@^]<vr+E#_ltF25:5 8S|.uF|K7FlK)psB(}y6Ui' );
define( 'NONCE_SALT',       '0dqp.))7bo}B1J5c[=Mi5N/%qk{yh+S22aF0B%i*DCl`SB%K ?};!XWO:{@.mC0c' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
