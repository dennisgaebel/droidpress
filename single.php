<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package DroidPress
 */
?>

<?php get_header(); ?>

<?php if( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <div id="primary" class="content-area">
  	<?php get_template_part( 'template-parts/single/content' ); ?>

  	<?php the_post_navigation(); ?>

  	<?php
  		if ( comments_open() || get_comments_number() ) :
  			comments_template();
  		endif;
  	?>
  </div>
<?php endwhile; ?>
<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
