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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'lgc_wp');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'Dv100319');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         ';IQGo-NnBt-+5F2bClU@f@is31C5yYu&:yheWRy{mgYk5^O?-IE<O<Cx/*5j?7{$');
define('SECURE_AUTH_KEY',  'm|c_O<</2P)G3o[iCGz7pu8g.k>.=|-b*iP4J$h-MMrp}y>R[!tPCj RUu)D^k.a');
define('LOGGED_IN_KEY',    'sEVbFQHzLTk8PRIAqw~2gQ2sL|0rO>=(-Vc4Hg}A#34Dbk2HM//ke9X4velBb7-`');
define('NONCE_KEY',        '2d}zL03E@*iut#ylG&<FNWLhNh]LKI?j%LPu3)2DDk&  Hm0O!:]LyN8wM#1Q;tB');
define('AUTH_SALT',        '*,.SEB[oqRBM9$Y9?]3xt0Q`)q.|5fGA8(tsP}rq1ai18&m^Aql+9lH%QV5=g*4~');
define('SECURE_AUTH_SALT', 'H2L{U%Ma!4RXe2T`(WyHvpj4Rc=q}Zb0a1n<.v*`X>5N55~qWvQ $S=3C~ruk,:[');
define('LOGGED_IN_SALT',   'GU~RS*!5> -/WPXqIZ944}vC??e;~&sK08pqU`5cu-0!C*>)(q}_L?OftmrwH.)`');
define('NONCE_SALT',       '=i{*ue,Sq,c8xFa8hZ!* -0nFIWVTgmdTZ;&v-= j[NnU21Q$<1de#AXLT=6M;qL');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
define( 'UPLOADS', 'wp-content/uploads' );
/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

