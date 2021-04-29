var module = angular.module("app", ['ngBootbox']);
module.run(["$locale", function ($locale) {
    $locale.NUMBER_FORMATS.GROUP_SEP = " ";
    $locale.NUMBER_FORMATS.DECIMAL_SEP = ",";
}]);
module.controller("MontarController", ['$scope', '$http', '$q', function ($scope, $http, $q) {
    $scope.pricelist = null;
    $scope.selected_products = [];
    $scope.tipos_produtos = ['internet','phone','tva','acessorios'];
    $scope.loadPricelist = ()=>{
        $http.get(apiUrl)
        .then(ret=>{
            //console.log(ret);
            $scope.pricelist = ret.data;
            console.log($scope.pricelist);
            if (produto_selecionado != ''){
                
                var j = $scope.pricelist.broadband.map(item=>{item.type='internet';return item}).concat($scope.pricelist.phone.map(item=>{item.type='phone';return item})).concat($scope.pricelist.tv.map(item=>{item.type='tv';return item})).filter((item)=>{return item.id==produto_selecionado});
                if (j.length)
                    $scope.select_product('internet', j[0]);
            }
        })
    }

    $scope.select_product = (type, product) =>{
        //$scope.selected_products = $scope.selected_products.concat([type=>product]);
        $scope.selected_products[type] = product;
        console.log($scope.selected_products);
        console.log($scope.tipos_produtos.indexOf(type))
        var next_type = $scope.tipos_produtos[$scope.tipos_produtos.indexOf(type)+1] || type;
        if (next_type!=null) $('a[data-target="#collapse_'+next_type+'"]').click();
        //else 

    }

    $scope.show_price = (type)=>{
        var item = $scope.selected_products[type];
        // console.log('Show price: ',type);
        // console.log('Show price: ',item);
        // console.log('Show price: ',Object.keys($scope.selected_products).length);
        if (item == null) return 0;
        //return '100000';
        console.log('Produtos Selecionados: ', $scope.selected_products)
        var tipoCombo = Object.keys($scope.selected_products).filter(i=>(!i.startsWith('acessorios'))).length;
        switch(tipoCombo){
            case 3:return item.price_triple || item.price_combo
            case 2:return item.price_combo
            case 1:return item.price_single

        }
       
        return 0;


    }

    $scope.get_tipos_produtos = ()=>{
        return Object.keys($scope.selected_products);
    }

    $scope.removeItem = (type)=>{
        delete $scope.selected_products[type];
        //$scope.selected_products=$scope.selected_products.filter((idx,item)=>{return ($scope.selected_products[idx]!=null)})
    }

    $scope.show_price_install = (type)=>{
        var item = $scope.selected_products[type];
        // console.log('Show price install: ',type);
        // console.log('Show price install: ',item);
        // console.log('Show price install: ',Object.keys($scope.selected_products).length);
        if (item == null) return 0;
        //return '100000';
        var tipoCombo = Object.keys($scope.selected_products).filter(i=>(!i.startsWith('acessorios'))).length;
        switch(tipoCombo){
            case 3:return item.price_install_triple || item.price_install_combo;
            case 2:return item.price_install_combo;
            case 1:return item.price_install_single;
        }
        //return $scope.selected_products;
        return 0;


    }
    $scope.total_price = ()=> {
        var valorTotal = 0;
        Object.keys($scope.selected_products).forEach(item=>{valorTotal += $scope.show_price(item)});
        return valorTotal;
        //return $scope.show_price('internet')+$scope.show_price('phone')+$scope.show_price('tva');
    }

    $scope.total_price_install = ()=> {
        var valorTotal = 0;
        Object.keys($scope.selected_products).forEach(item=>{valorTotal += $scope.show_price_install(item)});
        return valorTotal;
        //return $scope.show_price_install('internet')+$scope.show_price_install('phone')+$scope.show_price_install('tva');
    }

    $scope.send = ()=>{
        console.log('Send acionado');
        var url = '';
        for (item in $scope.selected_products){
            console.log(item);
            url += 'produtoId[]='+$scope.selected_products[item].priceListId+'&';
        }
        //$scope.selected_products.map((counter, item)=>{
            
    
        console.log('send', url);
        document.location = '/confirmacao-pedido?'+url;
    }
    $scope.loadPricelist();

    

}]);