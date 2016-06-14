<?php
/**
 * Template Name: Page w/Children
 *
 * @package DroidPress
 */
?>

<?php get_header(); ?>

<?php get_template_part( 'template-parts/global/nav-children' ); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <div id="primary" class="content-area clearfix">
    <?php get_template_part( 'template-parts/default/content', '' ); ?>
  </div>
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
