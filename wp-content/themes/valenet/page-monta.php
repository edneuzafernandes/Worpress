<?php get_header() ?>
    <div class="container inner">
        <div id="state"></div>
        <div id="city"></div>
        <?php
            // $iniciaTeste = new produtosValeNet();
            
            // //var_dump($iniciaTeste);

            // $idCidade = "ITABIRA";
            // $idCidadeCorrente = $iniciaTeste->CapturaCidade($idCidade);
            // $idDistrito = "ABOBORAS";
            // $idDistritoCorrente = $iniciaTeste->CapturaDistrito($idCidadeCorrente, $idDistrito); 
            //echo $idDistritoCorrente;
            echo $iniciaTeste->LoopBoxMontaPlano($idDistritoCorrente, $idCidadeCorrente);

            echo $dadosPLanoPhone;
        ?>
    </div>
<?php get_footer() ?>