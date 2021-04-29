<!DOCTYPE html>
<html lang="en">

<head>
    <title> Pedido </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <link rel="stylesheet" href="css/pedido.css">
    <link rel="stylesheet" href="./ace/assets/css/datepicker.css">
    <link rel="stylesheet" href="./ace/assets/css/daterangepicker.css">
    <link rel="stylesheet" href="./ace/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="./ace/assets/css/font-awesome.3.1.min.css">
    <link rel="stylesheet" href="./ace/assets/css/bootstrap-timepicker.css">
    <link rel="stylesheet" href="./ace/assets/css/bootstrap-responsive.min.css">

    <script data-require="jquery@*" data-semver="2.1.3" src="./lib/jquery-2.1.3.min.js"></script>
    <link data-require="bootstrap@*" data-semver="3.3.1" rel="stylesheet"
        href="./lib/bootstrap4/css/bootstrap.min.css" />
    <script data-require="bootstrap@*" data-semver="3.3.1" src="./lib/bootstrap4/js/bootstrap.min.js"></script>
    <script data-require="angular.js@*" data-semver="1.4.0-beta.3" src="./lib/angular.js"></script>

    <script src="./lib/bootbox.js"></script>
    <script src="./lib/ngBootbox.js"></script>
    <script src="./js/pedido.js"></script>
    <script type="text/javascript" src="./lib/jquery.mask.js"></script>
    <script type="text/javascript" src="./lib/vanilla-masker.min.js"></script>
    <script src="./js/masks.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex,follow">
    <meta property="og:locale" content="pt_BR">
    <meta property="og:type" content="article">
    <meta property="og:title" content="Contato - Valenet">
    <meta property="og:site_name" content="Valenet">
    <meta property="og:image:width" content="1440">
    <meta property="og:image:height" content="300">

    <link rel="stylesheet" id="main-css" href="./css/style.css" type="text/css" media="screen">
</head>

