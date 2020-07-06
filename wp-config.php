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
define( 'DB_NAME', 'rnqaygkg_wp672' );

/** MySQL database username */
define( 'DB_USER', 'rnqaygkg_wp672' );

/** MySQL database password */
define( 'DB_PASSWORD', 'g1S7!x9p8!' );

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
define( 'AUTH_KEY',         'lubnylrwidudjgbvm62ijafzy4nvcanxrprkx68vooyyb9brtlfxg14mquzuwr9w' );
define( 'SECURE_AUTH_KEY',  'xywu2iaqp4onubpfqdpjgsla5np0sok2jxebhufexrnot3jnhskvp6nuh8nxwjkx' );
define( 'LOGGED_IN_KEY',    '8oonjjavopgxqjrltrwapgwi5sarijdbmbrnqjrhtbtk3sowoelmpq1v27lgt5i9' );
define( 'NONCE_KEY',        'rch9g2uaofvqjudg8mzpi3onuw4iaa79fi7dzwpvdcpfp0wyrw41ofbg8umv5rwi' );
define( 'AUTH_SALT',        'qfcqkmvlnaek5g9gvyhokm6btywvdx41prcxqitghqaodumiin3hslztkqkiv8tp' );
define( 'SECURE_AUTH_SALT', 'ecno3k6s1a3fimec7p0efr3xn0fatt6cppdmswl0ijsi8i0vsazwdpjs5ft1piew' );
define( 'LOGGED_IN_SALT',   'ax92llhvvibnrrvbsbbt9nkknut2jytnhmehwn3etd1ahv9ti6kcsritekr3zrqg' );
define( 'NONCE_SALT',       'uc5c3syveqzhmqjdhsw2usyqws42yy6ujb5jyeixnwavexeyspauvocwfnaki5xz' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wppn_';

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
