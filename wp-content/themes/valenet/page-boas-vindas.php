<?php /* template name: splash */ ?>

<?php get_header('splash') ?>
<div class="bg-boas-vindas">
    <div class="container">
        <div class="content-splash row">
            <div class="col-md-6 col-sm-6 col-xs-12 offset-md-7">
                <h1 class="text-left"> 
                    <span class="gran">GRANFIBER</span> agora é <span class="vale">VALENET.</span>
                </h1>
                <h2 class="text-left"></h2>
                <div class="">
                    <p class="text-vale">
                    A partir de Julho de 2019, a carteira de clientes da GRANFIBER foi adquirida pela VALENET.
                    Somos uma empresa de telecomunicações
                    essencialmente mineira. Referência nas localidades em
                    que atuamos. Contamos com mais de 400 colaboradores
                    que têm paixão pelo que fazem. Trazemos para você
                    o que há de mais moderno em Internet de
                    Ultravelocidade, além de TV por Assinatura com todos
                    os canais em HD e Telefone Fixo com o melhor custo
                    benefício. Tudo isso para manter o Seu Mundo Conectado.
                    </p>
                </div>
                <h2 class="text-left"> 
                    <span class="gran">Atualize seu cadastro e garanta seu presente.*</span>
                </h2>
                <div class="x-small text-left">*Válido por 30 dias, sujeito a viabilidade técnica</div>

                    <form action="#" method="post" onsubmit='return submitForm(this)'> 
                        <div class="main-select-cidade">
                            <div class="form-group">
                                <input class="inputboasvindas text-left" type="email" required name="email" placeholder="E-mail">
                            </div>
                            </div>

                            <div class="form-group">
                                <input type="text" name="telefone1" class="inputbvtel telefone" placeholder="DDD + Telefone1" required>
                                <input type="text" name="telefone2" class="inputbvtel telefone" placeholder="DDD + Telefone2">
                            </div>
                            <button type="submit" class="btn btn-site btn-lg">Atualizar cadastro</button>
                    </form>

                    <div class="x-small text-right logos">
                        <div class="logo">
                            <h2 class="t"><img src="<?php echo get_template_directory_uri() ?>/assets/images/logo_valenet.png" alt=""></h2>
                        </div>
                        <div class="logo">
                            <h2 class="textr"><img src="<?php echo get_template_directory_uri() ?>/assets/images/logo_gran.png" alt=""></h2>     
                        </div>
                    </div>  
                
                

                </div>

            </div>

        </div>

    </div>
</div>
<!--<img src="<?php // echo get_template_directory_uri() ?>/assets/images/logo_footer.png" alt="" class="logo_splash">  -->
<script language="javascript">
function submitForm(form){
    $.ajax({
        url: 'http://docker.valenet.com.br:8085/save_contact',
        data: $(form).serializeArray(),
        success: function (s){
            alert('Obrigado pelas informações!');
            //document.location = 'http://www.valenet.com.br'
        },
        dataType: 'text',
        method: 'GET'
    })

    return false;
}
$(function(){
    $.ajax({
        url: 'http://docker.valenet.com.br:8085/read',
        data: null,
        success: console.log,
        dataType: 'text'
    });
});


</script>
<?php get_footer('splash') ?>