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
//define('WP_CACHE', true); //Added by WP-Cache Manager
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'itV+3wSTW j1t;G7`W}olgV8 b,*;YKdMlZcs).?s$U?:$hQ~ 6(6g?$1W8m~=v6');
define('SECURE_AUTH_KEY',  'MX*y]|G-7oPVnu-q d]8=s|z)O:-dX2)zJ_-)Q4P-V/XSx+{33dS;9[ IK=I)Jyx');
define('LOGGED_IN_KEY',    'Co-xd069}g)0aKj3U}NZ,_-j%TO%;_E-|julL>XVFx$oFPbXlxt<TO)%V!<(p!My');
define('NONCE_KEY',        'oo[)t:=+JC N~3 +QM5.ZIp.T:Y2O{@*J*>}`iI+bhp 8d<T(Rvv,cawJ9CI8k{3');
define('AUTH_SALT',        'CKSP~Lxm}H|+ LJ74Uj!7_,*-fDOq?c%QvhW3!`_ekLa49,CZ/Ni~L${-<3vhH:w');
define('SECURE_AUTH_SALT', '2-wrbfZj}C(0YKVXXaZL}?Ga-e>U5P8h@i$~57eFhu.rL-s4TFWJV|Vb>swaR.d_');
define('LOGGED_IN_SALT',   'h]q$#(e3Mkb.XRH&f7SC+*@BqWp%uA&#?d:FJW=R1|aMY@{]_43m+<1qfWXH:ASB');
define('NONCE_SALT',       'pp4OH% 9gHgdS2XaJ1tW n.&|S~R4h?R.,,`E+1+9T@VV7TSho_Zd0%Fh&M9c_sq');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'dawns_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
