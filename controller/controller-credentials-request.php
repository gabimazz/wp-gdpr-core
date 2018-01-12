<?php

namespace wp_gdpr\controller;

use wp_gdpr\lib\Gdpr_Container;

class Controller_Credentials_Request {

	/**
	 * Controller_Credentials_Request constructor.
	 */
	public function __construct( $name ) {
		$this->add_form_shortcode( $name );
	}

	public function add_form_shortcode( $name ) {
		$shortcode = Gdpr_Container::make( 'wp_gdpr\lib\Appsaloon_Shortcode', array( 'name' => $name ) );
		$shortcode->add_content( $this->get_form_html() );
		$shortcode->register_shortcode();
	}

	/**
	 * @return string
	 */
	public function get_form_html() {
		ob_start();
		include_once GDPR_DIR . 'view/front/form.php';
		return ob_get_clean();
	}
}