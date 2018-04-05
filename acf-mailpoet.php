<?php
/*
 Plugin Name: Advanced Custom Fields: MAILPOET
 Version: 2.0
 Plugin URI: http://www.beapi.fr
 Description: Add Mailpoet form selector
 Author: BE API Technical team
 Author URI: http://www.beapi.fr
 Domain Path: languages
 Text Domain: acf-mailpoet

 ----

 Copyright 2017 BE API Technical team (human@beapi.fr)

 This program is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with this program; if not, write to the Free Software
 Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */

if ( ! defined( 'ABSPATH' ) ) {
	die();
}

define( 'ACF_MAILPO_VERSION', '2.0' );
define( 'ACF_MAILPO_DIR', plugin_dir_path( __FILE__ ) );

class acf_field_mailpoet_plugin {

	/**
	 * Constructor.
	 *
	 * Load plugin's translation and register acf MAILPO fields.
	 * @author Julien Maury
	 * @since 1.0.0
	 */
	function __construct() {

		add_action( 'init', array( __CLASS__, 'load_translation' ), 1 );

		// Register ACF fields
		add_action( 'acf/include_field_types', array( __CLASS__, 'register_field_v5' ) );
	}

	/**
	 * Load plugin translation.
	 * @author Julien Maury
	 * @since 1.0.0
	 */
	public static function load_translation() {
		load_plugin_textdomain(
			'acf-mailpoet',
			false,
			dirname( plugin_basename( __FILE__ ) ) . '/languages'
		);
	}

	/**
	 * Register MAILPO icon field for ACF v5.
	 * @author Julien Maury
	 * @since 1.0.0
	 */
	public static function register_field_v5() {
		if ( ! class_exists( 'WYSIJA' ) && ! class_exists( '\MailPoet\Models\Form' ) ) {
			return false;
		}

		include_once( ACF_MAILPO_DIR . 'fields/field-v5.php' );
		new acf_field_form_wisija_select();
	}
}

/**
 * Init plugin.
 * @author Julien Maury
 * @since 1.0.0
 */
function acf_field_mailpoet() {
	new acf_field_mailpoet_plugin();
}
add_action( 'plugins_loaded', 'acf_field_mailpoet' );
