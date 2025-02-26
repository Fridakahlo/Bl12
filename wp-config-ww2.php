<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'bl12');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'simplonco');

/** MySQL hostname */
define('DB_HOST', 'https://www.test.businessladies12.com');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'ow77Kxqf9AE5h81pmGb9wjvGorrLpKpjJmDA0DexvKNnhfCjH5abflegyBEbaTUp');

define('SECURE_AUTH_KEY',  'qjeQeanmdX2FMij5OcoG0zeJQyTs8PpwSeq8P797X5hSjWflSvP7Tq09oKptbuwc');

define('LOGGED_IN_KEY',    '2snM9xOwAJrNq4O7LsywGr4rwkbuAwlhl1YVUWGxOu8BLWCa6cp8xW4zdNskDIwi');

define('NONCE_KEY',        'MQoIMPJe0ixTO4cpdSrCrAfK1KosZuGkOxPRhhazNlikY9NOKIRh1LspCHlbM0kZ');

define('AUTH_SALT',        'OtDD8DozIZblI2Ep19HUKEkYHfoi8ZZ93967pQxskna8GKR48NkMt0lp1mqbTvTZ');

define('SECURE_AUTH_SALT', 'JJXAwbJjIV8nCOLxF9mM2zwsVqRVNdFIP7gDao4suReM7oI1jWIM5Lx9frue38Bv');

define('LOGGED_IN_SALT',   'vqVVVTFGcuMqUKMPKCuKJswOe3XmsJnJH5rnW67LfZg4ONVJr2iPWOjL246lGOnD');

define('NONCE_SALT',       'MYeq2C2FD28uUir1Tk6v96bwlYTfhPgiHhOeANeBPidNQMSOrZfWYCoHDpf8je6u');



/**

 * Other customizations.

 */

define('FS_METHOD','direct');define('FS_CHMOD_DIR',0755);define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');



/**

 * Turn off automatic updates since these are managed upstream.

 */

define('AUTOMATIC_UPDATER_DISABLED', true);



/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'h0z6_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
