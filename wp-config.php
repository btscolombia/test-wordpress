<?php
/**
 * The base configuration for WordPress
 */

// ** Database settings ** //
define('DB_NAME', 'railway');
define('DB_USER', 'root');
define('DB_PASSWORD', 'oTRpSwMtEuexbxlGHUdJeVvNCXRuoKuQ');
define('DB_HOST', 'mysql-68305d35.railway.internal');
define('DB_CHARSET', 'utf8mb4');
define('DB_COLLATE', '');

/**
 * Authentication unique keys and salts.
 */
define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');

/**
 * WordPress database table prefix.
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 */
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', true);

/**
 * WordPress URLs
 */
define('WP_HOME', 'https://' . $_SERVER['HTTP_HOST']);
define('WP_SITEURL', 'https://' . $_SERVER['HTTP_HOST']);

/**
 * Miscellaneous
 */
define('AUTOMATIC_UPDATER_DISABLED', true);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
    define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
