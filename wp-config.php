<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'admin_giatruyenfood' );

/** Database username */
define( 'DB_USER', 'admin_giatruyenfood' );

/** Database password */
define( 'DB_PASSWORD', 'h3uk4S89@' );

/** Database hostname */
define( 'DB_HOST', '202.143.110.22' );

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
define( 'AUTH_KEY',         'Mzh3xJtIMbSfqcYUOwKShndEVqPPDdXjYwc9iAUrrlAgING02x9WnSQY0ZrERbvj' );
define( 'SECURE_AUTH_KEY',  'sJ7MHQ6OsYY6QOfRn0TONxLA998DHUKzIn5xRCRiS2SE9egQJhwVpvt7zfzG73r3' );
define( 'LOGGED_IN_KEY',    'TgbWGMWdHwV07GENkwBM9IBGZLaO8Yd2amjPg8fbiPYueyQzWdI89eBp34KoR7iJ' );
define( 'NONCE_KEY',        'U1PcujPTfxMtlH2DqB9WzwMDHB5sFq13e3Toxp9vH1jTUV3KX8u82fM6ieSOGM8f' );
define( 'AUTH_SALT',        '46QJSq7o1bbbFAkYkjRzBPk25Z6p1FsXXEj3ntMj6BKzflJoJqQ3yIIcx9tpglui' );
define( 'SECURE_AUTH_SALT', 'ksdyR9KKZrbh6mzO3EOGdCdO7VeGbJANldwJOhdBvCfxfQVxf8NQJDoJMMyaANpQ' );
define( 'LOGGED_IN_SALT',   'DGVrftej2myXgl3gcojbYiHti1axNZnl9gXWD2P1V1h6G71MHFo9OVLBfRgHAYI2' );
define( 'NONCE_SALT',       '5d2Bep6JgUv3wdsd0L20jtxzaCdId4QNzfce3xeUlPnULpAvUCAjyETUHErpl4yI' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
