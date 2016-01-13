<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'template-parts/content', 'page' );
			
			// Sticky Slider
			// https://wordpress.org/plugins/sticky-slider/
			if(function_exists('sticky_slider')) { sticky_slider(); }
			
			
			/*
			<ul>
02
// Define our WP Query Parameters
03
<?php $the_query = new WP_Query( 'posts_per_page=5' ); ?>
04
 
05
// Start our WP Query
06
<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
07
 
08
// Display the Post Title with Hyperlink
09
<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
10
 
11
// Display the Post Excerpt
12
<li><?php the_excerpt(__('(more…)')); ?></li>
13
 
14
// Repeat the process and reset once it hits the limit
15
<?php
16
endwhile;
17
wp_reset_postdata();
18
?>
19
</ul>
*/
			
			
			dynamic_sidebar( 'home_wide_1' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

			// End of the loop.
		endwhile;
		?>

	</main><!-- .site-main -->

	<?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>