<!-- Telefone -->
<div class="card">
    <div class="card-header" role="tab" id="section2HeaderId">
        <h5 class="mb-0">
            <a data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Telefone
            </a>
        </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
        <div class="card-body">
            <div class="resumo-combo">
                <div class="composicao">
                    <?php 
                    $pacotes = $iniciaTeste->loopMontaPlanoTelefone($idDistritoCorrente, $idCidadeCorrente);
                    foreach($pacotes as $pacInternet):
                        $atributos = $pacInternet['Atributos'];
                        // var_dump($atributos);
                        
                        echo '<div class="box-contrato">';
                            echo "<div class='card-telefone'>";
                                echo $pacInternet['name'];
                                echo "<div class='desc-telefone'>";
                                    foreach($atributos as $atributosInternet){
                                        echo $atributosInternet->chave . " " . $atributosInternet->valor . "<br>";
                                    }
                                echo "</div>";
                            echo "</div>";
                            echo "<div>";
                                ?>
                                <button data-nameplan="<?= $pacInternet['name'] ?>"  data-id="<?= $pacInternet['id']?>" data-valorplan="<?= $pacInternet['price_single'] ?>" data-valorcombo="<?= $pacInternet['price_combo'] ?>" data-valortriple="<?= $pacInternet['price_triple'] ?>" data-type="telefone" class='btn btn-adiciona-resumo btn-site'> Adicionar </button>
                                <?php
                            echo "</div>";
                        echo '</div>';
                    endforeach;  
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>