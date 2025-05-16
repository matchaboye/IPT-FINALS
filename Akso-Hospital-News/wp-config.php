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
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'Akso-Hospital-News' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
    define( 'WP_HOME',    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
}



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
define( 'AUTH_KEY',         'LiJzws5380YMQgOk49VNdthqBsPN6sgiFtF2LXpbi7oDYfe7Mlkf1svLBO3SQT20' );
define( 'SECURE_AUTH_KEY',  'l6nB147X4Z2Xfelk7zOgFVJzZuKVNwMMBXYUsh9pSzrSPlg7GTgdFd0v1sY7XQxc' );
define( 'LOGGED_IN_KEY',    'dMa1kKK3KJ4qW0uZNEZfKiE3xoHJ5VWA3gAV41oRqOvZ6Q0l2UiflCX7K9E0hbaN' );
define( 'NONCE_KEY',        'fDFLEGBbIK3SubOKJLU5z2vMUYzqDlr2x1dwCpDUYQbWqaqb4byFzQcsIZq038Iw' );
define( 'AUTH_SALT',        'EqhmKnzQkDJthQW26Luk9fqNicN5CbX01zhjW7bpxb7LMFcskDCMKqI6D3DD3JUN' );
define( 'SECURE_AUTH_SALT', 'WUvGguaFJURHZC8MC9Q89YZn1RTpNdNoOcy3G2Yq85Xis7tgRH5ZhxthzmmYisyz' );
define( 'LOGGED_IN_SALT',   '35ukEQErWfkx26kHI7Zailx1JPgRMvITMw9dZu8iU8FfDnBQLcTXRicnAAQpkfYS' );
define( 'NONCE_SALT',       'zbsdl9ZWLMBwSCosSJLUs4PrNBCPA0TVT335TWrhuSGlEWSBN4xYGkspumx45LIF' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
