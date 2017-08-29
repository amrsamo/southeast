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
define('DB_NAME', 'southeast');

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

/** Upload themes without FTP connection */
define('FS_METHOD', 'direct');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '`]dR<;}Xxbr.Qm5j-<BYx )AUUTrP!7&OL}hUltM^obK^)p/,sFi?xoZ~Wt|u~HJ');
define('SECURE_AUTH_KEY',  '~>4rb18)(@v|B,4v/A(ot^1SMnvq*VP=[~>(XcKG9=R-scb [E|s9P |?PX3n`qG');
define('LOGGED_IN_KEY',    '6Dsh_ERGy,TLhsi`<igpayiu.PeDBb*6(Uc^BTxB`gpi_Gp<}zZ}C}bT&:l2A Y6');
define('NONCE_KEY',        '[o >+(54F4v NH|~uuU:Vw_-y#=k3jX!O^HTDY)s*E<1PGU7,}vUf$-`A~gmf89d');
define('AUTH_SALT',        'Hog2a$PTG0#VZl)C0`7;M$.F~$ZYgrtt!Qm>QSldX4vP@Q?KeYh27UN`>DSz]DHA');
define('SECURE_AUTH_SALT', 'qJRn<G^]`Z=-D/c#<[s-),4na>!-)K7`pfk@R_y;3Bu@AY0?UBdva+5[/YJKv7<F');
define('LOGGED_IN_SALT',   'ERAW|ytG@tWP[s3}cJI0m%7M<8*X@q(dod;fh:froui*8/YYER_uMZLB%- *hn%k');
define('NONCE_SALT',       'Ph}pirmGQANlf?dUo<D_Xq$tu<&j|$,)<}w/2O$XuKrZxqn`IgcTOEzi~_mr[_9t');

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
