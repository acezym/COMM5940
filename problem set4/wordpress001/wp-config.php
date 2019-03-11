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
define('DB_NAME', 'wordpress001');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '*!{==I(gQ&I{^+8=<o=#g@O=1Uf3~,$FvVh#5Yo9.?E~D_x2`e5zFQ#nl(`;/fS]');
define('SECURE_AUTH_KEY',  '( 4ZS5DSmfj)1;.23>pMiC4Y6>&?:S>`,=hI&#Ujl-|zyy` .0/X|G|t3lTX(4D,');
define('LOGGED_IN_KEY',    'X $+d g{e!&s^ToS.w#ub&<;:wKL?V%(B^VKw7h}[MqC4%Xu/`eO%O,}?v?jCn+X');
define('NONCE_KEY',        'XAx^Yu}6gT.b53Q7puFkz_6H|UWTI1v9Y9TG4Gr>PekoD3]fu2g%AuzY!DF$N/.o');
define('AUTH_SALT',        'dYA{{H!%mkbr^^;(!]P-2y JvtFNMdyo]VQ:mLpMn1r2/&;>KWHm+,Q|hZ~<4XC,');
define('SECURE_AUTH_SALT', 'qxtM0=7yUHX1ZsH5:yT(x@44W5K)80OA?Wg3Ay-*XCo%DPVT~hC1]HH`Q8SZoMjL');
define('LOGGED_IN_SALT',   'W~`n8ws31[UV1%p|U%#PLT7:Krn`oGX1*xtb@Op&RwyrG4hW5RP8qEW9BNC<oPtG');
define('NONCE_SALT',       'bVef._@%jsLLf<~|kS_VukET4fIjfEh{J+hTF*?h3`Ot@Qr|1p1Y9*-u0N1W?^pE');

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

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
