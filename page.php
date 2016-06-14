<?php
/**
 * Template Name: Page
 *
 * @package DroidPress
 */
?>

<?php get_header(); ?>

<?php if( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <div id="primary" class="content-area clearfix">
    <?php get_template_part( 'template-parts/page/content' ); ?>
  </div>
<?php endwhile; ?>
<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
