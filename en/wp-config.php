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
define( 'DB_NAME', 'rnqaygkg_wp910' );

/** MySQL database username */
define( 'DB_USER', 'rnqaygkg_wp910' );

/** MySQL database password */
define( 'DB_PASSWORD', ')9J74p5@HS' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',         'pavllptloznrbmzkygbzci8uhianewbfhqrjrtqyhgjzfebd593yv5blhmqnw3ie' );
define( 'SECURE_AUTH_KEY',  'qkgyjpjxbj8dsg50tu0z3zi8x2acb6shhbsakkiawl8a09bxrvdovnh9ugub32zx' );
define( 'LOGGED_IN_KEY',    'x9b6j6sus72qhij5kqnzsoc80ehk0d5ikkopl5g7gx4bo8ozyrybuuf8cyp8ano7' );
define( 'NONCE_KEY',        'nx9uduub8cpyotsxdwfouja5rggelbvzsbbls9xt7uwvlarqeiitfsallw296vef' );
define( 'AUTH_SALT',        'aofsy8laj3vmd573e990rx34pkuvwydcncicfnf7fkexswwc6g3bh6urfx7y0esx' );
define( 'SECURE_AUTH_SALT', '0bwkee39zr68y4qhn1bqsk9hotfnqttxarcg6qkczfortdo9qg3xaqbhrvut84ib' );
define( 'LOGGED_IN_SALT',   'fscffb6zjhy3w6jv9uqjwdohqbqcgoz4mhkasecpivfdcfdnpzv6foc0kvkm1o0i' );
define( 'NONCE_SALT',       'pya28pwymemsyhwobyruhzorkwszzcqvbegbjehwczetkquhtt6m2ibrtjmme9yh' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpb1_';

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