<?php 
    wp_nav_menu([
        // 'menu'            => 'top',
        'theme_location'  => 'menu_topo',
        'container'       => false,
        'container_id'    => false,
        'container_class' => false,
        'menu_id'         => false,
        'menu_class'      => 'nav navbar-nav ml-auto menu-site',
        'depth'           => 2,
        'fallback_cb'     => 'bs4navwalker::fallback',
        'walker'          => new bs4navwalker()
    ]);
?>