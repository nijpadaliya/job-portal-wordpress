<?php
define('WP_CACHE', true); // WP-Optimize Cache
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
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */
// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'nextjob' );
/** Database username */
define( 'DB_USER', 'root' );
/** Database password */
define( 'DB_PASSWORD', '123456' );
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
define( 'AUTH_KEY',         '/N*&(<&-}AyE9h{RPUy)2&OueT@FxdDKwqA@$)n^/c.6 e.&|0<1p!SX@5^&a#3A' );
define( 'SECURE_AUTH_KEY',  'SJx<fR!Z>k%/|#7K% dIl[L@@09{Dib^_:F2f%(o[!B20Tkh* B5x^/XO7`>Zzvj' );
define( 'LOGGED_IN_KEY',    'Mall$h%4weEMjZ,{vqm#;c^.I$`it?y+={pYhPR^F=X8`[SsSiD:4L8n~MQ9p?.?' );
define( 'NONCE_KEY',        'y:b m^UCl_s1=5~VG94C?#orP>ha4&IQ:@Db(@^$$qE+v$5GB(1wL4Uz.x~mP k<' );
define( 'AUTH_SALT',        'lH^ B^H-!F?Y+F__DVW,=_:7%TXu#=w53d[)+E7He`?S}{bU$B|iUe9;][e6[_uA' );
define( 'SECURE_AUTH_SALT', 'slEBbz6iU3ZF>v;cKU6,y<%$ZAl,$ J=%Mfhya8]uxdjqm8ogu1q3?q|c=e69WWt' );
define( 'LOGGED_IN_SALT',   'z&#H4qtab[9-H/MeB:$+<b8ppu@`wrNd8W/1&^nd^|ca$uP?I8&yu1+Yq LHU&Zj' );
define( 'NONCE_SALT',       'v(?]O0RhT8-YKV7}zHkJIYLj}y6W}w%3V {yGm=??yazE-44Q9qc$)tjx?EQi@hm' );
/**#@-*/
/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', true );
/* Add any custom values between this line and the "stop editing" line. */
define('WP_HOME','http://mylocal.nextjob.com');
define('WP_SITEURL','http://mylocal.nextjob.com');
define('FS_METHOD', 'direct');

/* That's all, stop editing! Happy publishing. */
/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}
/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
