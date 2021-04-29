<?php
// adiciona a coluna no grid
add_filter( 'manage_cursos_posts_columns', 'set_custom_edit_book_columns' );
add_action( 'manage_cursos_posts_custom_column' , 'custom_book_column', 10, 2 );

function set_custom_edit_book_columns($columns) {
    unset( $columns['author'] );
    $columns['categoria-cursos'] = __( 'Categoria Cursos', 'your_text_domain' );
    $columns['area-de-conhecimento'] = __( 'Área de conhecimento', 'your_text_domain' );
    $columns['codigo'] = __( 'Código do curso', 'your_text_domain' );

    return $columns;
}
// popula a coluna do grid
function custom_book_column( $column, $post_id ) {
    switch ( $column ) {

        case 'categoria-cursos' :
            $terms = get_the_term_list( $post_id , 'categoria-cursos' , '' , ',' , '' );
            if ( is_string( $terms ) ):
                echo $terms;
            else:
                _e( 'Unable to get author(s)', 'your_text_domain' );
            endif;
            break;

        case 'area-de-conhecimento' :
            $terms = get_the_term_list( $post_id , 'area-de-conhecimento' , '' , ',' , '' );
            echo $terms;
            break;

        case 'codigo':
            $codigoCurso = get_field('codigo', $post_id);
            echo $codigoCurso;
            break;
    }
}



// torna a coluna clicavel para ordenação
// add_filter( 'manage_edit-cursos_sortable_columns', 'my_sortable_cake_column' );
// function my_sortable_cake_column( $columns ) {
//     $columns['categoria-cursos'] = 'categoria-cursos';
//     //To make a column 'un-sortable' remove it from the array
//     //unset($columns['date']);
//
//     return $columns;
// }

// add_filter( 'manage_edit-cursos_sortable_columns', 'area_conhecimento_sortable' );
// function area_conhecimento_sortable( $columns ) {
//     $columns['area-de-conhecimento'] = 'area-de-conhecimento';
//     //To make a column 'un-sortable' remove it from the array
//     //unset($columns['date']);
//
//     return $columns;
// }

// gera filtro dropdown para categorias curso
add_action( 'restrict_manage_posts', 'my_filter_list' );
function my_filter_list() {
    $screen = get_current_screen();
    global $wp_query;
    if ( $screen->post_type == 'cursos' ) {
        wp_dropdown_categories( array(
            'show_option_all' => 'Todos as categorias',
            'taxonomy' => 'categoria-cursos',
            'name' => 'categoria-cursos',
            'orderby' => 'name',
            'selected' => ( isset( $wp_query->query['categoria-cursos'] ) ? $wp_query->query['categoria-cursos'] : '' ),
            'hierarchical' => false,
            'depth' => 3,
            'show_count' => false,
            'hide_empty' => true,
        ) );
    }
}

// passa a query para realizar o friltro categoria cursos
add_filter( 'parse_query','perform_filtering' );
function perform_filtering( $query ) {
    $qv = &$query->query_vars;
    if ( isset( $qv['categoria-cursos'] ) && is_numeric( $qv['categoria-cursos'] ) ) {
        $term = get_term_by( 'id', $qv['categoria-cursos'], 'categoria-cursos' );
        if (!empty($term->slug)) {
            $qv['categoria-cursos'] = $term->slug;
        }
    }
}

//  cria o filtro dropdown para area de conhecimento
add_action( 'restrict_manage_posts', 'filtro_area_conhecimento' );
function filtro_area_conhecimento() {
    $screen = get_current_screen();
    global $wp_query;
    if ( $screen->post_type == 'cursos' ) {
        wp_dropdown_categories( array(
            'show_option_all' => 'Todos as áreas de conhecimento',
            'taxonomy' => 'area-de-conhecimento',
            'name' => 'area-de-conhecimento',
            'orderby' => 'name',
            'selected' => ( isset( $wp_query->query['area-de-conhecimento'] ) ? $wp_query->query['area-de-conhecimento'] : '' ),
            'hierarchical' => false,
            'depth' => 3,
            'show_count' => false,
            'hide_empty' => true,
        ) );
    }
}

//  realiza a query para fazer o filtro de area de conhecimento
add_filter( 'parse_query','filtra_area_cinhecimento' );
function filtra_area_cinhecimento( $query ) {
    $qv = &$query->query_vars;
    if ( isset( $qv['area-de-conhecimento'] ) && is_numeric( $qv['area-de-conhecimento'] ) ) {
        $term = get_term_by( 'id', $qv['area-de-conhecimento'], 'area-de-conhecimento' );
        if (!empty($term->slug)) {
            $qv['area-de-conhecimento'] = $term->slug;
        }

    }
}

// add_filter( 'request', 'column_ordering' );
// add_filter( 'request', 'column_orderby' );

// function column_orderby ( $vars ) {
//     if ( !is_admin() )
//         return $vars;
//     if ( isset( $vars['orderby'] ) && 'categoria-cursos' == $vars['orderby'] ) {
//         $vars = array_merge( $vars, array( 'taxonomy' => 'categoria-cursos', 'orderby' => 'term_name' ) );
//     }
//     // elseif ( isset( $vars['orderby'] ) && 'area-de-conhecimento' == $vars['orderby'] ) {
//     //     $vars = array_merge( $vars, array( 'taxonomy' => 'area-de-conhecimento', 'orderby' => 'term_name' ) );
//     // }
//
//     return $vars;
// }
