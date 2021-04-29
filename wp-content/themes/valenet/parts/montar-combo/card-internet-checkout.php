<?php if (isset($_GET['produtoId'])): ?>
<script>
    $(function(){
        $('[data-id=<?=$_GET['produtoId']?>]').click();
        //console.log(1);
    })
</script>
<?php    endif; ?>
<!-- Internet -->
<a id="monte"></a>
<div class="card">
    <div class="card-header" role="tab" id="section1HeaderId">
        <h5 class="mb-0">
            <a data-toggle="collapse" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Internet
            </a>
        </h5>
    </div>
    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">
            <div class="resumo-combo">
                <div class="composicao">
                    <?php 
                    $pacotes = $iniciaTeste->LoopBoxMontaPlanoInternet($idDistritoCorrente, $idCidadeCorrente);
                    foreach($pacotes as $pacInternet):
                        $atributos = $pacInternet['Atributos'];
                        // var_dump($atributos);
                        
                        echo '<div class="box-contrato">';
                            echo "<div>";
                                echo $pacInternet['name'];
                            echo "</div>";
                            echo "<div>";
                                foreach($atributos as $atributosInternet){
                                    echo $atributosInternet->chave . " " . $atributosInternet->valor . "<br>";
                                }
                            echo "</div>";
                            echo "<div>";
                            ?>
                                <button data-nameplan="<?= $pacInternet['name'] ?>" data-valorplan="<?= $pacInternet['price_single'] ?>" data-valorcombo="<?= $pacInternet['price_combo'] ?>" data-valortriple="<?= $pacInternet['price_triple'] ?>" data-type="internet" data-id="<?= $pacInternet['id']?>" class='btn btn-adiciona-resumo btn-site'> Adicionar </button>
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