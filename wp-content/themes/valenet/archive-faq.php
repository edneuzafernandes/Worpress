<?php get_header() ?>
<section class="banner-interno bn-faq">
    <div class="container">
        <h1> <?php post_type_archive_title() ?> </h1>
        <div>
            <?php
                if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb( '<p id="breadcrumbs" class="breadcrumb">','</p>' );
                }
            ?>
        </div>
        <h2> 
        Tire suas dúvidas sobre nossos produtos e serviços. Veja onde ela se encaixa no menu abaixo e acaba com ela!
        </h2>
    </div>
</section>
<main class="main-site">
    <section class="content-site content-produto inner">
            <div class="container">
                <?php
                    $categoriasFaq = get_terms(
                        array(
                            'taxonomy' => 'categoria-faq',
                            'hide_empty' => false,
                            'child_of'   => 0   
                        )
                    );
                    // var_dump($categoriasFaq);    
                    foreach($categoriasFaq as $faq):
                        echo "<h3 class='titulo_faq'> " .$faq->name. " </h3>";
                        agrupaFaq($faq->term_id, $faq->name);
                    endforeach;
                ?>

                
            </div>
    </section>
</main>
<?php get_footer() ?>