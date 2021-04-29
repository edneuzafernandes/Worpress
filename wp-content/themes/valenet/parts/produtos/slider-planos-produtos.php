<?php 
    $iniciaTeste = new produtosValeNet();
            
    // //var_dump($iniciaTeste);
    $idCidade = $_COOKIE['cidade'];
    $idCidadeCorrente = $iniciaTeste->CapturaCidade($idCidade);
    $idDistrito = $_COOKIE['distrito'];
    $idDistritoCorrente = $iniciaTeste->CapturaDistrito($idCidadeCorrente, $idDistrito);
    // capura se existe plano de internet
    $pacotesInternet = $iniciaTeste->LoopBoxMontaPlanoInternet($idDistritoCorrente, $idCidadeCorrente);
    // capura se existe plano de telefonia
    $pacotesTelefone = $iniciaTeste->loopMontaPlanoTelefone($idDistritoCorrente, $idCidadeCorrente); 
    // captura se existe plano de TV
    $pacotesTv = $iniciaTeste->loopMontaPlanosTV($idDistritoCorrente, $idCidadeCorrente);
    // cria o loop de combos
    $planoSugerido = $iniciaTeste->loopPlanosMontados($idDistritoCorrente, $idCidadeCorrente);
    $countteste = 1;
    $checkoutUrl = "";
?>
<!-- combos -->
<?php if(!empty($planoSugerido)): ?>
    <div class="planos-produtos swiper-container">
        <div class="swiper-wrapper">
            <?php foreach($planoSugerido as $combo): 
                $checkoutUrl = implode('&produtoId[]=',explode(',',$combo['servicos']));
            ?>
            <div class="swiper-slide">
                <div class="box-combo">
                    <header class="title-combo">
                        <h4>
                            <small> Combo </small> 
                            <?= $combo['name'] ?>
                        </h4>
                    </header>
                    <!-- box de internet -->
                    <div class="boxes-item bg-white">
                        <div class="text-center">
                            <i class="icon icon-roteador-valenet-forma"></i>
                        </div>
                        <div>
                            <?php 
                                // cria o array com os ids dos servicos
                                $capturaServicos = $combo['services'];
                                // monta bloco de planos de internet 
                                if ($pacotesInternet != null)
                                foreach ($pacotesInternet as $servico) {
                                    
                                    $idServico = $servico['id'];
                                    $val = array_search($idServico, $capturaServicos);
                                    // var_dump($val);
                                    if($capturaServicos[$val] == $idServico){
                                        // nome do plano
                                        echo '<h5 class="internet-mega"> '.str_replace('BANDA LARGA', '', $servico['name']).' </h5>';
                                        // atributos do serviço
                                        foreach($servico['Atributos'] as $atributo){
                                            echo $atributo->chave." ";
                                            echo $atributo->valor . "<br>";
                                        }
                                    }
                                }
                            ?>
                            <!-- <h5 class="internet-mega"> teste </h5>
                            teste -->
                        </div>
                    </div>
                    <!-- /final box internet -->
                    <!-- box telefone -->
                    <?php if ($pacotesTelefone != null): ?>
                    <div class="boxes-item bg-grey">
                        <div class="text-center">
                            <i class="icon icon-telefone-valenet-line"></i>
                        </div>
                        <div>
                            <?php
                                // monta bloco de planos de internet
                                
                                foreach ($pacotesTelefone as $servicoTelefone) {

                                    $idServico = $servicoTelefone['id'];
                                    $val = array_search($idServico, $capturaServicos);
                                    //var_dump($val);
                                    if($capturaServicos[$val] == $idServico){
                                        // nome do plano
                                        echo '<h5> '. $servicoTelefone['name'].' </h5>';
                                        // atributos do serviço
                                        foreach($servicoTelefone['Atributos'] as $atributo){
                                            echo $atributo->valor . " para ";
                                            echo $atributo->chave."<br/>";
                                            
                                        }
                                    }
                                }
                            ?>
                        </div>
                    </div>
                    <?php endif ?>
                    <!-- /final box telefone -->
                    <?php
                    // monta bloco de planos de internet 
                    if ($pacotesTv)
                     foreach ($pacotesTv as $servicoTv) {
                        $idServico = $servicoTv['id'];
                        $val = array_search($idServico, $capturaServicos);
                        //var_dump($val);
                        if($capturaServicos[$val] == $idServico){
                        ?>
                        <!-- box televisao -->
                        <div class="boxes-item bg-white">
                            <div class="text-center">
                                <i class="icon icon-televisao"></i>
                            </div>
                            <div>
                                <?php
                                    //echo $servicoTv['id'];
                                    // nome do plano
                                    echo '<h5> '. $servicoTv['name'].' </h5>';
                                    // atributos do serviço
                                    foreach($servicoTv['Atributos'] as $atributo){
                                        echo $atributo->chave." ";
                                        echo $atributo->valor . "<br>";
                                    }
                                    
                                ?>
                                <div class="plus-canais">
                                    <a href="#" data-idcanal="<?= $servicoTv['id'] ?>" class="open-popup">
                                        <i class="icon icon-icon_plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div> 
                        <!-- /final box televisao -->
                        <?php
                        }
                    }
                    ?>
                    <!-- box televisao -->
                    <div class="boxes-item bg-grey box-price">
                        <div class="text-center">
                                <?php 
                                $precoCombo = explode(".", $combo['price'] );
                                ?>
                            <h4 class="price"> R$<span><?= $precoCombo[0] ?></span>,<?= $precoCombo[1] ?>0 <small> /Mês </small> </h4>
                            <!-- <a href="<?= esc_url( home_url( 'montar-combo' ) ); ?>1" class="btn btn-site"> Assinar </a> -->
                            <a href="<?php echo esc_url( home_url( 'confirmacao-pedido' )."?produtoId[]=".$checkoutUrl) ?>" id="apresentacao" class="btn btn-site">
                                Assinar
                            </a>
                        </div>
                    </div>
                    <!-- /final box televisao -->
                </div>
            </div>
            <?php $countteste++ ?>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>


<div id="gradeCanais" class="pop-up-grade">

</div>
