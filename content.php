<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage WP Blank Template
 * @since WP Blank Template 0.4
 */
?>

<article id="entry-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<h1 class="entry-title">
			<?php the_title(); ?>
		</h1>
	</header>

	<?php if ( is_search() ) : ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div>
	<?php else : ?>
		<div class="entry-content">
			<?php the_content( 'Continuar leyendo <span class="meta-nav">&rarr;</span>' ); ?>
		</div>
	<?php endif; ?>

</article>
