<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WP Blank Template
 * @since WP Blank Template 0.6
 */

get_header();

?>

	<header>			
		<h1 class="not-found-title">Ehmm...</h1>
		<p>
			<em>The page doesn't exist.</em>
		</p>
	</header>
	<article class="entry-content">
		<p>
			Go back to <a href="<?php echo bloginfo('url'); ?>" title="Go home">home</a>.
		</p>
	</article>
	
<?php

get_footer();
