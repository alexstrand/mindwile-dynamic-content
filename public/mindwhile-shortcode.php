<?php

global $replacementJavascript;

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