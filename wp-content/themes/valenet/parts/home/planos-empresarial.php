<div class="container z-index-container">
    <?php the_content() ?>
</div>

<section class="produtos-empresariais content-site">
    <div class="container produtos-especiais">
    <?php
        $termsPortfolioEmpresarial = get_terms( 'categoria-portfolio', array(
            'hide_empty' => true,
        ) );
        // loop com as categorias dos produtos da home
        foreach($termsPortfolioEmpresarial as $prodEmpresa):
            echo "<header class='categoria-produtos-empresa'> <h4> " . $prodEmpresa->name . "</h4></header>";

            $argPortfolio = array(
                'post_type'         => 'portfolio',
                'posts_per_page'    => -1,
                'tax_query'         => array(
                    array(
                        'taxonomy'  => 'categoria-portfolio',
                        'field'     => 'term_id',
                        'terms'     => $prodEmpresa->term_id
                    )
                )
            );

            $produtosPortfolio = get_posts($argPortfolio);
            // var_dump($produtosPortfolio);

            echo "<div class='row'>";
            foreach ($produtosPortfolio as $produtosEmpresariais) {
                $post = $produtosEmpresariais;

                setup_postdata($post);
                $urlImage = get_the_post_thumbnail_url($produtosEmpresariais);
                echo "<div class='col-md-3'>";
                    echo '<div class="box-combo">';
                        echo "<header class='title-combo'>";
                            echo "<h4>".$produtosEmpresariais->post_title."</h4>";
                        echo "</header>";

                        echo "<img src='".$urlImage."' class='img-fluid' alt='". $produtosEmpresariais->post_title ."'>";
                        echo "<div class='texto-produto'>";
                            the_excerpt_limit( 30 );
                            echo "<button type='button' class='btn btn-site btn-saiba-produto' data-target='#".$produtosEmpresariais->post_name."'> Saiba Mais </button>";
                        echo "</div>";
                        
                    echo '</div>';
                echo "</div>";
                ?>
                <!-- modal -->
                <div class="modal fade" id="<?= $produtosEmpresariais->post_name ?>" tabindex="-1" role="dialog" aria-labelledby="<?= $produtosEmpresariais->post_name ?>" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="<?= $produtosEmpresariais->post_name ?>"><?= $produtosEmpresariais->post_title ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="content-modal">
                                <img src='<?= $urlImage ?>' class='img-fluid' alt='<?= $produtosEmpresariais->post_title ?>'>
                                <?= get_the_content($produtosEmpresariais) ?>
                            </div>
                            <div class="form-modal">
                                <h5> Não perca tempo entre em contato: </h5>
                                <hr>
                                <?php echo do_shortcode('[contact-form-7 id="539" title="Fale com um consultor"]') ?>
                            </div>
                        </div>
                        <!-- <div class="modal-footer">

                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div> -->
                        </div>
                    </div>
                </div>
                <?php
            }
            echo "</div>";
        endforeach;
    ?>
    </div>
</section>
<!-- Modal -->
