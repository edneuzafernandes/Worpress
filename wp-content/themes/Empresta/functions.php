<?Php
    function empresta_wp_styles() {
        wp_enqueue_style( 'style_css', get_stylesheet_uri() );
        wp_enqueue_style('fonts', 'https://fonts.googleapis.com/icon?family=Material+Icons');

    }
    add_action('wp_enqueue_scripts', 'empresta_wp_styles');
    
    
    
    function empresta_adicionando_recursos_ao_tema()
    {
        add_theme_support('custom-logo');
        add_theme_support('post-thumbnails');
    }
    add_action('after_setup_theme', 'empresta_adicionando_recursos_ao_tema');


    function empresta_post_customizado()
{
    register_post_type('lojas',
        array(
            'labels' => array('name' => 'Lojas'),
            'public' => true,
            'menu_position' => 0,
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_icon' => 'dashicons-admin-site'
        )
    );

    register_post_type('mapa',
        array(
            'labels' => array('name' => 'Mapa'),
            'public' => true,
            'menu_position' => 0,
            'supports' => array('title', 'editor'),
            'menu_icon' => 'dashicons-admin-site'
        )
    );
}
add_action('init','empresta_post_customizado');



function empresta_registrando_taxonomia(){
    register_taxonomy(
        'cidades',
        'lojas',
        array(
            'labels' => array('name' => 'Cidades'),
            'hierarchical' => true
        )
    );
}
add_action('init','empresta_registrando_taxonomia');
    ?>
    