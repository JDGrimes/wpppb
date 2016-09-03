<?php

/**
 * Install a plugin remotely.
 *
 * @package WP_Plugin_PHPUnit_Bootstrap
 * @since 0.1.0
 */

$plugins_info     = json_decode( $argv[1], true );
$config_file_path = $argv[2];
$is_multisite     = (bool) $argv[3];
$custom_files     = json_decode( $argv[4], true );

/**
 * The bootstrap file for loading WordPress.
 *
 * @since 0.1.0
 */
require dirname( __FILE__ ) . '/bootstrap.php';

/**
 * The plugin API from WordPress.
 *
 * @since 0.1.0
 */
require_once ABSPATH . '/wp-admin/includes/plugin.php';

// Activate the plugins.
foreach ( $plugins_info as $plugin => $info ) {
	activate_plugin( $plugin, '', $info['network_wide'] );
}

// Load extra files.
foreach ( $custom_files as $file ) {
	require $file;
}

// EOF
