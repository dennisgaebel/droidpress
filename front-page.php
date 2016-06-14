<?php
/**
 * Template Name: Home
 *
 * @package DroidPress
 */
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <div id="primary" class="content-area">
    <?php get_template_part( 'template-parts/front/content' ); ?>
  </div>
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
