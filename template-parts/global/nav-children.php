<?php $subpages = pageChildrenCheck( get_the_ID() ); ?>

<?php if( $subpages ): ?>
  <nav>
    <?php foreach ($subpages as $subpage): ?>
      <a href="<?php echo get_permalink( $subpage->ID ); ?>" <?php echo ($subpage->ID === get_the_ID() ? 'class="active"' : '' ) ?>>
        <?php echo $subpage->post_title; ?>
      </a>
    <?php endforeach; ?>
  </nav>
<?php endif; ?>
