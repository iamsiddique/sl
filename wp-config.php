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
define('DB_NAME', 'sl');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'mysql');

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
define('AUTH_KEY',         '*yH,Q} x,GU2Ozh%xz~Z.V&][z3f0)Wf@F5;{`PnbB0zI]56z],(q<@9b.+`Y#Ph');
define('SECURE_AUTH_KEY',  '<5u$81fzk=/3GK8^Prs46t-fn~[q/_e9a^q,ob:IY8GuAqQ,GRA+y9/(-^Lb4kY`');
define('LOGGED_IN_KEY',    'zc]8m(AA4w?GIMpf_wu{ vTRVrs)`6H7l8tVI5#L?< 7tOgyOz4@dNR)$6oQ7a?;');
define('NONCE_KEY',        'w7_1o>h^(A]Jn{0$E`9_sxY~G}<LG]RMl]|e~RA:qmB}H^UJ5.{02>4M.U|4B)q=');
define('AUTH_SALT',        '4aWUPtzz%J!@Bl;!,w``>0JRH27 ~^Bv+OU>yM&/df^tJT*0O}(Qcwsw`FpTBS}x');
define('SECURE_AUTH_SALT', '3;r3Z4u@xOSBUz;m6bnxpG@COPpzRW^wsmkG`K1|_GZ5.Q$5sT0n|7YS*bA^mGwy');
define('LOGGED_IN_SALT',   '}evj;u{BDQoG-o^hjB.O_Eq|vvMjv<%`y^Nax9$$C%fqF%H86S+,FZaVj&.(~#L!');
define('NONCE_SALT',       'Xw4j,vx8xEP&;08eilAf=wo9RjhUSMG&!qqm4[$]<eY,ct#C?eIy~(jaI6yMc6Bo');

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
