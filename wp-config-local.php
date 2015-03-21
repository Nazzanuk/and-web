<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'andigital');

/** MySQL database password */
define('DB_PASSWORD', 'AND1g1ta!');

/** MySQL hostname */
define('DB_HOST', 'andigital-website-db.ce0ns8jbyyc2.eu-west-1.rds.amazonaws.com:3306');

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
define('AUTH_KEY',         '7/IQ^9S8xOL=ZvH3hx!HHZ5:cQ%S906..nPuS`[aK2F)/HZdOutuq}5^7Zo++kVh');
define('SECURE_AUTH_KEY',  'y^J_zg|@DU,O![=2(O~#!_*bUERNFV%L$H-`R/0Q^Ww!R64La5sypK[FBQR*!pLB');
define('LOGGED_IN_KEY',    'PLvdsh%rg5Jq4Y`?+bBl>~76M:F$76B= Q@SbLg[7:{SvH5_V*E>mVs|!_+$uJ~w');
define('NONCE_KEY',        'kK,I*N; cjNEEk5Rybu#$}H[ghPX*|>& $#-7$+8v/qs.q6_tY*7H,v|(rGXx[pl');
define('AUTH_SALT',        'ax%K</NSM65Ml^7ruQ]A2GASk6?sB;bH+HfO6k__Fw:lHXIlq*|pXZ]yw_ea#JL%');
define('SECURE_AUTH_SALT', 'kS(+B-C4!?=6K$-}!+qcpVCScV#oS/[u+e#(Yxx)-t)cUTH6#w&C-E*~Vfq2vCou');
define('LOGGED_IN_SALT',   'TC%0blN@*d[{RO<apMrhO5`F&UO 62uh0|%i3<>g.]w+WOAU,y-T[rh2_Z7B>/K`');
define('NONCE_SALT',       'JL2u|!FQ#WxfvWS5uWK{~Ady__$fq5P[y>K}Ar-@p>U@e.WjcYh[!rLnm7W_/^5a');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);
define('RELOCATE',true);
define('WP_DEBUG', true);


define('WP_HOME','http://localhost:8888');
define('WP_SITEURL','http://localhost:8888');


/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
