<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists( 'Visionary_Jetpack' ) ) : 

/**
 * Handles how Jetpack is integrated into the theme.
 * 
 * @package 	Visionary
 * @subpackage 	Jetpack
 * @author 		Studio 164a
 * @since 		1.0.0
 */
class Visionary_Jetpack {

	/**
	 * @var 	Visionary_Theme
	 */
	private $theme;

	/**
	 * This creates an instance of this class. 
	 *
	 * If the visionary_theme_start hook has already run, this will not do anything.
	 * 
	 * @param 	Visionary_Theme 	$theme
	 * @static
	 * @access 	public
	 * @since 	1.0.0
	 */
	public static function start( Visionary_Theme $theme ) {
		if ( ! $theme->is_start() ) {
			return;
		}
		
		new Visionary_Jetpack($theme);	
	}

	/** 
	 * Create object instance.
	 *
	 * @return 	void
	 * @access 	private
	 * @since 	1.0.0
	 */
	private function __construct( Visionary_Theme $theme ) {
		$this->theme = $theme;

		add_action( 'after_setup_theme', array( $this, 'setup_jetpack' ) );
	}

	/**
	 * Define which Jetpack features the theme supports. 
	 *
	 * @return 	void
	 * @access 	public
	 * @since 	1.0.0
	 */
	public function setup_jetpack() {
		/** 
		 * Add support for Infinite Scroll. 
		 * @link 	http://jetpack.me/support/infinite-scroll/
		 */
		add_theme_support( 'infinite-scroll', array(
			'container' => 'main',
			'footer'    => 'page',
		) );	

		/**
		 * Add support for Site Logo. 
		 * @link 	http://jetpack.me/support/site-logo/
		 */
		add_theme_support( 'site-logo', array(
			'header-text' => array(
				'site-title',
				'site-description',
			),
			'size' => 'medium'
		) );
	}
}

endif;