
var module = angular.module("app", ['ngBootbox']);
var urlAPICallCenter = "https://api.valenet.com.br:8889/queuecall/";    // Local
// var urlAPICallCenter = "http://docker.valenet.com.br:8000/";

String.prototype.replaceAll = function (search, replacement) {
    var target = this;
    return target.split(search).join(replacement);
};


String.prototype.onlyNumbers = function () {
    var target = this;
    target = target.split('-').join('');
    target = target.split('.').join('');
    target = target.split('(').join('');
    target = target.split(')').join('');
    target = target.split(' ').join('');
    return target
};
module.run(["$locale", function ($locale) {
    $locale.NUMBER_FORMATS.GROUP_SEP = " ";
    $locale.NUMBER_FORMATS.DECIMAL_SEP = ",";
}]);
module.controller("PedidoController", ['$scope', '$http', '$q', '$ngBootbox', function ($scope, $http, $q, $ngBootbox) {

    $scope.form = { dados_pessoais: { assinaturaContrato: 'SMS' }, endereco_instalacao: { tipoLogradouro: null }, dados_cartao: { tipoPagamento: 'credito' } }
    $scope.formEnviado = false;
    $scope.clienteCadastrado = false;
    $scope.atendimentoCadastrado = false;
    $scope.quoteCadastrada = false;
    $scope.codclie = null;
    $scope.codate = null;

    if(produtos_selecionados.length > 0){
        $scope.produtos_selecionados = produtos_selecionados;
    } else {
        bootbox.alert({
            message: "Selecione ao menos um produto!",
            callback: function () {
                window.location = "/montar-combo/"
            }
        })
    }
    
    $scope.detalhes_produtos = []

    $scope.preco_total = function(){
        

        var p=0, pi=0;
        var itens = $scope.detalhes_produtos.filter((item) => { return item != null });
        var contagemCombo = $scope.detalhes_produtos.filter((item) => { return item != null }).filter(item=>(!item.tipo.startsWith('accessory'))).length
        console.log('ITens de combo', contagemCombo)
        for(var i=0;i<itens.length;i++){
            j = itens[i];
           
            switch(contagemCombo){
                case 1:
                p += j.price_single;
                pi += j.price_single_install;
                break;
                case 2:
        
                p += j.price_combo;
                pi += j.price_combo_install;
                break;
                case 3:
        
                p += j.price_triple || j.price_combo;
                pi += j.price_triple_install || j.price_combo_install;
                break;
            }
        }
        
        return p;
    }

    $scope.preco_total_install = function(){
        var p=0, pi=0;
        var itens = $scope.detalhes_produtos.filter((item) => { return item != null });
        console.log(itens);
        var contagemCombo = $scope.detalhes_produtos.filter((item) => { return item != null }).filter(item=>(!item.tipo.startsWith('accessory'))).length
        console.log('ITens de combo Install', contagemCombo)
        for(var i=0;i<itens.length;i++){
            j = itens[i];
           
            switch(contagemCombo){
                case 1:
                p += j.price_single;
                pi += j.price_install_single;
                break;
                case 2:
        
                p += j.price_combo;
                pi += j.price_install_combo;
                break;
                case 3:
        
                p += j.price_triple || j.price_combo;
                pi += j.price_install_triple || j.price_install_combo;
                break;
            }
        }
        console.log('Preço total de instalação', pi)
        return pi;
    }
   
    //lista os produtos



    $scope.produtos = () => {
        console.log(apiUrl);
        return new Promise((resolve, reject) => {
            $http.get(apiUrl).then((result) => {
                console.log(result);
                $scope.list_produtos = (result.data.broadband || []).map(item => { item.tipo = 'internet'; item.img = 'icon-roteador-valenet-forma'; return item; });
                $scope.list_produtos = Array.prototype.concat($scope.list_produtos, (result.data.phone || []).map(item => { item.tipo = 'phone'; item.img = 'icon-telefone-valenet-line'; return item; }));
                $scope.list_produtos = Array.prototype.concat($scope.list_produtos, (result.data.tv || []).map(item => { item.tipo = 'tva'; item.img = 'icon-televisao'; return item; }));
                $scope.list_produtos = Array.prototype.concat($scope.list_produtos, (result.data.accessories || []).map(item => { item.tipo = 'accessory'+item.id; item.img = 'icon-roteador-valenet-forma'; return item; }));
                console.log($scope.list_produtos);
                //$scope.preco_total_install = $scope.preco_total = 0;
                $scope.detalhes_produtos = $scope.produtos_selecionados.map((item) => {
                    var detail = $scope.list_produtos.filter((j) => {
                        if (j == null) return;

                        return j.priceListId == item || j.id == item;
                    });
                    console.log(item, detail);
                    if (detail != null && detail.length) return detail[0];

                }).filter((item) => { return item != null });;
                console.log($scope.detalhes_produtos);
            })
        })
        //return await $http.get(apiUrl);
    }
    $scope.produtos();

    $scope.submit = function () {

        // $http.post('https://api.valenet.com.br/api/Messenger/Contato', $scope.form)
        //     .success(function (res) {
        //         // console.log('res', res);
        //         alert('E-mail enviado.');
        //     }).error(function (error) {
        //         // console.log('error', error);
        //         alert('Erro ao enviar o e-mail!')
        //     })

        // console.log($scope.form)
        $scope.formEnviado = true;
        if ($scope.verifyFields($scope.form)) {
            $scope.formatForm($scope.form)

            $("#load").show()
            $("#enviar").prop("disabled",true)
            if(!$scope.clienteCadastrado){

                var promise1 = $scope.cadastrarCliente();

                promise1.then(function () {
                    var promise2 = $scope.cadastrarAtendimento();

                    promise2.then(function () {
                        var promise3 = $scope.cadastrarQuote();

                        promise3.then(function () {
                            bootbox.alert({
                                message: "Venda cadastrada com sucesso, em breve entraremos em contato!",
                                callback: function () {
                                    window.location = "/"
                                }
                            })
                            $("#load").hide()
                            $("#enviar").prop("disabled",false)
                        });
                    });
                });

            }
            else if ($scope.clienteCadastrado && !$scope.atendimentoCadastrado)
            {

                var promise2 = $scope.cadastrarAtendimento();

                promise2.then(function () {
                    var promise3 = $scope.cadastrarQuote();

                    promise3.then(function () {
                        bootbox.alert({
                            message: "Venda cadastrada com sucesso, em breve entraremos em contato!",
                            callback: function () {
                                window.location = "/"
                            }
                        })
                        $("#load").hide()
                        $("#enviar").prop("disabled",false)
                    });
                });
                
            }
            else if ($scope.clienteCadastrado && $scope.atendimentoCadastrado)
            {
                var promise3 = $scope.cadastrarQuote();

                promise3.then(function () {
                    bootbox.alert({
                        message: "Venda cadastrada com sucesso, em breve entraremos em contato!",
                        callback: function () {
                            window.location = "/"
                        }
                    })
                    $("#load").hide()
                    $("#enviar").prop("disabled",false)
                });
            }
        }
    };

    $scope.aDepartamentos = [{ name: 'Cobrança', queue: 'Cobranca' }, { name: 'Suporte Técnico', queue: 'Suporte' }, { name: 'Vendas', queue: 'Vendas' }]

    $scope.formVelenetTeLiga = { departamento: null, nome: null, telefone: null }

    $scope.valenetTeLiga = function () {

        if ($scope.formVelenetTeLiga.telefone.length < 14) {
            bootbox.alert("O número de telefone informado é inválido!")
        } else {
            console.log('valenetTeLiga', $scope.formVelenetTeLiga)
            console.log('path: ', urlAPICallCenter + $scope.formVelenetTeLiga.departamento.queue + '/' + $scope.formVelenetTeLiga.telefone.onlyNumbers())


            document.getElementById("valenetTeLigaMsg").style.display = "block";
            document.getElementById("valenetTeLigaDepartamentos").disabled = true;
            document.getElementById("valenetTeLigaNome").disabled = true;
            document.getElementById("valenetTeLigaTelefone").disabled = true;
            document.getElementById("valenetTeLigaBotao").disabled = true;

            // Funcionando para API local (sem o Docker)
            // $http({
            //     url: urlAPICallCenter + $scope.formVelenetTeLiga.departamento.queue + '/' + $scope.formVelenetTeLiga.telefone.onlyNumbers(),
            //     headers: {
            //         'Accept': 'application/json',
            //         'Content-Type': 'application/json'
            //     },
            //     method: 'get',
            //     datatype: 'json',
            //     data: {}
            // }).then(data => {
            //     console.log(data)
            // })

        }

    };

    $scope.cadastrarCliente = function () {
        var deferred = $q.defer();

        if($scope.detalhes_produtos.length > 0){

            $http({
                url: urlAPI + 'CadastrarCliente',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                method: 'post',
                datatype: 'json',
                data: { ...$scope.form.dados_pessoais, ...$scope.form.endereco_instalacao }
            }).then(
                function success(response) {
                    if (response.data.success) {
    
                        $scope.codclie = response.data.codclie
                        $scope.clienteCadastrado = true;
                        deferred.resolve(true);
    
                    } else {
    
                        bootbox.alert('Ocorreu um erro inesperado: ' + response.data.message)
                        $("#load").hide()
                        $("#enviar").prop("disabled",false)
                    }
                },
                function error(response) {
                    //myApp.hidePleaseWait();
                    console.log(response);
                    bootbox.alert('Ocorreu um erro inesperado!')
                    $("#load").hide()
                    $("#enviar").prop("disabled",false)
                }
            );
        } else {
            bootbox.alert('Selecione ao menos um produto!')
        }
        return deferred.promise;
    }

    $scope.cadastrarAtendimento = function () {
        var deferred = $q.defer();

        if($scope.detalhes_produtos.length > 0){

            $http({
                url: urlAPI + 'CadastrarAtendimento',
                method: 'post',
                params: {
                    codclie: $scope.codclie
                }
            }).then(
                function success(response) {
                    if (response.data.success) {
    
                        $scope.codate = response.data.codate
                        $scope.atendimentoCadastrado = true;
                        deferred.resolve(true);
    
                    } else {
                        
                        bootbox.alert('Ocorreu um erro inesperado: ' + response.data.message)
                        $("#load").hide()
                        $("#enviar").prop("disabled",false)
                    }
                },
                function error(response) {
                    //myApp.hidePleaseWait();
                    console.log(response);
                    bootbox.alert('Ocorreu um erro inesperado!')
                    $("#load").hide()
                    $("#enviar").prop("disabled",false)
                }
            );
        } else {
            bootbox.alert('Selecione ao menos um produto!')
        }
        return deferred.promise;
    }

    $scope.cadastrarQuote = function () {
        var deferred = $q.defer();

        
        if($scope.detalhes_produtos.length > 0){
            
            //var PriceListIDs = [];
            //$scope.detalhes_produtos.map(priceList => PriceListIDs.push(priceList.priceListId))
            var PriceListIDs = $scope.detalhes_produtos.map(p=>p.priceListId);
            console.log(PriceListIDs)
            $http({
                url: urlAPI + 'CadastrarQuote',
                method: 'post',
                data: {
                    codclie: $scope.codclie,
                    codate: $scope.codate,
                    PriceListIDs: PriceListIDs,
                    endereco: $scope.form.endereco_instalacao
                }
            }).then(
                function success(response) {
                    if (response.data.success) {
    
                        $scope.codate = response.data.codate
                        $scope.atendimentoCadastrado = true;
                        deferred.resolve(true);
    
                    } else {
                        
                        bootbox.alert('Ocorreu um erro inesperado: ' + response.data.message)
                        $("#load").hide()
                        $("#enviar").prop("disabled",false)
                    }
                },
                function error(response) {
                    //myApp.hidePleaseWait();
                    console.log(response);
                    bootbox.alert('Ocorreu um erro inesperado!')
                    $("#load").hide()
                    $("#enviar").prop("disabled",false)
                }
            );
        } else {
            bootbox.alert('Selecione ao menos um produto!')
        }
        return deferred.promise;
    }

    $scope.validarCPF = function (cpf) {
        cpf = cpf.replace(/[^\d]+/g, '');
        if (cpf == '') return false;
        // Elimina CPFs invalidos conhecidos	
        if (cpf.length != 11 ||
            cpf == "00000000000" ||
            cpf == "11111111111" ||
            cpf == "22222222222" ||
            cpf == "33333333333" ||
            cpf == "44444444444" ||
            cpf == "55555555555" ||
            cpf == "66666666666" ||
            cpf == "77777777777" ||
            cpf == "88888888888" ||
            cpf == "99999999999")
            return false;
        // Valida 1o digito	
        add = 0;
        for (i = 0; i < 9; i++)
            add += parseInt(cpf.charAt(i)) * (10 - i);
        rev = 11 - (add % 11);
        if (rev == 10 || rev == 11)
            rev = 0;
        if (rev != parseInt(cpf.charAt(9)))
            return false;
        // Valida 2o digito	
        add = 0;
        for (i = 0; i < 10; i++)
            add += parseInt(cpf.charAt(i)) * (11 - i);
        rev = 11 - (add % 11);
        if (rev == 10 || rev == 11)
            rev = 0;
        if (rev != parseInt(cpf.charAt(10)))
            return false;
        return true;
    }

    $scope.verifyFields = function (form) {
        if (form.dados_pessoais.CNPJ && form.dados_pessoais.CNPJ.includes('/'))
            form.dados_pessoais.CNPJ_tipo = 'CNPJ'
        else if (form.dados_pessoais.CNPJ && form.dados_pessoais.CNPJ.includes('-'))
            form.dados_pessoais.CNPJ_tipo = 'CPF'
        else {
            form.dados_pessoais.CNPJ_tipo = 'INVALIDO'
        }

        // Obtem codbairro
        var idx = $scope.bairros.findIndex(bairro => bairro == $scope.form.endereco_instalacao.Bairro)
        if (idx > -1)
            $scope.form.endereco_instalacao.codbairro = $scope.aCodBairros[idx]

        if ($scope.form.dados_pessoais.CNPJ == null || $scope.form.dados_pessoais.CNPJ.length < 14 || !$scope.validarCPF($scope.form.dados_pessoais.CNPJ.onlyNumbers())) {
            bootbox.alert('O número de CPF informado é inválido!')
            return false
        } else {
            if ($scope.form.dados_pessoais.Telefone == null || $scope.form.dados_pessoais.Telefone.length < 15) {
                bootbox.alert('O número de celular informado é inválido!')
                return false
            } else {
                // Success
                return true
            }
        }
    }

    $scope.formatForm = function (form) {
        if (false) {
            form.dados_pessoais.CNPJ = form.dados_pessoais.CNPJ.replaceAll('.', '')
            form.dados_pessoais.CNPJ = form.dados_pessoais.CNPJ.replaceAll('/', '')
            form.dados_pessoais.CNPJ = form.dados_pessoais.CNPJ.replaceAll('-', '')
        }

        if (false) {
            form.dados_pessoais.telefone = form.dados_pessoais.telefone.replaceAll('(', '')
            form.dados_pessoais.telefone = form.dados_pessoais.telefone.replaceAll(')', '')
            form.dados_pessoais.telefone = form.dados_pessoais.telefone.replaceAll(' ', '')
            form.dados_pessoais.telefone = form.dados_pessoais.telefone.replaceAll('-', '')
        }

        if (false) {
            form.dados_pessoais.telefone2 = form.dados_pessoais.telefone2.replaceAll('(', '')
            form.dados_pessoais.telefone2 = form.dados_pessoais.telefone2.replaceAll(')', '')
            form.dados_pessoais.telefone2 = form.dados_pessoais.telefone2.replaceAll(' ', '')
            form.dados_pessoais.telefone2 = form.dados_pessoais.telefone2.replaceAll('-', '')
        }

        if (true) {
            form.dados_pessoais.email = form.dados_pessoais.email.replaceAll(' ', '')
        }

        if (false) {
            form.dados_cartao.Nome = form.dados_cartao.Nome.toUpperCase()
            form.dados_cartao.numero = form.dados_cartao.numero.replaceAll(' ', '')
        }
    }

    $scope.log = function () {
        // if ($scope.verifyFields($scope.form))
        //     console.log('verifyFields: true')
        // else
        //     console.log('verifyFields: false')
        // $scope.formatForm($scope.form)

        $http.post('https://api.valenet.com.br/api/Messenger/Contato', $scope.form)
            .success(function (res) {
                console.log('res', res);
                bootbox.alert('OK');
            }).error(function (error) {
                console.log('error', error);
                bootbox.alert('ERRO!')
            })

        console.log($scope.form)

    }

    $scope.removeOptions = function (selectbox) {
        var i;
        for (i = selectbox.options.length - 1; i >= 0; i--) {
            selectbox.remove(i);
        }
    }

    $scope.disabledCamposEndereco = function (value) {
        if (value) {
            document.getElementById('uf').disabled = true;
            document.getElementById('cidade').disabled = true;
            document.getElementById('bairro').disabled = true;
            document.getElementById('logradouro').disabled = true;
            document.getElementById('tipo_logradouro').disabled = true;
        } else {
            document.getElementById('uf').disabled = false;
            document.getElementById('cidade').disabled = false;
            document.getElementById('bairro').disabled = false;
            document.getElementById('logradouro').disabled = false;
            document.getElementById('tipo_logradouro').disabled = false;
        }
    }

    $scope.disabledCamposEndereco(true)
    $scope.objEndereco = null

    $scope.tipo_logradouro_all = [
        'Acesso',
        'Alameda',
        'Alameda',
        'Avenida',
        'Beco',
        'Caminho',
        'Chácara',
        'Conjunto',
        'Corredor',
        'Córrego',
        'Escada',
        'Estrada',
        'Estrada Velha',
        'Ferrovia',
        'Galeria',
        'Ladeira',
        'Lagoa',
        'Largo',
        'Passagem',
        'Passarela',
        'Pátio',
        'Ponte',
        'Praça',
        'Rodovia',
        'Rua',
        'Travessa',
        'Trevo',
        'Via',
        'Viela',
        'Vila'
    ];

    $scope.tipo_logradouro = []
    $scope.tipo_logradouro_all.forEach(tp => {
        $scope.tipo_logradouro.push(tp)
    })

    $scope.form.endereco_instalacao.tipoLogradouro = $scope.tipo_logradouro[24]; // Rua
    $scope.andares = [{ value: -1, name: 'Subsolo' }, { value: 1, name: 'Terreo ou 1º' }];

    for (var i = 2; i < 101; ++i)
        $scope.andares.push({ value: i, name: `${i}º` })

    $scope.andar = $scope.andares[1]
    $scope.form.endereco_instalacao.andar = $scope.andar.value

    $scope.bairros = [
        'SELECIONE'
    ];

    $scope.aCodBairros = []

    $scope.form.endereco_instalacao.Bairro = $scope.bairros[0];

    $scope.anoVencimento = [];
    for (var i = 0; i < 21; ++i)
        $scope.anoVencimento.push(new Date().getFullYear() + i)

    $scope.getEnderecoByCEP = function (cep) {
        if (cep && cep.length >= 9) {
            // console.log('>', cep, ' | ', cep.length)
            //var cepFormated = cep.replaceAll('-', '')
            var xmlhttp = new XMLHttpRequest();

            $http(
                {
                    url: "https://api.valenet.com.br/api/cep/" + cep,
                    method: 'GET'
                }
            ).then(function success(data) {

                $scope.objEndereco = data.data[0]

                if ($scope.objEndereco != undefined) {

                    // console.log("CEP", $scope.objEndereco);

                    $scope.disabledCamposEndereco(true)


                    document.getElementById("uf").value = $scope.objEndereco.Bairro.Cidade.sigla;
                    $scope.form.endereco_instalacao.Estado = $scope.objEndereco.Bairro.Cidade.sigla

                    // Cidade
                    if ($scope.objEndereco.Bairro.Cidade.nome && $scope.objEndereco.Bairro.Cidade.nome != "") {
                        $scope.select_cidade = document.getElementById('cidade');
                        $scope.option_cidade = document.createElement('option');

                        $scope.option_cidade.appendChild(document.createTextNode($scope.objEndereco.Bairro.Cidade.nome));
                        $scope.option_cidade.value = $scope.objEndereco.Bairro.Cidade.nome;

                        $scope.select_cidade.appendChild($scope.option_cidade);
                        $scope.select_cidade.value = $scope.objEndereco.Bairro.Cidade.nome;

                        $scope.form.endereco_instalacao.Cidade = $scope.objEndereco.Bairro.Cidade.nome;
                        $scope.select_cidade.disabled = true;
                    }

                    if (cep.split('-')[1] != '000') {

                        // Bairro
                        if ($scope.objEndereco.Bairro.nome && $scope.objEndereco.Bairro.nome != "") {
                            // Bairro
                            $scope.select_bairro = document.getElementById('bairro');

                            $scope.bairros.splice(0, $scope.bairros.length)
                            $scope.aCodBairros.splice(0, $scope.aCodBairros.length)

                            $scope.bairros.push($scope.objEndereco.Bairro.nome)
                            $scope.aCodBairros.push($scope.objEndereco.Bairro.codbairro)
                            $scope.form.endereco_instalacao.codcidade = $scope.objEndereco.Bairro.codcidade

                            //console.log('aCodBairros: ', $scope.aCodBairros)

                            $scope.form.endereco_instalacao.Bairro = $scope.bairros[0];
                            $scope.form.endereco_instalacao.codbairro = $scope.objEndereco.codbairro;
                            $scope.select_bairro.disabled = true;
                        } else {

                        }

                        // Tipo Logradouro
                        if ($scope.objEndereco.tp_logradouro && $scope.objEndereco.nome && $scope.objEndereco.tp_logradouro != "") {
                            $scope.tipo_logradouro.splice(0, $scope.tipo_logradouro.length)
                            $scope.tipo_logradouro.push($scope.objEndereco.tp_logradouro)

                            //document.getElementById("tipo_logradouro").value = $scope.objEndereco.tp_logradouro;
                            $scope.form.endereco_instalacao.tipoLogradouro = $scope.tipo_logradouro[0]
                            document.getElementById('tipo_logradouro').disabled = true;

                        } else if (!$scope.objEndereco.nome) {

                        }

                        // Logradouro
                        if ($scope.objEndereco.nome && $scope.objEndereco.nome != "") {
                            document.getElementById("logradouro").value = $scope.objEndereco.nome;
                            $scope.form.endereco_instalacao.logradouro = $scope.objEndereco.nome
                        } else if (!$scope.objEndereco.nome) {

                        }
                    } else {
                        // Bairro
                        $scope.select_bairro = document.getElementById('bairro');

                        $scope.bairros.splice(0, $scope.bairros.length)
                        $scope.aCodBairros.splice(0, $scope.aCodBairros.length)

                        $scope.objEndereco.Bairro.Cidade.BAIRROS.forEach(bairro => {
                            $scope.bairros.push(bairro.nome)
                            $scope.aCodBairros.push(bairro.codbairro)
                        })

                        $scope.form.endereco_instalacao.codcidade = $scope.objEndereco.Bairro.codcidade

                        //console.log('$scope.aCodBairros', $scope.aCodBairros)
                        //console.log('$scope.codcidade', $scope.codcidade)

                        $scope.form.endereco_instalacao.Bairro = $scope.bairros[0];
                        //$scope.select_bairro.value = $scope.bairros[0];

                        $scope.select_bairro.disabled = false;
                        //$scope.select.appendChild(option);

                        // Tipo Logradouro
                        document.getElementById('tipo_logradouro').disabled = false;

                        $scope.tipo_logradouro.splice(0, $scope.tipo_logradouro.length)
                        $scope.tipo_logradouro_all.forEach(tp => {
                            $scope.tipo_logradouro.push(tp)
                        })

                        if ($scope.objEndereco.tp_logradouro)
                            $scope.form.endereco_instalacao.tipoLogradouro = $scope.objEndereco.tp_logradouro
                        else
                            $scope.form.endereco_instalacao.tipoLogradouro = 'Rua'

                        // Logradouro
                        if ($scope.objEndereco.nome && $scope.objEndereco.nome != "") {
                            document.getElementById("logradouro").value = $scope.objEndereco.nome;
                            $scope.form.endereco_instalacao.logradouro = $scope.objEndereco.nome
                        } else {
                            document.getElementById('logradouro').value = '';
                        }
                        document.getElementById('logradouro').disabled = false;
                    }
                } else {
                    bootbox.alert('Região fora da área de cobertura.')
                }
            });
        }
    }
}]);


function popup_canais(obj) {
    console.log('teste ok!');
    var a = $(obj).data("idcanal");
    return $.ajax({
        type: "post",
        url: disparaGradeCanais.ajax_url,
        data: {
            idCanais: a,
            action: "dispara_lista_canais"
        },
        dataType: "html",
        success: function (a) {
            $(".pop-up-grade").css("display", "flex"),
                $("#gradeCanais").html(a)
        }
    });
}