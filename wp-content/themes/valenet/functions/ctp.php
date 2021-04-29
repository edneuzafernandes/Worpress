<?php
add_action('init', 'create_posttype' );
function create_posttype(){
  // cria os post_type necessário
  register_post_type('faq',
    array(
      'labels' => array(
        'name' => __( 'Faq', 'Microcity' ),
        'singular_name' => __( 'Faq', 'Microcity' )
      ),
      'show_in_rest' => true,
      'public' => true,
      'hierarchical' => true,
      'has_archive' => 'faq',
      // 'menu_icon' => 'dashicons-noticia',
      'menu_position' => 5,
      'rewrite' => array('slug' => 'faq'),
      'supports' => array(
        'title',
        'editor',
        'page-attributes',
        'thumbnail'
      )
    )
  );

  register_taxonomy(
    'categoria-faq',
    'faq',
    array(
      'label' => __( 'Categorias faq', 'Microcity' ),
      'rewrite' => array( 'slug' => 'categoria-faq' ),
      'hierarchical' => true,
    )
  );

  // cria os post_type necessário
  register_post_type('portfolio',
    array(
      'labels' => array(
        'name' => __( 'Portfólio Empresarial', 'Microcity' ),
        'singular_name' => __( 'Portfólio Empresarial', 'Microcity' )
      ),
      'show_in_rest' => true,
      'public' => true,
      'hierarchical' => true,
      'has_archive' => 'portfolio',
      // 'menu_icon' => 'dashicons-noticia',
      'menu_position' => 5,
      'rewrite' => array('slug' => 'portfolio'),
      'supports' => array(
        'title',
        'editor',
        'page-attributes',
        'thumbnail'
      )
    )
  );

  register_taxonomy(
    'categoria-portfolio',
    'portfolio',
    array(
      'label' => __( 'Categoria', 'Microcity' ),
      'rewrite' => array( 'slug' => 'categoria-portfolio' ),
      'hierarchical' => true,
    )
  );

}
