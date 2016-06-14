<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package DroidPress
 */
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
	<div id="primary" class="content-area">

		<?php if ( is_home() && ! is_front_page() ) : ?>
			<header>
				<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
			</header>
		<?php endif; ?>

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

		<?php if( paginate_links() ) : ?>
			<?php
				$pagination_config = array(
					'prev_next' => true,
					'prev_text' => __('«'),
					'next_text' => __('»')
				);
			?>
			<nav class="">
				<?php echo paginate_links($pagination_config); ?>
			</nav>
		<?php endif; ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/error/content', 'none' ); ?>

	</div>
<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
