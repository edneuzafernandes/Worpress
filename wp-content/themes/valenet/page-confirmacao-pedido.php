<?php get_header('checkout') ?>

<link rel="stylesheet" href="/wp-content/themes/valenet/assets/confirmacao-pedido/css/pedido.css">
<link rel="stylesheet" href="/wp-content/themes/valenet/assets/confirmacao-pedido/ace/assets/css/datepicker.css">
<link rel="stylesheet" href="/wp-content/themes/valenet/assets/confirmacao-pedido/ace/assets/css/daterangepicker.css">
<link rel="stylesheet" href="/wp-content/themes/valenet/assets/confirmacao-pedido/ace/assets/css/font-awesome.min.css">
<link rel="stylesheet"
    href="/wp-content/themes/valenet/assets/confirmacao-pedido/ace/assets/css/font-awesome.3.1.min.css">
<link rel="stylesheet"
    href="/wp-content/themes/valenet/assets/confirmacao-pedido/ace/assets/css/bootstrap-timepicker.css">
<link rel="stylesheet"
    href="/wp-content/themes/valenet/assets/confirmacao-pedido/ace/assets/css/bootstrap-responsive.min.css">

<script data-require="jquery@*" data-semver="2.1.3"
    src="/wp-content/themes/valenet/assets/confirmacao-pedido/lib/jquery-2.1.3.min.js"></script>
<link data-require="bootstrap@*" data-semver="3.3.1" rel="stylesheet"
    href="/wp-content/themes/valenet/assets/confirmacao-pedido/lib/bootstrap4/css/bootstrap.min.css" />
<script data-require="bootstrap@*" data-semver="3.3.1"
    src="/wp-content/themes/valenet/assets/confirmacao-pedido/lib/bootstrap4/js/bootstrap.min.js"></script>
<script data-require="angular.js@*" data-semver="1.4.0-beta.3"
    src="/wp-content/themes/valenet/assets/confirmacao-pedido/lib/angular.js"></script>

<script src="/wp-content/themes/valenet/assets/confirmacao-pedido/lib/bootbox.js"></script>
<script src="/wp-content/themes/valenet/assets/confirmacao-pedido/lib/ngBootbox.js"></script>
<script src="/wp-content/themes/valenet/assets/confirmacao-pedido/js/pedido.js"></script>
<script type="text/javascript" src="/wp-content/themes/valenet/assets/confirmacao-pedido/lib/jquery.mask.js"></script>
<script type="text/javascript" src="/wp-content/themes/valenet/assets/confirmacao-pedido/lib/vanilla-masker.min.js">
</script>
<script src="/wp-content/themes/valenet/assets/confirmacao-pedido/js/masks.js"></script>

<script src="/wp-content/themes/valenet/assets/js/scripts.min.js"></script>




<?php
$iniciaTeste = new produtosValeNet();

//var_dump($iniciaTeste);

$idCidade = $_COOKIE['cidade'];
$idCidadeCorrente = $iniciaTeste->CapturaCidade($idCidade);
$idDistrito = $_COOKIE['distrito'];
$idDistritoCorrente = $iniciaTeste->CapturaDistrito($idCidadeCorrente, $idDistrito);
?>
<script>
var apiUrl = '<?= $iniciaTeste->variavel ?>/servicos/<?= $idDistritoCorrente ?>';
var urlAPI = "<?= $iniciaTeste->variavel ?>/";
var produtos_selecionados = [<?=isset($_GET['produtoId']) ? implode(',',$_GET['produtoId']) : null ?>];
</script>

<!-- <body cz-shortcut-listen="true" ng-app="app" ng-controller="PedidoController"> -->



