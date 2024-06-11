<?php

/**
 * Plugin Name: Bricks Extended Learndash Addon
 * Version: 1.0.0
 * Plugin URI: http://www.appwizards.in/
 * Description: This is your starter template for your next WordPress plugin.
 * Author: Appwizards
 * Author URI: http://www.appwizards.in/
 * Requires at least: 4.0
 * Tested up to: 4.0
 *
 * Text Domain: bricks-extended-learndash-addon
 * Domain Path: /lang/
 *
 * @package WordPress
 * @author Appwizards
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
	exit;
}

// Load plugin class files.
require_once 'includes/class-bricks-extended-learndash-addon.php';
require_once 'includes/class-bricks-extended-learndash-addon-settings.php';


// Load plugin libraries.
require_once 'includes/lib/class-bricks-extended-learndash-addon-admin-api.php';
require_once 'includes/lib/class-bricks-extended-learndash-addon-post-type.php';
require_once 'includes/lib/class-bricks-extended-learndash-addon-taxonomy.php';

/**
 * Returns the main instance of Bricks_Extended_Learndash_Addon to prevent the need to use globals.
 *
 * @since  1.0.0
 * @return object Bricks_Extended_Learndash_Addon
 */
function bricks_extended_learndash_addon()
{
	$instance = Bricks_Extended_Learndash_Addon::instance(__FILE__, '1.0.0');

	if (is_null($instance->settings)) {
		$instance->settings = Bricks_Extended_Learndash_Addon_Settings::instance($instance);
	}

	return $instance;
}

bricks_extended_learndash_addon();
