<?php
/**
 * Enqueue assets
 * @package Yudiho
 */

namespace Yudiho_THEME\Inc;

use Yudiho_THEME\Inc\Traits\Singleton;

class Assets {
	use Singleton;

	protected function __construct() {
		$this->setup_hooks();
	}

	protected function setup_hooks() {
		/**
		 * Actions.
		 */
		add_action( 'wp_enqueue_scripts', [ $this, 'register_styles' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'register_scripts' ] );
	}

	public function register_styles() {
		wp_register_style( 'style-css', YUDIHO_DIR_URI . "/style.css", array(), true, 'all' );
		wp_enqueue_style( 'style-css' );

	}

	public function register_scripts() {
		wp_register_script( 'app-js', YUDIHO_DIR_URI . "/assets/js/app.js", array(), true );
		wp_enqueue_script( 'app-js' );

	}

}