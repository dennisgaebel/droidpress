<?php
//===================================================
// CHANGE WP LOGIN LOGO
//===================================================

function my_login_logo() {
    return
    '<style type="text/css">
        .login h1 a {
            background-image: url('.get_stylesheet_directory_uri().'/img/logo.png);
            background-size: contain;
            width: 100%;
            padding-bottom: 10px;
        }
    </style>';
}

add_action( 'login_enqueue_scripts', 'my_login_logo' );
