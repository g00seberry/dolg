<?php
/**
 * Production WordPress configuration
 * Copy this to wp-config.php on your Linux hosting
 *
 * IMPORTANT: Update database credentials and domain below
 */

// ** Database settings - UPDATE THESE FOR YOUR HOSTING ** //
define( 'DB_NAME', 'your_database_name' );
define( 'DB_USER', 'your_db_username' );
define( 'DB_PASSWORD', 'your_db_password' );
define( 'DB_HOST', 'localhost' );
define( 'DB_CHARSET', 'utf8mb4' );
define( 'DB_COLLATE', '' );

// ** UPDATE YOUR DOMAIN ** //
define( 'WP_HOME', 'https://your-domain.com' );
define( 'WP_SITEURL', 'https://your-domain.com' );

/**#@+
 * Authentication unique keys and salts.
 * Generate new ones at: https://api.wordpress.org/secret-key/1.1/salt/
 */
define( 'AUTH_KEY',         'put your unique phrase here' );
define( 'SECURE_AUTH_KEY',  'put your unique phrase here' );
define( 'LOGGED_IN_KEY',    'put your unique phrase here' );
define( 'NONCE_KEY',        'put your unique phrase here' );
define( 'AUTH_SALT',        'put your unique phrase here' );
define( 'SECURE_AUTH_SALT', 'put your unique phrase here' );
define( 'LOGGED_IN_SALT',   'put your unique phrase here' );
define( 'NONCE_SALT',       'put your unique phrase here' );

/**#@-*/

/**
 * WordPress database table prefix.
 */
$table_prefix = 'wp_';

/**
 * Production debugging - logs errors but doesn't display them
 * Check /wp-content/debug.log for errors
 */
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );
ini_set( 'display_errors', 0 );

/**
 * Security and performance for production
 */
define( 'DISALLOW_FILE_EDIT', true );
define( 'AUTOMATIC_UPDATER_DISABLED', true );
define( 'WP_POST_REVISIONS', 3 );
define( 'EMPTY_TRASH_DAYS', 7 );

/**
 * Memory limits for complex themes (adjust if needed)
 */
define( 'WP_MEMORY_LIMIT', '512M' );
ini_set( 'memory_limit', '512M' );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
