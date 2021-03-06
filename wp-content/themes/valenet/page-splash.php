<?php /* template name: splash */ ?>
<?php get_header('splash') ?>
<div class="bg-splash">
    <div class="container">
        <div class="content-splash row">
            <div class="col-md-5 col-xs-12 offset-md-7">
                <h1>
                    Encontre as melhores ofertas para
                    <small> navegar em alta velocidade. </small>
                </h1>

                <form action="#" method="post">
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
                            <select name="cidade" class="form-control cidade selectpicker" data-live-search="true"
                                id="">
                                <option disabled selected> Escolha uma cidade </option>
                                <?php 
                                foreach ($listaDeCidades as $cidade) {
                                    ?>
                                <option value="<?= trim($cidade['city']) ?>" data-id="<?= $cidade['id'] ?>">
                                    <?= trim($cidade['city']) ?> </option>
                                <?php
                                } 
                            ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <select class="form-control selectpicker" data-live-search="true" name="distrito"
                                id="distrito">
                                <option disabled selected> Escolha um Bairro </option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-site btn-lg"> Acessar o site </button>
                </form>
                <button type="button" class="btn btn-site btn-lg margin-top-10"
                    onclick="location.href='https://assinante4.valenet.com.br/'"> ??rea do cliente </button>
            </div>
        </div>
    </div>
</div>
</div>
<img src="<?php echo get_template_directory_uri() ?>/assets/images/logo_footer.png" alt="" class="logo_splash">
<?php 
    // seta o cookie para 30 dias setcookie('distrito',  trim($_POST['distrito']), time() + (86400 * 30), "/");
    if(isset($_COOKIE['cidade']) and isset($_COOKIE['distrito'])){
        wp_redirect(home_url( '/' ));
    }
    if(isset($_POST['cidade']) and isset($_POST['distrito'])){
        setcookie('cidade',  trim($_POST['cidade']), time() + (86400), "/");
        setcookie('distrito',  trim($_POST['distrito']), time() + (86400), "/");
        wp_redirect(home_url( '/' ));
    } 
?>
<?php get_footer('splash') ?>