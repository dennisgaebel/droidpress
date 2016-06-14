<?php
  $latestPostsConfig = array(
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'order'          => 'DESC',
    'orderby'        => 'date',
    'posts_per_page' => 3
  );

  $latestPostsQuery = new WP_Query( $latestPostsConfig );
?>

<?php if( $latestPostsQuery->have_posts() ) : ?>
  <?php while( $latestPostsQuery->have_posts() ): $latestPostsQuery->the_post(); ?>
    <article>

      <?php if( has_post_thumbnail( $post_id ) ) : ?>
        <?php the_post_thumbnail( 'front-page-blog-image', array( 'class' => '' ) ); ?>
      <?php endif; ?>

      <div>
        <header>
          <a href="<?php the_permalink();?>">
            <h3><?php the_title(); ?></h3>
          </a>
        </header>

        <div>
          <span><?php the_time('F j, Y'); ?></span>
          <?php the_excerpt(); ?>
        </div>
      </div>

    </article>
  <?php endwhile; ?>

  <a href="
    <?php
      $blog_url = get_option('page_for_posts');
      echo get_permalink($blog_url);
    ?>"> View All Articles</a>
<?php wp_reset_query(); ?>
<?php endif; ?>
