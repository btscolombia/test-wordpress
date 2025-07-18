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
define('DB_NAME', $_ENV['WORDPRESS_DB_NAME'] ?: 'railway');

/** Database username */
define('DB_USER', $_ENV['WORDPRESS_DB_USER'] ?: 'root');

/** Database password */
define('DB_PASSWORD', $_ENV['WORDPRESS_DB_PASSWORD']);

/** Database hostname */
define('DB_HOST', $_ENV['WORDPRESS_DB_HOST'] ?: 'mysql.railway.internal');

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

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
define('AUTH_KEY',         $_ENV['WORDPRESS_AUTH_KEY'] ?: 'tu-clave-aqui');
define('SECURE_AUTH_KEY',  $_ENV['WORDPRESS_SECURE_AUTH_KEY'] ?: 'tu-clave-aqui');
define('LOGGED_IN_KEY',    $_ENV['WORDPRESS_LOGGED_IN_KEY'] ?: 'tu-clave-aqui');
define('NONCE_KEY',        $_ENV['WORDPRESS_NONCE_KEY'] ?: 'tu-clave-aqui');

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
// Configuración SSL para Cloudflare
if (isset($_SERVER['HTTP_CF_VISITOR']) && strpos($_SERVER['HTTP_CF_VISITOR'], 'https')) {
    $_SERVER['HTTPS'] = 'on';
}

// URLs dinámicas
define('WP_HOME', 'https://' . $_SERVER['HTTP_HOST']);
define('WP_SITEURL', 'https://' . $_SERVER['HTTP_HOST']);

// Configuración adicional
define('WP_DEBUG', $_ENV['WORDPRESS_DEBUG'] === 'true');
define('AUTOMATIC_UPDATER_DISABLED', true);

$table_prefix = $_ENV['WORDPRESS_TABLE_PREFIX'] ?: 'wp_';

if (!defined('ABSPATH')) {
    define('ABSPATH', __DIR__ . '/');
}

require_once ABSPATH . 'wp-settings.php';
?> 