<div id="browserCompatibility" style="margin-left: 5%; margin-right: 5%; display: none;">



    <div class="row">
        <div class="col-lg-12">
            <div class="box-contato ">
                <h3 class="text-left" style="font-family: 'Exo', tahoma;"> Seu navegador não é compatível
                    com este
                    serviço</h3>
                <h4 class="text-left" style="font-family: 'Exo', tahoma;"> Utilize um dos seguintes
                    navegadores:
                </h4>
                <br />
                <div role="form" class="wpcf7" id="wpcf7-f312-o2" lang="pt-BR" dir="ltr">
                    <div class="screen-reader-response"></div>

                    <div class="row mt centered">

                        <div class="col-md-2">
                            <h4 class="text-left" style="font-family: 'Exo', tahoma;"> Google Chrome </h4>
                        </div>

                        <div class="col-md-2">
                            <h4 class="text-left" style="font-family: 'Exo', tahoma;"> Mozilla Firefox </h4>
                        </div>

                        <div class="col-md-2">
                            <h4 class="text-left" style="font-family: 'Exo', tahoma;"> Navegador Opera </h4>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div ng-app="app" ng-controller="PedidoController">

    <main class="main-site" id="main">
        <form name="mainForm" ng-submit="submit()" style="margin: -15px 20px 0px 20px;">

            <div class="content-site inner">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="box-combo" >
                            <header class="title-combo">
                        <h4>
                            Seu Pedido                       </h4>
                    </header>
                                <div class="boxes-item bg-white" ng-repeat="p in detalhes_produtos" style="border-bottom: #189CD9 solid 1px;">
                                    <div class="text-center">
                                        <i class="icon {{p.img}}"></i>
                                    </div>
                                    <div>
                                        <h5 class="{{p.tipo=='internet' ? 'mega-internet': ''}}"> {{p.name}} </h5>
                                        <span ng-repeat="attr in p.Atributos">{{attr.chave}}
                                            {{attr.valor}}<br></span>
                                        <div class="plus-canais" ng-show="p.tipo=='tva'">
                                            <a href="javascript:popup_canais({{p.id}})" data-idcanal="{{p.id}}"
                                                class="open-popup" onclick="popup_canais(this)">
                                                Ver Canais
                                            </a>
                                        </div>
                                    </div>
                                    
                                </div>


                                <div class="boxes-item bg-grey box-price">
                                <div class="text-center">
                                                            <h4 class="price"> R$<span>{{preco_total() | number:2}}</span> <small> /Mês* </small> </h4>
                           
                        </div>
                        <div class="text-center">
                                                            <h4 class="price"> R$<span>{{preco_total_install() | number:2}}</span> <small> instalação* </small> </h4>
                           
                        </div>
                    </div>
                            </div>
                        </div>

                        <div class="col-md-8">

                            <div class="row">
                                <div class="box-contato col-md-12">
                                    <h3 class="text-left" style="font-family: 'Exo', tahoma;"> Dados pessoais</h3>
                                    <div role="form" class="wpcf7" id="wpcf7-f312-o2" lang="pt-BR" dir="ltr">
                                        <div class="screen-reader-response"></div>

                                        <div class="form-group">
                                            <span class="wpcf7-form-control-wrap assunto" style="padding-bottom: 15px;">
                                                <input
                                                    class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control cliente"
                                                    style="height: 40px;" ng-model="form.dados_pessoais.Nome"
                                                    id="dadosPessoaisNome" maxlength="255" type="text"
                                                    pattern="[a-zA-ZáÁàÀãÃéÉêÊíÍóÓõÕôÔúÚçÇ ]+" autocomplete="off"
                                                    required placeholder="Nome Completo *">

                                            </span>
                                        </div>

                                        <div class="form-group">
                                            <span class="wpcf7-form-control-wrap assunto" style="padding-bottom: 15px;">
                                                <input
                                                    class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control cliente"
                                                    style="height: 40px;" ng-model="form.dados_pessoais.NomeMae"
                                                    maxlength="255" type="text"
                                                    pattern="[a-zA-ZáÁàÀãÃéÉêÊíÍóÓõÕôÔúÚçÇ ]+" autocomplete="off"
                                                    required placeholder="Nome da Mãe *">
                                            </span>
                                        </div>

                                        <div class="row-fluid">
                                            <div class="control-group span6" style="padding-bottom: 15px;">
                                                <div class="controls">
                                                    <input
                                                        class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control cliente"
                                                        style="height: 40px;" id="cnpj_cpf"
                                                        ng-model="form.dados_pessoais.CNPJ" type="text"
                                                        autocomplete="off" required placeholder="CPF *">
                                                </div>
                                            </div>
                                            <div class="control-group span6" style="padding-bottom: 15px;">
                                                <div class="controls">
                                                    <input
                                                        class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control cliente"
                                                        style="height: 40px;" id="data_nascimento" maxlength="10"
                                                        ng-model="form.dados_pessoais.Nascimento" type="text"
                                                        autocomplete="off" required placeholder="Data de Nascimento *">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row-fluid">
                                            <div class="control-group span6" style="padding-bottom: 15px;">
                                                <div class="controls">
                                                    <input
                                                        class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control cliente"
                                                        style="height: 40px;" ng-model="form.dados_pessoais.email"
                                                        maxlength="60" type="Email" autocomplete="off" required
                                                        placeholder="Email *">
                                                </div>
                                            </div>
                                            <div class="control-group span6" style="padding-bottom: 15px;">
                                                <div class="controls">
                                                    <input
                                                        class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control cliente"
                                                        style="height: 40px;" ng-model="form.dados_pessoais.rg"
                                                        maxlength="18" type="text" autocomplete="off" required
                                                        placeholder="RG *">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row-fluid">
                                            <div class="control-group span6" style="padding-bottom: 15px;">
                                                <div class="controls">
                                                    <input
                                                        class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control cliente"
                                                        style="height: 40px;" id="telefone1" maxlength="16"
                                                        ng-model="form.dados_pessoais.Telefone" type="text"
                                                        placeholder="Celular *" autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="control-group span6" style="padding-bottom: 15px;">
                                                <div class="controls">
                                                    <input
                                                        class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control cliente"
                                                        style="height: 40px;" id="telefone2" maxlength="15"
                                                        ng-model="form.dados_pessoais.fax" placeholder="Telefone"
                                                        type="text" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <div class="row">


                                <div class="box-contato col-md-12" style="padding-bottom: 20px;">
                                    <h3 class="text-left" style="font-family: 'Exo', tahoma;"> Endereço de
                                        instalação
                                    </h3>
                                    <div role="form" class="wpcf7" id="wpcf7-f312-o2" lang="pt-BR" dir="ltr">
                                        <div class="screen-reader-response"></div>

                                        <div class="widget-body">
                                            <div class="widget-main">
                                                <section id="EnderecoCliente">
                                                    <div class="row-fluid">
                                                        <div class="control-group span3" style="padding-bottom: 15px;">
                                                            <div class="controls">
                                                                <input
                                                                    class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control endereco"
                                                                    style="height: 40px;"
                                                                    ng-model="form.endereco_instalacao.CEP" type="text"
                                                                    id="cep"
                                                                    ng-change="getEnderecoByCEP(form.endereco_instalacao.CEP)"
                                                                    maxlength="9" placeholder="CEP *" autocomplete="off"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="control-group span3" style="padding-bottom: 15px;">
                                                            <div class="controls">
                                                                <select
                                                                    class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control endereco"
                                                                    style="height: 40px; padding-top: 0px; padding-bottom: 0px;"
                                                                    ng-model="form.endereco_instalacao.Estado" id="uf">
                                                                    <option value="">UF *</option>
                                                                    <option value="AC">AC</option>
                                                                    <option value="AL">AL</option>
                                                                    <option value="AM">AM</option>
                                                                    <option value="AP">AP</option>
                                                                    <option value="BA">BA</option>
                                                                    <option value="CE">CE</option>
                                                                    <option value="DF">DF</option>
                                                                    <option value="ES">ES</option>
                                                                    <option value="GO">GO</option>
                                                                    <option value="MA">MA</option>
                                                                    <option value="MG">MG</option>
                                                                    <option value="MS">MS</option>
                                                                    <option value="MT">MT</option>
                                                                    <option value="PA">PA</option>
                                                                    <option value="PB">PB</option>
                                                                    <option value="PE">PE</option>
                                                                    <option value="PI">PI</option>
                                                                    <option value="PR">PR</option>
                                                                    <option value="RD">RD</option>
                                                                    <option value="RJ">RJ</option>
                                                                    <option value="RN">RN</option>
                                                                    <option value="RR">RR</option>
                                                                    <option value="RS">RS</option>
                                                                    <option value="SC">SC</option>
                                                                    <option value="SE">SE</option>
                                                                    <option value="SP">SP</option>
                                                                    <option value="TO">TO</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="control-group span6" style="padding-bottom: 15px;">
                                                            <div class="controls">
                                                                <select
                                                                    class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control endereco"
                                                                    style="height: 40px; padding-top: 0px; padding-bottom: 0px;"
                                                                    id="cidade" required>
                                                                    <option value="" hidden>Cidade</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="control-group" style="padding-bottom: 15px;">
                                                        <div class="controls">
                                                            <select
                                                                class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control endereco"
                                                                style="height: 40px; padding-top: 0px; padding-bottom: 0px;"
                                                                id="bairro" ng-model="form.endereco_instalacao.Bairro"
                                                                ng-options="bairro for bairro in bairros" required>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row-fluid">
                                                        <div class="control-group span3" style="margin-bottom: 15px;">
                                                            <div class="controls">
                                                                <select
                                                                    class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control endereco"
                                                                    style="height: 40px; padding-top: 0px; padding-bottom: 0px;"
                                                                    id="tipo_logradouro"
                                                                    ng-model="form.endereco_instalacao.tipoLogradouro"
                                                                    ng-options="tipo_log for tipo_log in tipo_logradouro"
                                                                    required>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="control-group span9" style="margin-bottom: 15px;">
                                                            <div class="controls">
                                                                <input
                                                                    class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control endereco"
                                                                    style="height: 40px; padding-top: 0px; padding-bottom: 0px;"
                                                                    id="logradouro"
                                                                    ng-model="form.endereco_instalacao.logradouro"
                                                                    maxlength="200" type="text"
                                                                    placeholder="Logradouro *" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row-fluid">
                                                        <div class="control-group span3" style="margin-bottom: 15px;">
                                                            <div class="controls">
                                                                <input
                                                                    class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control endereco"
                                                                    style="height: 40px; padding-top: 0px; padding-bottom: 0px;"
                                                                    ng-model="form.endereco_instalacao.numero"
                                                                    id="numero" maxlength="10" type="text"
                                                                    pattern="[0-9 ]+" placeholder="Número *" required>
                                                            </div>
                                                        </div>
                                                        <div class="control-group span9" style="margin-bottom: 15px;">
                                                            <div class="controls">
                                                                <input
                                                                    class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control endereco"
                                                                    style="height: 40px; padding-top: 0px; padding-bottom: 0px;"
                                                                    ng-model="form.endereco_instalacao.complemento"
                                                                    maxlength="20" type="text" autocomplete="off"
                                                                    placeholder="Complemento">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row-fluid">
                                                        <div class="span3">
                                                            <div class="control-group span12"
                                                                style="margin-bottom: 15px;">
                                                                <div class="controls">
                                                                    <select
                                                                        class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control endereco"
                                                                        style="height: 40px; padding-top: 0px; padding-bottom: 0px;"
                                                                        id="andar" ng-model="andar"
                                                                        ng-options="andar.name for andar in andares"
                                                                        ng-change="form.endereco_instalacao.andar = andar.value"
                                                                        required>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="span9">
                                                            <div class="control-group span12"
                                                                style="margin-bottom: 15px;">
                                                                <div class="controls">
                                                                    <input
                                                                        class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control endereco"
                                                                        style="height: 40px; padding-top: 0px; padding-bottom: 0px;"
                                                                        ng-model="form.endereco_instalacao.referencia"
                                                                        maxlength="80" type="text"
                                                                        placeholder="Referência *" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <br />
                            </div>
                            <br />
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="load" style="display: none" class="text-right">
                                        <img src="<?= get_template_directory_uri() ?>/assets/images/spinner.gif" alt="">
                                    </div>
                                    <div class="text-right">
                                        <input type="submit" value="Enviar" id="enviar"
                                            class="wpcf7-form-control wpcf7-submit btn btn-site btn-lg ">
                                        <span class="ajax-loader"></span>
                                        <div class="wpcf7-response-output wpcf7-display-none"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
    <div class="small text-center">*Sujeito a viabilidade técnica e aprovação de crédito, consulte as <a href='/condicoes-comerciais'>condições comerciais</a><br />
    Oferta válida para o bairro <?=$idDistrito?> na cidade de <?=$idCidade?>
    </div>
</div>

<!-- Somente para teste -->
<!-- <input type="button" value="POST" ng-click="log()"> -->

<script type="text/javascript">
document.getElementById("main").style.display = "none";

var isIE = false || !!document.documentMode;
var version = detectIE_EDGE();
if (version !== false) {
    document.getElementById("browserCompatibility").style.display = "block";
} else {
    document.getElementById("main").style.display = "block";
}

/**
 * detect IE
 * returns version of IE or false, if browser is not Internet Explorer
 */
function detectIE_EDGE() {
    var ua = window.navigator.userAgent;
    var msie = ua.indexOf('MSIE ');
    if (msie > 0) {
        // IE 10 or older => return version number
        return parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
    }
    var trident = ua.indexOf('Trident/');
    if (trident > 0) {
        // IE 11 => return version number
        var rv = ua.indexOf('rv:');
        return parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10);
    }
    var edge = ua.indexOf('Edge/');
    if (edge > 0) {
        // Edge (IE 12+) => return version number
        return parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10);
    }
    // other browser
    return false;
}
</script>

</div>

<div id="gradeCanais" class="pop-up-grade">
</div>
<?php get_footer() ?>