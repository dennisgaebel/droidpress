<?php

function pageChildrenCheck($page_id){
  global $post;
  $my_wp_query = new WP_Query();

  $all_wp_pages = $my_wp_query->query( array(
    'post_type'      => 'page',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          =>'ASC'
  ) );

  if( get_page_children( $page_id, $all_wp_pages ) ) :
    $ParentPage[] = get_post( $page_id );
    $PageChildren = get_page_children( get_the_ID(), $all_wp_pages );
  elseif($post->post_parent) :
    $ParentPage[] = get_post( $post->post_parent );
    $PageChildren = get_page_children( $post->post_parent, $all_wp_pages );
  endif;

  $Pages = array_merge($ParentPage, $PageChildren);

  return $Pages;

}
