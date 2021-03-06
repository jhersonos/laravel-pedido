var app = angular.module("pedidoApp", []);
app.controller("pedidoCtrl", function($scope,$http) {

	$scope.restaurantes=[];
	$scope.locales=[];
	$scope.productos=[];
	$scope.listap=[];
	$scope.getRestaurantes = {
		company:function(){
			// $('#pedido')[0].reset();
			var url = "/restaurant";
			$http({
			  method: 'GET',
			  url: url
			}).then(function successCallback(response) {
			    // console.log(response.data)
			    // $('#')
			    $scope.restaurantes = response.data;
			    $("#restaurant-list").removeAttr('disabled')
			  }, function errorCallback(response) {
			    $("#restaurant-list").attr('disabled')
			  });
		},local:function(){//get list of locales
				$scope.locales=[];
				var d = $scope.selectedItem
				var c = parseInt($('#restaurant-list').val());
				var url = "/headquarter?restaurant="+c;
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
				var locallist = parseInt($('#local-list').val());
				if (!isNaN(locallist)) {
					var url = "/product?headquarter="+locallist;
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
					$("#list-product .item").removeClass('show');
					$("#list-product .item").addClass('none');
			$("input:checked").each(function(i, elem){
					var idp = $("#id"+this.id).val();	//get id product to database
					$("#pid"+this.id).val(idp);			//send id product to list
	              var item = "#item"+this.id;		//id for items list
	              $(item).addClass('show');
	              $(item).removeClass('none');				//add class 
	              // $(item).removeClass('lnone');		//delete none
	              var element = "#prex"+this.id;	//price id for bucle
	              $(element).removeClass('pnone');
					  $(element).addClass('pshow');
					  var p = "#p"+this.id;
					  var getp = parseFloat($(p).val());
					  total = parseFloat(total)+getp;          
          	});
			$('#total').val(total)
			$("#monto-cobrar").val(total);
			$('#pro').modal('hide'); 

		},remove:function(index){
			var nitem = index.target.id;//index.$index -> value of id
			console.log(nitem);
			var check = "#"+nitem;
			var element = "#prex"+nitem;
			//remove item #
			var item = "#item"+nitem;
			$(item).removeClass('item show');
			$(item).addClass('item none');
			$(element).removeClass('pshow')
			$(element).addClass('pnone')
			$(check).prop('checked', false);
			//bucle for new result price
			var a = 0;
			total = 0;
			$("#list-product .show .content .header .pc input[type=hidden]").each(function(){
				var actual = parseFloat($(this).val())
				total = total + actual;
			})
			// var del = $("#delivery").val();
			// var net = parseFloat(del) + total;
			// $("#monto-cobrar").val(net);
			$('#total').val(total)
		}
	}
	$scope.getRestaurantes.company();
});