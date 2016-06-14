<?php

if( strpos($_SERVER['HTTP_HOST'], 'localhost:8888') !== false ) :
    update_option( 'siteurl', 'http://localhost:8888' );
    update_option( 'home', 'http://localhost:8888' );
  elseif ( strpos($_SERVER['HTTP_HOST'], 'wordpress.local') ) :
    $wordpressURLString = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'];
    update_option( 'siteurl', $wordpressURLString );
    update_option( 'home', $wordpressURLString );
  elseif(strpos($_SERVER['HTTP_HOST'], 'xip.io') !== false) :
    $wordpressURLString = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/wordpress';
    update_option( 'siteurl', $wordpressURLString );
    update_option( 'home', $wordpressURLString );
endif;
