<?php
/**
 * Plugin Name: MU Migration
 * Plugin URI: http://10up.com
 * Description: A set of WP-CLI commands to support the migration of single WordPress instances over to multisite
 * Version: 0.3.5
 * Author: Nícholas André, 10up
 * Author URI: http://10up.com
 *
 * @package TenUp\MU_Migration
 */

 if ( ! defined( 'TENUP_MU_MIGRATION_VERSION' ) ) {
	define( 'TENUP_MU_MIGRATION_VERSION', '0.3.5' );
	define( 'TENUP_MU_MIGRATION_COMMANDS_PATH', __DIR__ . '/includes/commands/' );
 }

// Only load this plugin once and bail if WP CLI is not present
if (  ! defined( 'WP_CLI' ) ) {
	return;
}

if ( version_compare( PHP_VERSION, '8.0.0' ) < 0 ) {
   WP_CLI::error( 'MU-Migration requires PHP >= 8.0' );
}

if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
}

require_once __DIR__ . '/includes/helpers.php';

require_once( TENUP_MU_MIGRATION_COMMANDS_PATH . 'class-mu-migration.php' );
require_once( TENUP_MU_MIGRATION_COMMANDS_PATH . 'class-mu-migration-base.php'      );
require_once( TENUP_MU_MIGRATION_COMMANDS_PATH . 'class-mu-migration-export.php'    );
require_once( TENUP_MU_MIGRATION_COMMANDS_PATH . 'class-mu-migration-import.php'    );
require_once( TENUP_MU_MIGRATION_COMMANDS_PATH . 'class-mu-migration-posts.php'     );
require_once( TENUP_MU_MIGRATION_COMMANDS_PATH . 'class-mu-migration-users.php'     );
