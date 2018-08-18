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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'CsaL7xwP8ZoQWsyMd9eua920xAwSNCXsl2gNk+IMeVA/oKTJ/C0TLXvETPqdxosyi6NZEoVgqgLTs6cbLypGYg==');
define('SECURE_AUTH_KEY',  'VVyUEMEVtr8SEyIatx1voMsJbU/F/5AvPXMWiBK2AMBWqagQBYnxkOHLP3oJB506qJs27v2gRRYzkbzg5g/PFg==');
define('LOGGED_IN_KEY',    'JfRZ91y9r4tz2a8gaYLMnsLODkxa+VIyISxTX4JKx3Zz39xdm0q4A/XMSuRW4L+OX+0jsBXSpi0p8cGGZfyCLA==');
define('NONCE_KEY',        'AlAEVTtaer58520G0PlwxowLeB6XtRU/1dTqAw/vAbSn0UzHZ8aYdEaOXxQdv28vyuE91Anhl1IxXb+ebmb2pA==');
define('AUTH_SALT',        'ApWLiyuTC6S7klLTxa1axpeeFM8js0YuGjKTU3DNbduFcB9B6bkpdjzso8/zUAghhp/gNqM9S3hknhSguJsRHA==');
define('SECURE_AUTH_SALT', 'kKvAfdlV3jI9k3GNM8QSNPWpYDydS/DQDFaRx52v3AcuqoYUrUww+42sfwpX0E9MtQVBCRiLzRmpoUBScUVHVg==');
define('LOGGED_IN_SALT',   '5Rjrl9VJkv/h6W7NIQlzQiN1ecXJG+ehnKd0yGQbYYminmmSwb6O/Jtl0JHKvJL0oLVd+jedLBi0RgeSaAfurg==');
define('NONCE_SALT',       'nBaZvGU+7k7lCk3xiX53VCwUdnwPmvrxH7FHeI0rCN887p+bCU9xKsx2R2Y0HXA7JrJyz1oC0HLsmeI/p2ATcQ==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';





/* Inserted by Local by Flywheel. See: http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy */
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
	$_SERVER['HTTPS'] = 'on';
}

/* Inserted by Local by Flywheel. Fixes $is_nginx global for rewrites. */
if (strpos($_SERVER['SERVER_SOFTWARE'], 'Flywheel/') !== false) {
	$_SERVER['SERVER_SOFTWARE'] = 'nginx/1.10.1';
}
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
