<?php /* template name: Produtos */ ?>
<?php get_header() ?>
    <?php
        $iniciaTeste = new produtosValeNet();
            
        //var_dump($iniciaTeste);
        
        $idCidade = $_COOKIE['cidade'];
        $idCidadeCorrente = $iniciaTeste->CapturaCidade($idCidade);
        $idDistrito = $_COOKIE['distrito'];
        $idDistritoCorrente = $iniciaTeste->CapturaDistrito($idCidadeCorrente, $idDistrito);

        if(have_posts()):
            while(have_posts()): the_post();
                $tipoProduto = get_field('tipo_de_produto');
                if($tipoProduto == 1){
                    $mainClasse = 'main-internet';
                    $bannerClass = "banner-internet";
                } else if($tipoProduto == 3){
                    $mainClasse = 'main-telefone';
                    $bannerClass = "banner-telefone";
                } else if($tipoProduto == 2){
                    $mainClasse = "main-tv";
                    $bannerClass = "";
                } else {
                    $mainClasse = "";
                    $bannerClass = "";
                }
                include(locate_template('parts/produtos/banner-produtos.php'));
                ?>
                <section class="main-produto <?= $mainClasse ?>">
                    <main class="main-site">
                        <div class="content-site">
                            <div class="content-produto">
                                <?php  include(locate_template('parts/produtos/combos-produtos.php')) ?>
                            </div>
                            <?php get_template_part('parts/produtos/apresentacao-produtos') ?>

                            <?php include(locate_template('parts/produtos/grade-canais.php')) ?>
                        </div>
                    </main>
                    <?php get_template_part('parts/produtos/canais-destaque-produtos') ?>
                    <?php include(locate_template('parts/produtos/vantagem-produtos.php')) ?>
                </section>
                <?php
            endwhile;
        endif;
    ?>
<?php get_footer() ?>