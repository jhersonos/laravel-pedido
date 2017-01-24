var app = angular.module("pedidoApp", []);
app.controller("pedidoCtrl", function($scope,$http) {

	$scope.restaurantes=[];
	$scope.locales=[];
	$scope.productos=[];
	$scope.listap=[];
	
	$scope.getRestaurantes = {
		company:function(){
			var url = "http://localhost/laravel/public/restaurant";
			$http({
			  method: 'GET',
			  url: url
			}).then(function successCallback(response) {
			    // console.log(response.data)
			    $scope.restaurantes = response.data;
			    $("#restaurant-list").removeAttr('disabled')
			  }, function errorCallback(response) {
			    $("#restaurant-list").attr('disabled')
			  });
		},local:function(){//get list of locales
				$scope.locales=[];
				var d = $scope.selectedItem
				var c = $('#restaurant-list').val();
				var url = "http://localhost/laravel/public/headquarter?restaurant="+c;
				$http({
				  method: 'GET',
				  url: url
				}).then(function successCallback(response) {
					// console.log(response)			    
				    $scope.locales = response.data;
				    $('#local-list').removeAttr('disabled')
				    $scope.direction = $scope.locales;
				  }, function errorCallback(response) {
				    $('#local-list').attr('disabled')
				  });
		},producto:function(){//get list of products
				$("#sav").attr("disabled",false);
				// var companylist = $('#restaurant-list').val();
				var locallist = $('#local-list').val();
				if(locallist!="") {
					var url = "http://localhost/laravel/public/product?headquarter="+locallist;
					$http({
					  method: 'GET',
					  url: url
					}).then(function successCallback(response) {				    					    
					    $scope.productos=response.data;
					    $scope.listap=$scope.productos;
					    $('.pedido-box').attr('id','on')//active modal
					    $('.pedido-box .center-box').attr('id','')//disabled modal
					    // console.log($scope.productos)
					  }, function errorCallback(response) {
					    console.log(response)
					    $('.pedido-box').attr('id','off')//disable modal
					    $('.pedido-box .center-box').attr('id','label-off')//disable label of box					    
					  });
				}else{

				}
		},addProduct:function(){
			var total = 0;			
			$("input:checked").each(function(i, elem){
              var item = "#item"+this.id;//id for items list
              $(item).removeClass('item none');//delete none
              $(item).addClass('item show');//add show
              var element = "#prex"+this.id;//price id for bucle
              $(element).removeClass('pnone')
			  $(element).addClass('pshow')
			  var p = "#p"+this.id;
			  var getp = parseFloat($(p).val());
			  total = parseFloat(total)+getp;          
          	});
			$('#total').val(total)
			$("#monto-cobrar").val(total);
		}
	}
	$scope.getRestaurantes.company();
});