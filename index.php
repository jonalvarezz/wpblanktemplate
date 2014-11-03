<?php
/**
 * The main template file
 *
 * @package WordPress
 * @subpackage WP Blank Template
 * @since WP Blank Template 0.3
 */

get_header();

?>
	
	<section id="content" class="container" role="main">

		<?php
			if ( have_posts() ) :
				// Start the Loop.
				while ( have_posts() ) : the_post();

					get_template_part( 'content' );

				endwhile;

			endif;
		?>

	</section>

<?php

get_footer();
