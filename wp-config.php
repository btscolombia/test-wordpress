<?php
/**
 * The base configuration for WordPress
 */

// ** Database settings ** //
define('DB_NAME', $_ENV['WORDPRESS_DB_NAME'] ?: 'railway');
define('DB_USER', $_ENV['WORDPRESS_DB_USER'] ?: 'root');
define('DB_PASSWORD', $_ENV['WORDPRESS_DB_PASSWORD'] ?: '');
define('DB_HOST', $_ENV['WORDPRESS_DB_HOST'] ?: 'mysql-68305d35.railway.internal');
define('DB_CHARSET', 'utf8mb4');
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

// Configuración SSL para Cloudflare
if (isset($_SERVER['HTTP_CF_VISITOR']) && strpos($_SERVER['HTTP_CF_VISITOR'], 'https')) {
    $_SERVER['HTTPS'] = 'on';
}

// URLs dinámicas
define('WP_HOME', 'https://' . $_SERVER['HTTP_HOST']);
define('WP_SITEURL', 'https://' . $_SERVER['HTTP_HOST']);

// Configuración adicional
define
