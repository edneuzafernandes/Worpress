<?php get_header('checkout') ?>
<?php 
    $iniciaTeste = new produtosValeNet();
            
    //var_dump($iniciaTeste);
    
    $idCidade = $_COOKIE['cidade'];
    $idCidadeCorrente = $iniciaTeste->CapturaCidade($idCidade);
    $idDistrito = $_COOKIE['distrito'];
    $idDistritoCorrente = $iniciaTeste->CapturaDistrito($idCidadeCorrente, $idDistrito);
?>
    <main>
        <section class="polano-combos inner">
            <div class="container">
                <?php get_template_part('parts/produtos/slider-planos-produtos') ?>
            </div>
        </section>
        <section class="monta-combos inner">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <!-- box montagem de planos -->
                        <div id="accordion" class="checkout">
                            <?php include(locate_template('parts/checkout/card-internet-checkout.php')) ?>
                            <?php include(locate_template('parts/checkout/card-telefone-checkout.php')) ?>
                            <?php include(locate_template('parts/checkout/card-tv-checkout.php')) ?>
                        </div>
                    </div>
                    <!-- form finalização -->
                    <div class="col-md-4">
                        <?php get_template_part('parts/checkout/resumo-checkout') ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php get_footer() ?>