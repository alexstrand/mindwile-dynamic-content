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

global $replacementJavascript;

/**
 * Register the Custom Content post type
 *
 * @since    1.0.0
 */
function mindwile_register_personlized_content() {

	$labels = [
		"name" => esc_html__( "Personlized content", "mindwile" ),
		"singular_name" => esc_html__( "Personlized content", "mindwile" ),
		"menu_name" => esc_html__( "Personlized content", "mindwile" ),
		"all_items" => esc_html__( "All Personlized content", "mindwile" ),
		"add_new" => esc_html__( "Add new", "mindwile" ),
		"add_new_item" => esc_html__( "Add new Personlized content", "mindwile" ),
		"edit_item" => esc_html__( "Edit Personlized content", "mindwile" ),
		"new_item" => esc_html__( "New Personlized content", "mindwile" ),
		"view_item" => esc_html__( "View Personlized content", "mindwile" ),
		"view_items" => esc_html__( "View Personlized content", "mindwile" ),
		"search_items" => esc_html__( "Search Personlized content", "mindwile" ),
		"not_found" => esc_html__( "No Personlized content found", "mindwile" ),
		"not_found_in_trash" => esc_html__( "No Personlized content found in trash", "mindwile" ),
		"parent" => esc_html__( "Parent Personlized content:", "mindwile" ),
		"featured_image" => esc_html__( "Featured image for this Personlized content", "mindwile" ),
		"set_featured_image" => esc_html__( "Set featured image for this Personlized content", "mindwile" ),
		"remove_featured_image" => esc_html__( "Remove featured image for this Personlized content", "mindwile" ),
		"use_featured_image" => esc_html__( "Use as featured image for this Personlized content", "mindwile" ),
		"archives" => esc_html__( "Personlized content archives", "mindwile" ),
		"insert_into_item" => esc_html__( "Insert into Personlized content", "mindwile" ),
		"uploaded_to_this_item" => esc_html__( "Upload to this Personlized content", "mindwile" ),
		"filter_items_list" => esc_html__( "Filter Personlized content list", "mindwile" ),
		"items_list_navigation" => esc_html__( "Personlized content list navigation", "mindwile" ),
		"items_list" => esc_html__( "Personlized content list", "mindwile" ),
		"attributes" => esc_html__( "Personlized content attributes", "mindwile" ),
		"name_admin_bar" => esc_html__( "Personlized content", "mindwile" ),
		"item_published" => esc_html__( "Personlized content published", "mindwile" ),
		"item_published_privately" => esc_html__( "Personlized content published privately.", "mindwile" ),
		"item_reverted_to_draft" => esc_html__( "Personlized content reverted to draft.", "mindwile" ),
		"item_scheduled" => esc_html__( "Personlized content scheduled", "mindwile" ),
		"item_updated" => esc_html__( "Personlized content updated.", "mindwile" ),
		"parent_item_colon" => esc_html__( "Parent Personlized content:", "mindwile" ),
	];

	$args = [
		"label" => esc_html__( "Personlized content", "mindwile" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => false,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "personlized_content", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-star-filled",
		"supports" => [ "title" ],
		"show_in_graphql" => false,
	];

	register_post_type( "personlized_content", $args );
}

add_action( 'init', 'mindwile_register_personlized_content' );

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

// Query for personalized content
function mindwhile_generate_shortcodes() {
	
	// Query for personalized content posts
	$the_query = new WP_Query(['post_type' => 'personlized_content']);

	// Check for posts or end function
	if ( ! $the_query->posts) return;
	
	// Loop through posts and create shortcode
	$jsArray = [];
	foreach($the_query->posts as $post) {
		$jsArray[] = mindwile_add_shortcode($post->ID);
	}
	
	ob_start(); ?>
	
		<!-- Mindwile JS Demo -->
		<script type="text/javascript">
			<?php foreach($jsArray as $js) { ?>
				<?= $js; ?>
			<?php } ?>
		</script>

	<?php
	$GLOBALS['replacementJavascript'] = ob_get_contents();
	ob_end_clean();
	
}
add_action('init', 'mindwhile_generate_shortcodes');


/**
 * 
 * Register shortcode for individual post
 * 
 **/
function mindwile_add_shortcode($postID = NULL) {
	
	if ( ! $postID) return;  
	
	$sanitizedAttribute = sanitize_title(get_the_title($postID)) . "-" . uniqid();
	
	$shortcodeOutput = function() use($postID, $sanitizedAttribute) {
		
		// Return the appropriate HTML output
		return "<div data-pc='{$sanitizedAttribute}'></div>";
	};
	
	// Generate the shortcode
	$sanitizedTitle = sanitize_title(get_the_title($postID));
	add_shortcode("pc-{$sanitizedTitle}", $shortcodeOutput);
	
	// Collect personalized content fields for this post
	$defaultContent = get_field('default_text', $postID);
	$mindwileRank = get_mindwile_rank();	
	$outputContent = $mindwileRank === 0 ? $defaultContent : get_personalized_content($postID, $mindwileRank);
	
	// Load replacement javascript
	//return "document.body.innerHTML.replace('data-pc-{$sanitizedAttribute}', '{$outputContent}');\r";
	return "
	if (document.querySelector(\"div[data-pc='{$sanitizedAttribute}']\")) {
		document.querySelector(\"div[data-pc='{$sanitizedAttribute}']\").replaceWith('{$outputContent}');
	}";
}


/**
 * 
 * Get appropriate personlized content
 * 
 **/
function get_personalized_content($postID = null, $mindwileRank) {
	
	if ( ! $postID or ! is_array(get_field('personalized_content', $postID))) return;
	
	$contentArray = array_filter(get_field('personalized_content', $postID), function($pContent) use($postID, $mindwileRank) {
		return $pContent['personlized_text'] !== "" && array_search($pContent, get_field('personalized_content', $postID)) <= $mindwileRank;
	});
	
	if (isset($contentArray[$mindwileRank])) {
		return $contentArray[$mindwileRank]['personlized_text'];
	} else {
		return end($contentArray)['personlized_text'];
	}
}


/**
 * 
 * Get mindwile cookie for current user
 * 
 **/
function get_mindwile_rank() {
	
	$mindwileRank = isset($_COOKIE['imqtseg']) ? ($_COOKIE['imqtseg'] / 100) - 1 : 0;

	return $mindwileRank;  
}


/**
 * 
 * Generate custom wp column for the pc post type
 * 
 **/
add_filter( 'manage_personlized_content_posts_columns', 'custom_manage_post_column_test' );

function custom_manage_post_column_test( $columns ) {
    
    $columns['pc_shortcodes'] = 'Shortcode';
    
    return $columns;
}


/**
 * 
 * Generate and insert shortcode into the custom wp column for the pc post type
 * 
 **/
add_action( 'manage_personlized_content_posts_custom_column', 'custom_manage_post_column_test_data', 10, 2 );

function custom_manage_post_column_test_data( $column_name, $post_id ) {
    if( $column_name == 'pc_shortcodes' ) {
        
        $sanitizedTitle = sanitize_title(get_the_title($post_id));
        echo "[pc-{$sanitizedTitle}]";
    } 
}


/**
 * 
 * Load mindwile script into footer.php
 * 
 **/
function mindwileScript() { ?>

<script type='text/javascript' src="/wp-content/plugins/mindwiledemo/public/js/mindwile-script.js"></script>

<?php } 

add_action('wp_head', 'mindwileScript');

add_action('wp_footer', function() {
	print $GLOBALS['replacementJavascript'];
});