<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://devhouse.se
 * @since      1.0.0
 *
 * @package    Mindwiledemo
 * @subpackage Mindwiledemo/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Mindwiledemo
 * @subpackage Mindwiledemo/public
 * @author     Alex Demo <alex@devhouse.se>
 */
class Mindwiledemo_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Mindwiledemo_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Mindwiledemo_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/mindwiledemo-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Mindwiledemo_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Mindwiledemo_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/mindwiledemo-public.js', array( 'jquery' ), $this->version, false );

	}

}

require 'mindwhile-shortcode.php';
require 'mindwhile-posttype.php';


// Remove default post editor
add_action( 'init', function() {
    remove_post_type_support( 'personlized_content', 'editor' );
}, 99);

add_filter('acf/load_value/key=field_641c2277c15e8', 'ek_option_defaults', 10, 3);
function ek_option_defaults($value, $post_id, $field) {
  if ($value === false) {
      $value = array(
          array(
              'field_641c22d633fe4' => '',
          ),
          array(
              'field_641c22d633fe4' => '',
          ),
          array(
              'field_641c22d633fe4' => '',
          ),
          array(
              'field_641c22d633fe4' => '',
          ),
          array(
              'field_641c22d633fe4' => '',
          )
          
        //etc

      );
  }
  return $value;
}


/**
 * Get mindwile cookie for current user
 * 
 * @since    1.0.0
 **/
function get_mindwile_rank() {
	
	$mindwileRank = isset($_COOKIE['imqtseg']) ? ($_COOKIE['imqtseg'] / 100) - 1 : 0;

	return $mindwileRank;  
}


/**
 * Generate custom wp column for the pc post type
 * 
 * @since    1.0.0
 **/
add_filter( 'manage_personlized_content_posts_columns', 'custom_manage_post_column_test' );

function custom_manage_post_column_test( $columns ) {
    
    $columns['pc_shortcodes'] = 'Shortcode';
    
    return $columns;
}


/**
 * Generate and insert shortcode into the custom wp column for the pc post type
 * 
 * @since    1.0.0
 **/
add_action( 'manage_personlized_content_posts_custom_column', 'custom_manage_post_column_test_data', 10, 2 );

function custom_manage_post_column_test_data( $column_name, $post_id ) {
    if( $column_name == 'pc_shortcodes' ) {
        
        $sanitizedTitle = sanitize_title(get_the_title($post_id));
        echo "[pc-{$sanitizedTitle}]";
    } 
}


/**
 * Load mindwile script into footer.php
 * 
 * @since    1.0.0
 **/
function mindwileScript() { ?>

<script type='text/javascript' src="/wp-content/plugins/mindwiledemo/public/js/mindwile-script.js"></script>

<?php } 

add_action('wp_head', 'mindwileScript');

add_action('wp_footer', function() {
	print $GLOBALS['replacementJavascript'];
});