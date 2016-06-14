<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package DroidPress
 */
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
	<div id="primary" class="content-area clearfix">

		<header class="page-header">
			<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
		</header>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php
				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/default/content', get_post_format() );
			?>

		<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/error/content', 'none' ); ?>

	</div>
<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>