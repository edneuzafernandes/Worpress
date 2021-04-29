<nav class="navbar navbar-expand-lg">
<?php 
    wp_nav_menu([
        // 'menu'            => 'top',
        'theme_location'  => 'menu_superior',
        'container'       => false,
        'container_id'    => false,
        'container_class' => false,
        'menu_id'         => false,
        'menu_class'      => 'navbar-nav mr-auto',
        'depth'           => 2,
        'fallback_cb'     => 'bs4navwalker::fallback',
        'walker'          => new bs4navwalker()
    ]);
?>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a href="#" class="nav-link btn btn-teliga" data-toggle="modal" data-target="#modalTeLiga"> Valenet te liga </a>
        </li>
        <li class="cidade-corrente"> 
            <a href="#" data-toggle="modal" data-target="#modalCidade"> <i class="icon icon-map"></i> <?= $_COOKIE['cidade'] ?> </a>
        </li>
    </ul>
</nav>

<div class="modal fade" id="modalTeLiga" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> A Valenet te liga </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= do_shortcode('[contact-form-7 id="538" title="Valenet te liga"]') ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalCidade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Alterar Cidade </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" method="post"> 
                <div class="modal-body">
                <!-- Formulário -->
                    <div class="main-select-cidade">
                        <div class="form-group">
                            <?php 
                                $splash = new produtosValeNet();
                                // 
                                $listaDeCidades = $splash->listCidadeSplash();
                                // echo "<pre>";
                                //     var_dump($listaDeCidades);
                                // echo "</pre>";
                            ?>
                            <select name="cidade" class="form-control selectpicker cidade" data-live-search="true" name="" id="">
                                <option disabled selected> Escolha uma cidade </option>
                                <?php 
                                    foreach ($listaDeCidades as $cidade) {
                                        ?>
                                            <option value="<?= $cidade['city'] ?>" data-id="<?= $cidade['id'] ?>" > <?= $cidade['city'] ?> </option>
                                        <?php
                                    } 
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <select class="form-control selectpicker" data-live-search="true" name="distrito" id="distrito">
                                <option disabled selected> Escolha um distrito </option>
                            </select>
                        </div>                
                <!-- /Formulário -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Alterar Cidade de origem</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php 
    if(isset($_POST['cidade']) and isset($_POST['distrito'])){
        setcookie('cidade',  trim($_POST['cidade']), time() + (86400), "/");
        setcookie('distrito',  trim($_POST['distrito']), time() + (86400), "/");
        wp_redirect(home_url( '/' ));
        exit;
    }
?>