<body cz-shortcut-listen="true" ng-app="app" ng-controller="PedidoController">

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h3 class="text-left" style="font-family: 'Exo', tahoma;"> Valenet te liga</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>

                <form class="form-horizontal" ng-submit="valenetTeLiga()" role="form">
                    <div id="mce-responses" class="clear">
                        <div class="response" id="mce-error-response" style="display:none"></div>
                        <div class="response" id="mce-success-response" style="display:none"></div>
                    </div>

                    <div class="form-group" style="padding-top: 15px;">
                        <select class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control"
                            style="height: 40px; padding-top: 0px; padding-bottom: 0px; padding: 0.375rem 0.50rem;"
                            id="valenetTeLigaDepartamentos" ng-model="formVelenetTeLiga.departamento"
                            ng-options="departamento.name for departamento in aDepartamentos" required>
                            <option value='' hidden>Departamento</option>
                        </select>
                    </div>

                    <div class="form-group"><span class="wpcf7-form-control-wrap nome"><input type="text" name="nome"
                                value="" size="40" class="wpcf7-form-control wpcf7-text form-control"
                                ng-model="formVelenetTeLiga.nome" aria-invalid="false" placeholder="Nome"
                                id="valenetTeLigaNome" autocomplete="off" required>
                        </span>
                    </div>

                    <div class="form-group">
                        <span class="wpcf7-form-control-wrap telefone">
                            <input type="tel" name="telefone" value="" size="40"
                                class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-tel form-control telefone"
                                ng-model="formVelenetTeLiga.telefone" id="valenetTeLigaTelefone" aria-invalid="false"
                                placeholder="Telefone" maxlength="15" autocomplete="off" required>
                        </span>
                    </div>

                    <div class="modal-footer remove-top">
                        <input type="submit" class="wpcf7-form-control wpcf7-submit btn btn-site btn-lg"
                            id="valenetTeLigaBotao" value="Me Ligue">
                    </div>

                    <div class="border border-success" style="border-width:3px !important; display: none;"
                        id="valenetTeLigaMsg">&nbsp;&nbsp;Obrigado! Em breve ligaremos para você. </div>

                </form>

            </div>
        </div>
    </div>
  
    <div style="padding-bottom: 60px;">
        <nav class=""
            style="padding-left: 80%; padding-right: 20%; padding-top: 5px; padding-bottom: 5px; float: right; background-color: #189CD9;">
            <button class="nav-link btn btn-teliga" data-toggle="modal" data-target="#myModal"><span
                    style="font-weight: bold;">Valenet te liga<span></button>
        </nav>
    </div>

    <div id="browserCompatibility" style="margin-left: 5%; margin-right: 5%; display: none;">
        <div class="row">
            <div class="col-lg-12">
                <div class="box-contato ">
                    <h3 class="text-left" style="font-family: 'Exo', tahoma;"> Seu navegador não é compatível com este
                        serviço</h3>
                    <h4 class="text-left" style="font-family: 'Exo', tahoma;"> Utilize um dos seguintes navegadores:
                    </h4>
                    <br />
                    <div role="form" class="wpcf7" id="wpcf7-f312-o2" lang="pt-BR" dir="ltr">
                        <div class="screen-reader-response"></div>

                        <div class="row mt centered">
                            <div class="col-md-2">
                                <img src="img/chrome.png" width="130px" height="auto">
                                <h4 class="text-left" style="font-family: 'Exo', tahoma;"> Google Chrome </h4>

                            </div>
                            <div class="col-md-2">
                                <img src="img/firefox.png" width="130px" height="auto">
                                <h4 class="text-left" style="font-family: 'Exo', tahoma;"> Mozilla Firefox </h4>

                            </div>

                            <div class="col-md-2">
                                <img src="img/opera.png" width="130px" height="auto">
                                <h4 class="text-left" style="font-family: 'Exo', tahoma;"> Navegador Opera </h4>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <main class="main-site" id="main">
        <form name="mainForm" ng-submit="submit()" style="margin: -15px 20px 0px 20px;" action="save.php">
        <?php
            foreach ($_GET['produtoId'] as $k=>$v){
                echo "<input type='hidden' name='produtoId[]' value='$v' ng-model='form.produtos' />";
            }
        ?>
            <div class="content-site inner">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-contato ">
                                <h3 class="text-left" style="font-family: 'Exo', tahoma;"> Dados pessoais</h3>
                                <div role="form" class="wpcf7" id="wpcf7-f312-o2" lang="pt-BR" dir="ltr">
                                    <div class="screen-reader-response"></div>

                                    <div class="form-group">
                                        <span class="wpcf7-form-control-wrap assunto">
                                            <input
                                                class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control cliente"
                                                style="height: 40px;" ng-model="form.dados_pessoais.Nome"
                                                id="dadosPessoaisNome" maxlength="255" type="text"
                                                pattern="[a-zA-ZáÁàÀãÃéÉêÊíÍóÓõÕôÔúÚçÇ ]+" autocomplete="off" required
                                                placeholder="Nome Completo *">

                                        </span>
                                    </div>

                                    <div class="form-group">
                                        <span class="wpcf7-form-control-wrap assunto">
                                            <input
                                                class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control cliente"
                                                style="height: 40px;" ng-model="form.dados_pessoais.NomeMae"
                                                maxlength="255" type="text" pattern="[a-zA-ZáÁàÀãÃéÉêÊíÍóÓõÕôÔúÚçÇ ]+"
                                                autocomplete="off" required placeholder="Nome da Mãe *">
                                        </span>
                                    </div>

                                    <div class="row-fluid">
                                        <div class="control-group span6">
                                            <div class="controls">
                                                <input
                                                    class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control cliente"
                                                    style="height: 40px;" id="cnpj_cpf"
                                                    ng-model="form.dados_pessoais.CNPJ" type="text" autocomplete="off"
                                                    required placeholder="CPF *">
                                            </div>
                                        </div>
                                        <div class="control-group span6">
                                            <div class="controls">
                                                <input
                                                    class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control cliente"
                                                    style="height: 40px;" id="data_nascimento" maxlength="10"
                                                    ng-model="form.dados_pessoais.Nascimento" type="text"
                                                    autocomplete="off" required placeholder="Data de Nascimento *">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row-fluid" style="padding-top: 15px; ">
                                        <div class="control-group span6">
                                            <div class="controls">
                                                <input
                                                    class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control cliente"
                                                    style="height: 40px;" ng-model="form.dados_pessoais.email"
                                                    maxlength="60" type="Email" autocomplete="off" required
                                                    placeholder="Email *">
                                            </div>
                                        </div>
                                        <div class="control-group span6">
                                            <div class="controls">
                                                <input
                                                    class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control cliente"
                                                    style="height: 40px;" ng-model="form.dados_pessoais.rg"
                                                    maxlength="18" type="text" autocomplete="off" required
                                                    placeholder="RG *">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row-fluid" style="padding-top: 15px; ">
                                        <div class="control-group span6">
                                            <div class="controls">
                                                <input
                                                    class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control cliente"
                                                    style="height: 40px;" id="telefone1" maxlength="16"
                                                    ng-model="form.dados_pessoais.Telefone" type="text"
                                                    placeholder="Celular *" autocomplete="off" required>
                                            </div>
                                        </div>
                                        <div class="control-group span6">
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
                    </div>
                    <br />
                    <div class="row">

                        <div class="col-md-12" style="padding-bottom: 20px;">
                            <div class="box-contato ">
                                <h3 class="text-left" style="font-family: 'Exo', tahoma;"> Endereço de instalação
                                </h3>
                                <div role="form" class="wpcf7" id="wpcf7-f312-o2" lang="pt-BR" dir="ltr">
                                    <div class="screen-reader-response"></div>

                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <section id="EnderecoCliente">
                                                <div class="row-fluid">
                                                    <div class="control-group span3">
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
                                                    <div class="control-group span3">
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
                                                    <div class="control-group span6">
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
                                                <div class="control-group" style="padding-top: 15px; ">
                                                    <div class="controls">
                                                        <select
                                                            class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control endereco"
                                                            style="height: 40px; padding-top: 0px; padding-bottom: 0px;"
                                                            id="bairro" ng-model="form.endereco_instalacao.Bairro"
                                                            ng-options="bairro for bairro in bairros">
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row-fluid">
                                                    <div class="control-group span3" style="margin-top: 15px;">
                                                        <div class="controls">
                                                            <select
                                                                class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control endereco"
                                                                style="height: 40px; padding-top: 0px; padding-bottom: 0px;"
                                                                id="tipo_logradouro"
                                                                ng-model="form.endereco_instalacao.tipoLogradouro"
                                                                ng-options="tipo_log for tipo_log in tipo_logradouro">
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="control-group span9" style="margin-top: 15px;">
                                                        <div class="controls">
                                                            <input
                                                                class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control endereco"
                                                                style="height: 40px; padding-top: 0px; padding-bottom: 0px;"
                                                                id="logradouro"
                                                                ng-model="form.endereco_instalacao.logradouro"
                                                                maxlength="200" type="text" required
                                                                placeholder="Logradouro *">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row-fluid">
                                                    <div class="control-group span3" style="margin-top: 15px;">
                                                        <div class="controls">
                                                            <input
                                                                class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control endereco"
                                                                style="height: 40px; padding-top: 0px; padding-bottom: 0px;"
                                                                ng-model="form.endereco_instalacao.numero" id="numero"
                                                                maxlength="10" type="text" pattern="[0-9 ]+" required
                                                                placeholder="Número *">
                                                        </div>
                                                    </div>
                                                    <div class="control-group span9" style="margin-top: 15px;">
                                                        <div class="controls">
                                                            <input
                                                                class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control endereco"
                                                                style="height: 40px; padding-top: 0px; padding-bottom: 0px;"
                                                                ng-model="form.endereco_instalacao.complemento"
                                                                maxlength="20" type="text" autocomplete="off" required
                                                                placeholder="Complemento *">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row-fluid">
                                                    <div class="span3">
                                                        <div class="control-group span12" style="margin-top: 15px;">
                                                            <div class="controls">
                                                                <select
                                                                    class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control endereco"
                                                                    style="height: 40px; padding-top: 0px; padding-bottom: 0px;"
                                                                    id="andar" ng-model="andar"
                                                                    ng-options="andar.name for andar in andares"
                                                                    ng-change="form.endereco_instalacao.andar = andar.value">
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="span9">
                                                        <div class="control-group span12" style="margin-top: 15px;">
                                                            <div class="controls">
                                                                <input
                                                                    class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control endereco"
                                                                    style="height: 40px; padding-top: 0px; padding-bottom: 0px;"
                                                                    ng-model="form.endereco_instalacao.referencia"
                                                                    maxlength="80" type="text"
                                                                    placeholder="Referência *">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br />
                        <div class="col-md-6" id="pagamentoCartao" style="display: none">
                            <div class="box-contato">
                                <h3 class="text-left" style="font-family: 'Exo', tahoma;"> Pagamento (Cartão de
                                    Crédito)
                                </h3>
                                <div role="form" class="wpcf7" id="wpcf7-f312-o2" lang="pt-BR" dir="ltr">
                                    <div class="screen-reader-response"></div>
                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <section id="PagamentoCartaoCredito">
                                                <div class="widget-body">
                                                    <div class="widget-main padding-6">
                                                        <div class="control-group row-fluid">
                                                            <div class="controls">
                                                                <input
                                                                    class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control"
                                                                    style="height: 40px; padding-top: 0px; padding-bottom: 0px; text-transform: uppercase"
                                                                    ng-model="form.dados_cartao.Nome" maxlength="26"
                                                                    type="text" pattern="[a-zA-Z ]+" autocomplete="off"
                                                                    required placeholder="Nome impresso no Cartão *">
                                                            </div>
                                                        </div>
                                                        <div class="row-fluid">
                                                            <div class="control-group span6" style="margin-top: 15px;">
                                                                <div class="controls">
                                                                    <input id="numero_cartao"
                                                                        ng-model="form.dados_cartao.numero"
                                                                        autocomplete="off"
                                                                        class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control"
                                                                        style="height: 40px; padding-top: 0px; padding-bottom: 0px;"
                                                                        type="text" maxlength="19" required
                                                                        placeholder="Número do cartão *">
                                                                </div>
                                                            </div>
                                                            <div class="control-group span2" style="margin-top: 15px;">
                                                                <div class="controls">
                                                                    <input
                                                                        class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control"
                                                                        style="height: 40px; padding-top: 0px; padding-bottom: 0px;"
                                                                        ng-model="form.dados_cartao.cvv" type="text"
                                                                        pattern="[0-9 ]+" maxlength="3"
                                                                        autocomplete="off" required placeholder="CVV *">
                                                                </div>
                                                            </div>
                                                            <div class="control-group span2" style="margin-top: 15px;">
                                                                <div class="controls">
                                                                    <select
                                                                        class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control"
                                                                        style="height: 40px; padding-top: 0px; padding-bottom: 0px;  padding: 0.375rem 0.50rem;"
                                                                        ng-model="form.dados_cartao.mesVencimento"
                                                                        required>
                                                                        <option value="" hidden>MÊS</option>
                                                                        <option value="01">01</option>
                                                                        <option value="02">02</option>
                                                                        <option value="03">03</option>
                                                                        <option value="04">04</option>
                                                                        <option value="05">05</option>
                                                                        <option value="06">06</option>
                                                                        <option value="07">07</option>
                                                                        <option value="08">08</option>
                                                                        <option value="09">09</option>
                                                                        <option value="10">10</option>
                                                                        <option value="11">11</option>
                                                                        <option value="12">12</option>
                                                                    </select>

                                                                </div>
                                                            </div>
                                                            <div class="control-group span2" style="margin-top: 15px;">
                                                                <div class="controls">
                                                                    <select
                                                                        class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control"
                                                                        style="height: 40px; padding-top: 0px; padding-bottom: 0px; padding: 0.375rem 0.50rem;"
                                                                        id="anoVencimento"
                                                                        ng-model="form.dados_cartao.anoVencimento"
                                                                        ng-options="ano for ano in anoVencimento"
                                                                        required>
                                                                        <option value='' hidden>ANO</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="row-fluid" style="padding-top: 168px;">
                                                                <div class="control-group span4"><label
                                                                        class="control-label"
                                                                        style="display: none">Selecione a
                                                                        bandeira:
                                                                    </label>
                                                                </div>
                                                                <div class="control-group span2">
                                                                    <input type="radio"
                                                                        ng-model="form.dados_cartao.bandeira" id="visa"
                                                                        name="card" value="visa" alt="Visa" required>
                                                                    <img src="./img/creditcard/visa-48px.png"
                                                                        alt="Cartão Visa">
                                                                </div>
                                                                <div class="control-group span2">
                                                                    <input type="radio"
                                                                        ng-model="form.dados_cartao.bandeira"
                                                                        name="card" value="mastercard" id="mastercard"
                                                                        alt="MasterCard">
                                                                    <img src="./img/creditcard/mastercard-48px.png"
                                                                        alt="Cartão MasterCard">
                                                                </div>
                                                                <div class="control-group span2">
                                                                    <input type="radio"
                                                                        ng-model="form.dados_cartao.bandeira" id="amex"
                                                                        name="card" value="amex" alt="American Express">
                                                                    <img src="./img/creditcard/amex-48px.png"
                                                                        alt="Cartão American Express">
                                                                </div>
                                                                <div class="control-group span2">
                                                                    <input type="radio"
                                                                        ng-model="form.dados_cartao.bandeira" id="elo"
                                                                        name="card" value="elo" alt="Elo">
                                                                    <img src="./img/creditcard/elo-48px.png"
                                                                        alt="Cartão Elo">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-right">
                                <input type="submit" value="Enviar"
                                    class="wpcf7-form-control wpcf7-submit btn btn-site btn-lg "><span
                                    class="ajax-loader"></span>
                                <div class="wpcf7-response-output wpcf7-display-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
    <div class="pre-footer inner">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                    <h5 style="font-family: 'Exo', tahoma;"> Fale com a Valenet</h5>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <div class="contato-rodape">
                        <div class="icon-col">
                            <img src="./img/contato-icon.png" alt="">
                        </div>
                        <div>
                            <span class="titulo-contato"> Contato por telefone </span>
                            <p> O número é exclusivo e a ligação é gratuita. </p>
                            <h5 style="font-family: 'Exo', tahoma;"> 106 38 </h5>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <div class="contato-rodape">
                        <div class="icon-col">
                            <img src="./img/envelope.png" alt="">
                        </div>
                        <div>
                            <span class="titulo-contato"> Contato por e-mail </span>
                            <p> Envie suas dúvidas ou solicite informações através do formulário. </p>
                            <a href="http://site-dev.valenet.com.br/contato" class="btn btn-site"> Fale conosco </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Somente para teste -->
    <input type="button" value="POST" ng-click="log()">
</body>

<form action="save.php" method="post">
    <input type="hidden" name="test" value="the test" />
    <!-- <input type="submit" value="POST PHP" />     -->
</form>

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

</html>