<?php $tipoProduto = get_field('tipo_de_produto') ?>
<?php if($tipoProduto == 2): ?>
<section class="grade-canais">
    <div class="container">
        <div class="header-grade">
            <h2> Conheça os canais de cada plano </h2>
            <!-- <div class="navgation-combos">
                <div class="aba-prev swiper-button-prev">  </div>
                <div class="aba-next swiper-button-next">  </div>
            </div> -->
        </div>
        <!-- toogle grade de canais -->

        <div class="content-toogle">
            <!-- inicia o accordeon -->
            <div id="accordion" class="grade-canais">
            <?php
            // var_dump($pacotes);
            if($pacotes != null):
                $count = 1;
                foreach($pacotes as $pacInternet):
                    if($count == 1){
                        $classBtn = "";
                        $showBody = "show";
                    } else {
                        $classBtn = "collapsed";
                        $showBody = "";
                    }
            ?>
                <!-- item toogle -->
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn-link <?= $classBtn ?>" data-toggle="collapse" data-target="#a<?= $pacInternet['id'] ?>" aria-expanded="true" aria-controls="a<?= $pacInternet['id'] ?>">
                                <?= $pacInternet['name'] ?>
                            </button>
                        </h5>
                    </div>

                    <div id="a<?= $pacInternet['id'] ?>" class="collapse <?= $showBody ?>" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                        <?php
                            if($pacotes != null):
                                echo $iniciaTeste->loopCanaisCombo( $pacInternet['id'] ); 
                            endif;
                        ?>
                        </div>
                    </div>
                </div>
                <!-- /item toogle -->
                <?php
                        $count++;
                    endforeach;
                endif;
                ?>
                </div>
            <!-- final do accordeon -->
        </div> 
    </div>
</section>
<?php endif ?>