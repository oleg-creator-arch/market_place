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

 * @link https://wordpress.org/support/article/editing-wp-config-php/

 *

 * @package WordPress

 */


// ** MySQL settings - You can get this info from your web host ** //

/** The name of the database for WordPress */

define( 'DB_NAME', "wordpressgrundsolo" );


/** MySQL database username */

define( 'DB_USER', "root" );


/** MySQL database password */

define( 'DB_PASSWORD', "" );


/** MySQL hostname */

define( 'DB_HOST', "localhost" );


/** Database Charset to use in creating database tables. */

define( 'DB_CHARSET', 'utf8mb4' );


/** The Database Collate type. Don't change this if in doubt. */

define( 'DB_COLLATE', '' );


/**#@+

 * Authentication Unique Keys and Salts.

 *

 * Change these to different unique phrases!

 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}

 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.

 *

 * @since 2.6.0

 */

define( 'AUTH_KEY',         'a$(G_XV]~T6b<lcJaPkyqO64/4ssPlHkbt@SH+CCs~)p1-uaJ9+n-~)V]?:8 h41' );

define( 'SECURE_AUTH_KEY',  '4*+b%ub!mu_2o(fD=jGc#Bl`yW$*P`Q/]-wYuQ+ak6DO/t*aMY|@7S {@3kTF#E@' );

define( 'LOGGED_IN_KEY',    'Zqoq-`>EbISzG>>>m#Yc(YdaH!w?Mn=C+lx)1~BCu7Q:M2H=g8/`&pm6a<}r[O$A' );

define( 'NONCE_KEY',        '$/RZVigWi4-eX>o8hXvub2lxd>BR<q+:Zn:9aZhu;:Xbb@nHj<`o?B:-(yM8quN$' );

define( 'AUTH_SALT',        'Y D:ZBQjPO)rJu4U^ZjmkKh@+iv@u<8&FLk #!LCDWk}H6c1WOhg]^NPH)b!iRik' );

define( 'SECURE_AUTH_SALT', 'C:~8C_E)TPsvvpt%;`.l:`)pX6fl8oWG?4|7x$&W!!{oKRGZ{%jPPEb4Jxvh{3?~' );

define( 'LOGGED_IN_SALT',   'SrOW7.>eu9khxf?<RQLJA_J=1T0{94k)wjiZEsPBz>G(b8}7Pq`{va{GoF/5JCUq' );

define( 'NONCE_SALT',       '*-SHh@fn[ofA3{9EdSFS&PmWfN?]P+QyHO`.ca:0GID>Aj.fjrFd6H,2RTUA}kPs' );


/**#@-*/


/**

 * WordPress Database Table prefix.

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

 * @link https://wordpress.org/support/article/debugging-in-wordpress/

 */


define('WP_DEBUG', true);

define('WP_DEBUG_LOG', true);

define('WP_DEBUG_DISPLAY', false);

define( 'SCRIPT_DEBUG', true );


/* That's all, stop editing! Happy publishing. */


/** Absolute path to the WordPress directory. */

if ( ! defined( 'ABSPATH' ) ) {

	define( 'ABSPATH', __DIR__ . '/' );

}


/** Sets up WordPress vars and included files. */

require_once ABSPATH . 'wp-settings.php';

