<?php
// include parent style
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
}
/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'Home wide 1',
		'id'            => 'home_wide_1',
		'before_widget' => '<div class="widget-area">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="rounded">',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );


//http://www.wpbeginner.com/beginners-guide/6-cool-things-you-can-do-with-sticky-posts-in-wordpress/
function wpb_latest_sticky() { 

/* Get all sticky posts */
$sticky = get_option( 'sticky_posts' );

/* Sort the stickies with the newest ones at the top */
rsort( $sticky );

/* Get the 5 newest stickies (change 5 for a different number) */
$sticky = array_slice( $sticky, 0, 5 );

/* Query sticky posts */
$the_query = new WP_Query( array( 'post__in' => $sticky, 'ignore_sticky_posts' => 1 ) );
// The Loop
if ( $the_query->have_posts() ) {
	$return .= '<ul>';
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		$return .= '<li><a href="' .get_permalink(). '" title="'  . get_the_title() . '">' . get_the_title() . '</a><br />' . get_the_excerpt(). '</li>';
		
	}
	$return .= '</ul>';
	
} else {
	// no posts found
}
/* Restore original Post Data */
wp_reset_postdata();

return $return; 

} 
add_shortcode('latest_stickies', 'wpb_latest_sticky');

?>