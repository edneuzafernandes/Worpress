<?php /* template name: Condomínios */ ?>
<?php get_header() ?>
    <?php if(have_posts()): ?>
        <?php while(have_posts()): the_post() ?>
            <?php get_template_part('parts/header/header-page-interno') ?>
            <main class="main-site inner">
                <section class="content-iterno inner content-site">
                    <div class="container">
                        <?php the_content() ?>
                        <?php if(get_field('ativar_valores_da_empresa')): ?>
                            <div class="valores inner">
                                <div class="row">
                                    <div class="col-md-4 text-center">
                                        <h3> Missão </h3>
                                        <?= get_field('missao') ?>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <h3> Visão </h3>
                                        <?= get_field('visao') ?>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <h3> Valores </h3>
                                        <?= get_field('valor') ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <?php get_template_part('parts/home/produtos-valenet') ?>
                    <?php get_template_part('parts/pages/bloco-localizacao-page') ?>
                </section>
            </main>
        <?php endwhile ?>
    <?php endif; ?>

    <script>            
         $.get("https://api.valenet.com.br/api/condominios/index.json", function(resultado){
            console.log(resultado)
                        
            var option = '<option>Selecione</option>';
                    $.each(resultado, function(i, obj){
                          option += '<option value="'+obj.descricao+'">'+obj.descricao+'</option>';
                      })
                            
                      $('#campo').html(option).show(); 
                      $('#total').html('<span class="total">Total: '+resultado.length+'</span>'); 
                 })
    </script>

<?php get_footer() ?>