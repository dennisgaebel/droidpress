<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package DroidPress
 */

?>

		</div><!-- #content -->

	</main>

	<footer id="colophon" class="site-footer sticky-row sticky-footer" role="contentinfo">

    <?php if ( has_nav_menu( 'footer' ) ) : ?>
  		<div class="footer-nav-wrap">
  			<?php
  				wp_nav_menu( array(
  					'theme_location'  => 'footer',
  					'menu_id'         => 'footer-menu',
  					'container_class' => '',
  					'menu_class'      => 'list-reset'
  				));
  			?>
      </div>
		<?php endif; ?>

    <small class="site-info">
      <span class="">©<?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>, All Rights Reserved. | Website by <a href="https://www.luminusmedia.com" rel="designer" target="_blank">LUMINUS</a></span>
    </small>

	</footer>

</div><!-- #page -->

<?php if( include_check() ) : ?>

  <?php if( strpos($_SERVER['HTTP_HOST'], 'local') !== false || strpos($_SERVER['HTTP_HOST'], 'xip') !== false ) : ?>
    <?php //unminified scripts ?>
  <?php else : ?>
    <?php //minified script ?>
  <?php endif; ?>

<?php endif; ?>

<?php if( include_check('contact') ) : ?>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAiuk-6NIuwDMW8u7khGCtsHZ6e3ejOVcM"></script>
  <script src="<?php echo get_template_directory_uri() . '/js/src/google-maps.js'; ?>"></script>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
