<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package DroidPress
 */

?>

<?php if( has_post_thumbnail() ) : ?>
  <?php the_post_thumbnail( 'full', array( 'class' => 'alignleft' ) ); ?>
<?php endif; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title gamma">', '</h1>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php if( has_category() ) : ?>
				<?php the_category('The Category '); ?>
			<?php endif; ?>
		</div>
		<?php endif; ?>
	</header>

	<div class="entry-content">
		<?php the_content(); ?>
	</div>
</article>
