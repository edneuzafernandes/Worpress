<?php 
    $iniciaTeste = new produtosValeNet();
            
    // //var_dump($iniciaTeste);
    
    $idCidade = "ITABIRA";
    $idCidadeCorrente = $iniciaTeste->CapturaCidade($idCidade);
    $idDistrito = "ABOBORAS";
    $idDistritoCorrente = $iniciaTeste->CapturaDistrito($idCidadeCorrente, $idDistrito);
?>
<section class="content-site">
    <div class="container">
        <header>
            <h3>
                Escolha a melhor forma de conectar o seu mundo com a Valenet
            </h3>
            <div class="sub-title">
                Confira os combos que selecionamos para você. 
            </div>
        </header>
        <?php get_template_part('parts/produtos/slider-planos-produtos') ?>
        
        <!-- CTA montar combo -->
        <div class="montar-combo">
            <div class="row">
                <div class="col-md-6 texto-monte-combo">
                    Você também pode montar <br> o combo do seu jeito.
                </div>
                <div class="col-md-6 align-self-center">
                    <a href="<?php echo esc_url( home_url( 'montar-combo' ) ); ?>" class="btn btn-site btn-lg"> Quero montar meu combo </a>
                </div>
            </div>
        </div>
        <!-- /final montar combo -->
    </div>
</section>