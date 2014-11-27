<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists( 'Sofa_Customizer_Styles' ) ) : 

/**
 * Sofa Customizer Styles
 *
 * @class 		Sofa_Customizer_Styles
 * @author 		Studio 164a
 * @category 	Frontend
 * @package 	Sofa
 * @subpackage  Customizer
 * @since 		1.0.0
 */
class Sofa_Customizer_Styles {

	/**
	 * @var Sofa_Theme        $theme
	 */
	private $theme;

	/**
	 * Creates an instance of this class. 
	 * 
	 * This can only be run on the sofa_theme_start hook. You should
	 * never need to instantiate it again (if you do, I'd love to hear
	 * your use case).
	 *
	 * @static
	 * 
	 * @param 	Sofa_Theme 	$theme
	 * @return 	void
	 * @access 	public
	 * @since 	1.0.0
	 */
	public static function start( Sofa_Theme $theme ) {
		if ( ! $theme->is_start() ) {
			return;
		}

		new Sofa_Customizer_Styles( $theme );
	}

	/**
	 * Object constructor. 
	 *
	 * @param 	Sofa_Theme 	$theme
	 * @return 	void
	 * @access 	private
	 * @since 	1.0.0
	 */
	private function __construct( Sofa_Theme $theme ) {
		$this->theme = $theme;

		add_action( 'wp_head', array( $this, 'output_styles' ) );

        do_action( 'sofa_customizer_styles', $this );
	}

    /**
     * Return the key used to store customizer styles as a transient.
     *
     * @static
     * @return  string
     * @access  public
     * @since   1.0.0
     */
    public static function get_transient_key() {
        return 'Sofa_customizer_styles';
    }

	/**
     * Insert output into end of <head></head> section.
     *
     * @hook    wp_head
     * @return 	void
     */
    public function output_styles() {  
        /**
         * Check for saved customizer styles. 
         */
        $styles = get_transient( self::get_transient_key() );      
            
        /**
         * If we're in debug mode, regenerate the styles on every page load. 
         */
        if ( defined( 'SOFA_DEBUG' ) && true === SOFA_DEBUG ) {
            $styles = false;
        }

        /**
         * 
         */
        if ( false === $styles ) {
            ob_start();
            ?>
<style media="all" type="text/css">   
</style>                    
            <?php 
            $styles = ob_get_clean();

            $styles = $this->compress_css( $styles );

            // Cache the styles
            set_transient( self::get_transient_key(), $styles );
        }

        // Print the styles
        echo $styles;
    }

    /**
     * A simple CSS compression method.
     *
     * Removes all comments, removes spaces after colons and strips out all the whitespace. 
     *
     * @link    http://manas.tungare.name/software/css-compression-in-php/
     * 
     * @param   string  $css    The block of CSS to be compressed.
     * @return  string          The compressed block of CSS.
     * @access  private
     * @since   1.0.0
     */
    private function compress_css( $css ) {
        // Remove comments
        $css = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css);

        // Remove space after colons
        $css = str_replace(': ', ':', $css);
         
        // Remove whitespace
        $css = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $css);

        return $css;
    }
}

endif;