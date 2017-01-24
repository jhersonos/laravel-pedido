<!DOCTYPE html>
<html>
<head>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
  <script type="text/javascript" src="/laravel/public/css/semantic/semantic.min.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular.min.js"></script>
  <script type="text/javascript" src="/laravel/public/js/controller.js"></script>
	<script type="text/javascript" src="/laravel/resources/assets/js/index.js"></script>
	<script src='//maps.googleapis.com/maps/api/js?key=AIzaSyB7yLRsbqezx-dLDB4kWQaiBGEH8YlRH8I'></script>
	<title>Pedidos</title>
	<link rel="stylesheet" type="text/css" href="/laravel/public/css/semantic/semantic.min.css">
	<link rel="stylesheet" type="text/css" href="/laravel/public/css/main.css">
</head>
<body ng-app="pedidoApp" ng-controller="pedidoCtrl">
<div class="carta">
	<form id="pedido" class="ui form">
		<div class="two fields">
			<div class="field">
				Restaurante: 
				<select id="restaurant-list" ng-click="defaultlocal()" ng-model="itemSelect" ng-change="getRestaurantes.local()">
					<option value="">-- Seleccione restaruante --</option>
					<option ng-repeat="rest in restaurantes" value="{{ rest.id }}" >{{	rest.name }}</option>
				</select>
			</div>
			<div class="field">
				Local: 
				<select id="local-list" ng-model="localselect" ng-change="getRestaurantes.producto()">
					<option value="">-- Seleccione local --</option>
					<option ng-repeat="local in locales" value="{{ local.id }}">{{ local.address }}</option>
				</select>
			</div>
		</div>
		<h4 class="ui dividing header">Pedido</h4>
		<div class="two fields">
			<div class="field">
				<div class="fields">
					<div class="five wide field">
						<div class="pedido-box">
							<div class="center-box">
								<div class="item-center icon">
									<i class="huge add circle icon"></i>
								</div>
								<div class="item-center ">
									<label>producto</label>
								</div>	
							</div>
						</div>
					</div>
					<div class="eleven wide field">
						<textarea id="comentarios" placeholder="Comentarios extras sobre el pedido"></textarea>
					</div>
				</div>
			</div>
			<div class="field">
				<div class="ui celled ordered list" id="list-product">
					<div ng-repeat="lista in listap" class="item padd">
						<div class="content">
							<div class="header lstyle">
								{{	lista.name }}
							</div>
							<div class="rf">
								<strong class="close">X</strong>
							</div>
							<span class="rf">
								{{	lista.price }}	
							</span>
						</div>
					</div>
				</div>
				<label>Total</label>
				<input type="text" id="total"></input>
			</div>
		</div>
		<div class="two fields">
			<div class="field">
				<label>Destino</label>
				<input type="text"></input>
			</div>
			<div class="field">
				<label>referencia</label>
				<input type="text"></input>
			</div>
		</div>
		<div class="two fields">
			<div class='field'>
				<div id='map'></div>
			</div>
			<div class="field">
				<label>Metodo de pago:</label>
				<select id="tipo-pago">
					<option>-- Seleccione metodo de pago --</option>
					<option value="efectivo">Efectivo</option>
					<option value="visa">Visa</option>
				</select>
				<label>Monto a cobrar</label>
				<input type="text"></input>
				<button class="ui button btn-submit" ng-click="getRestaurantes.addProduct()">Realizar Pedido</button>
			</div>
		</div>
	</form>
</div>
<!-- Pop up con los productos -->
<div class="ui modal" id="pro">
  <i class="close icon"></i>
  <div class="header">
    Productos
  </div>
  <div class="image content">
    <div class="description">
       <div class="ui list">
       		<div class="item">
				<table class="ui compact celled definition table">
				<thead>
					<tr>
						<th>-</th><th>producto</th><th>precio</th>
					</tr>
				</thead>
				 	<tbody>
						<tr ng-repeat="carta in productos">
							<td><input type="checkbox" name="example" id="{{$index}}"/></td>
							<td>
								<label>{{ carta.name }}</label>
								<input type="hidden" id="n{{$index}}" value="{{ carta.name }}"></input>
							</td>
							<td>
								<label>{{ carta.price}}</label>
								<input type="hidden" id="p{{$index}}" value="{{ carta.price }}"></input>
							</td>
						</tr>
					</tbody>	
				</table>
       		</div>
       </div>
    </div>
  </div>
  <div class="actions">
    <div class="ui button">Cancelar pedido</div>
    <div class="ui button" >Agregar a la Cola</div>
  </div>
</div>
</body>
</html>