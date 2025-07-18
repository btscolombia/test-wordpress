<?php
/**
 * The base configuration for WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', $_ENV['WORDPRESS_DB_NAME'] ?: 'railway');

/** Database username */
define('DB_USER', $_ENV['WORDPRESS_DB_USER'] ?: 'root');

/** Database password */
define('DB_PASSWORD', $_ENV['WORDPRESS_DB_PASSWORD'] ?: '');

/** Database hostname */
define('DB_HOST', $_ENV['WORDPRESS_DB_HOST'] ?: 'mysql-68305d35.railway.internal');

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication unique keys and salts.
 */
define('AUTH_KEY',         $_ENV['WORDPRESS_AUTH_KEY'] ?: 'put your unique phrase here');
define('SECURE_AUTH_KEY',  $_ENV['WORDPRESS_SECURE_AUTH_KEY'] ?: 'put your unique phrase here');
define('LOGGED_IN_KEY',    $_ENV['WORDPRESS_LOGGED_IN_KEY'] ?: 'put your unique phrase here');
define('NONCE_KEY',        $_ENV['WORDPRESS_NONCE_KEY'] ?: 'put your unique phrase here');
define('AUTH_SALT',        $_ENV['WORDPRESS_AUTH_SALT'] ?: 'put your unique phrase here');
define('SECURE_AUTH_SALT', $_ENV['WORDPRESS_SECURE_AUTH_SALT'] ?: 'put your unique phrase here');
define('LOGGED_IN_SALT',   $_ENV['WORDPRESS_LOGGED_IN_SALT'] ?: 'put your unique phrase here');
define('NONCE_SALT',       $_ENV['WORDPRESS_NONCE_SALT'] ?: 'put your unique phrase here');

/**#@-*/

/**
 * WordPress database table prefix.
 */
$table_prefix = $_ENV['WORDPRESS_TABLE_PREFIX'] ?: 'wp_';

/**
 * For developers: WordPress debugging mode.
 */
define('WP_DEBUG', $_ENV['WORDPRESS_DEBUG'] === 'true');
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);

// Debug: Log database connection info (REMOVE IN PRODUCTION)
if (WP_DEBUG) {
    error_log('=== WordPress DB Config Debug ===');
    error_log('DB_HOST: ' . DB_HOST);
    error_log('DB_NAME: ' . DB_NAME);
    error_log('DB_USER: ' . DB_USER);
    error_log('DB_PASSWORD: ' . (DB_PASSWORD ? 'SET' : 'NOT SET'));
    error_log('================================');
}

// Configuración SSL para Cloudflare
if (isset($_SERVER['HTTP_CF_VISITOR']) && strpos($_SERVER['HTTP_CF_VISITOR'], 'https')) {
    $_SERVER['HTTPS'] = 'on';
}

// URLs dinámicas
define('WP_HOME', 'https://' . $_SERVER['HTTP_HOST']);
define('WP_SITEURL', 'https://' . $_SERVER['HTTP_HOST']);

// Configuración adicional
define('AUTOMAT
