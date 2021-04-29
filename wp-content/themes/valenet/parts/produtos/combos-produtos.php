
<section class="box-combos-principal ">
    <div class="container combos-tv planos-produtos swiper-container">
        <div class="swiper-wrapper">
            <?php
                // se o tipo de produto for internet
                
                if($tipoProduto == 1){
                    $pacotes = $iniciaTeste->LoopBoxMontaPlanoInternet($idDistritoCorrente, $idCidadeCorrente);
                    $fmtOferta = '%1$s de %2$s';
                    // se o tipo de produto for TV
                } else if($tipoProduto == 2){
                    // não possui planos de tv por enquanto, estamos utilizando pacotes de internet para exemplificar
                    $pacotes = $iniciaTeste->loopMontaPlanosTV($idDistritoCorrente, $idCidadeCorrente);
                    // se o tipo de produto for telefone
                } else {
                    $pacotes = $iniciaTeste->loopMontaPlanoTelefone($idDistritoCorrente, $idCidadeCorrente);
                    $fmtOferta = '%1$s para %2$s';
                }
                // carrega detalhes dos pacotes para efetuar o loop
                if($pacotes != null):
                    foreach($pacotes as $pacInternet):
                        //print_r($pacotes);
                        $atributos = $pacInternet['Atributos'];
                        ?>
                        <div class="item-combo swiper-slide">
                        <?php if($tipoProduto != 2): ?>
                            <div class="box-produto">
                            
                                <header>
                                    <h3> <?= $pacInternet['name'] ?> </h3>
                                    <!-- <h4> 19 canais <small> Sendo 12 em HD </small> </h4>
                                    <a href=""> Ver canais </a> -->
                                </header>
                                <?php //if(!empty($atributos)): ?>
                                <div class="beneficios text-center">
                                
                                    <ul>
                                    <?php
                                        foreach($atributos as $atributosInternet){
                                            echo "<li>".sprintf($fmtOferta,$atributosInternet->valor, $atributosInternet->chave)."</li>";
                                            //echo "<li> " . $atributosInternet->valor . " para ".$atributosInternet->chave . "</li>";
                                        }
                                    ?>
                                    
                                    </ul>
                                   
                                   
                                </div>
                                
                                <?php //endif; ?>

                                <!-- <div class="beneficios text-center">
                                    <ul>
                                        <li> Pontos: <?= $pacInternet['pontos'] ?> </li>
                                        <li> <?= $pacInternet['canais'] ?> Canais </li>
                                    </ul>
                                </div> -->

                                <div class="price-produto">
                                    <span class="price_of"> De: R$<?= number_format($pacInternet['price_single'], 2, ',','.') ?> </span>
                                    <span> Por: R$<?= number_format($pacInternet['best_price'], 2, ',','.') ?>  </span>
                                    <div class="notes">Valores válidos no combo<?//= $pacInternet['best_price_type'] ?></div>
                                    <!-- Comentário acima para ocultar o nome do combo -->
                                </div>
                                <a href="<?php echo esc_url( home_url( 'montar-combo' )."?produtoId=".$pacInternet['id']."#monte" ); ?>" id="apresentacao" class="detalhes">
                                    Monte seu plano
                                </a>
                            </div>
                        <?php else: ?>
                        <div class="box-produto">
                            
                                <header>
                                    <h3> <?= $pacInternet['name'] ?> <br /><br /> <b><?= $pacInternet['canais'] ?></b> Canais<br /><br />
                                    <span>
                                    <a href="#" data-idcanal="<?= $pacInternet['id'] ?>" class="open-popup">
                                        Ver Canais
                                    </a>
                                        <!-- <a href="#">Ver Canais</a></span> -->
                                    </h3>
                                    <!-- <h4> 19 canais <small> Sendo 12 em HD </small> </h4>
                                    <a href=""> Ver canais </a> -->
                                </header>
                                <?php //if(!empty($atributos)): ?>
                                <div class="beneficios text-center">
                                
                                    <ul>
                                    <?php
                                        foreach($atributos as $atributosInternet){
                                            echo "<li>".$atributosInternet->chave . " " . $atributosInternet->valor . "</li>";
                                        }
                                    ?>
                                    <?php if(array_key_exists('pontos', $pacInternet) && $pacInternet['pontos']>1): ?>
                                        <li><?= $pacInternet['pontos'] ?> Pontos neste pacote</li>
                                        <!-- <li> <?= $pacInternet['canais'] ?> Canais  <?array_key_exists('pontos', $pacInternet)?></li> -->
                                    <?php endif; ?>
                                    Complete seu pacote com:
                                    <?php if(strpos(strtolower($pacInternet['name']),"premiere") == false ): ?>
                                    <img src='http://dev.valenet.com.br/api/logo/99x38_LOGO_PREMIERCLUBES.png' class="blackandwhite" />
                                    <?php endif;?>
                                    <img src='http://dev.valenet.com.br/api/logo/99x38_LOGO_COMBATE.png'  class="blackandwhite"/>
                                    <?php if(strpos(strtolower($pacInternet['name']),"telecine") == false ): ?>
                                    <img src='/wp-content/themes/valenet/assets/images/telecine.png'  class="blackandwhite"/>
                                    <?php endif;?>    
                                </ul>
                                   
                                   
                                </div>
                                
                                <?php //endif; ?>

                                <!-- <div class="beneficios text-center">
                                    <ul>
                                        <li> Pontos: <?= $pacInternet['pontos'] ?> </li>
                                        <li> <?= $pacInternet['canais'] ?> Canais </li>
                                    </ul>
                                </div> -->

                                <div class="price-produto">
                                    <span class="price_of"> De: R$<?= number_format($pacInternet['price_single'], 2, ',','.') ?> </span>
                                    <span> Por: R$<?= number_format($pacInternet['best_price'], 2, ',','.') ?>  </span>
                                    <div class="notes">Valores válidos no combo<?//= $pacInternet['best_price_type'] ?></div>
                                    <!-- Comentário acima para ocultar o nome do combo -->
                                </div>
                                <a href="<?php echo esc_url( home_url( 'montar-combo' )."?produtoId=".$pacInternet['id']."#monte" ); ?>" id="apresentacao" class="detalhes">
                                    Monte seu plano
                                </a>
                            </div>
                        <?php endif; ?>
                        </div>
                        <?php
                    endforeach;
                endif;
            ?>
        </div>
        <!-- Add Arrows -->
        <div class="plan-next swiper-button-next"></div>
        <div class="plan-prev swiper-button-prev"></div>
    </div>
</section>

<div id="gradeCanais" class="pop-up-grade">