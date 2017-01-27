$( document ).ready(function() {
	var nameClient 	= $("#nameClient").val();
	var restaurant 	= $("#restaurant-list").val();
	var local		= $("#local-list").val();
	$( "li" ).each(function( index ) {
	  console.log( index + ": " + $( this ).text() );
	});


   $('#enviar').on('submit',function(){
   		a = {
					"products":1,
					"headquarter":2,
					"client_id":1,
					"deliveryAmount":5,
					"orderAmount":25,
					"totalAmount":30,
					"address":"tupac",
					"references":"mercado",
					"rider":1,
					"orderComment":"all",
					"district":"delicias"
		};
		$.ajax({
			url:'http://localhost/order',
			type:'POST',
			data:a,
			succes:function(data){
				console.log(data)
			},err:function(status,http){
				console.log('status: '+status+' http'+http)
			}
		});
   })

    $(".pedido-box").on('click',function(){
    	$('#pro')
          .modal({
            blurring: true,
            closable : true
          })
          .modal('show')
        ; });

    $("#delivery").keyup(function(){
    	var delivery = parseFloat($('#delivery').val());
    	var total = parseFloat($('#total').val());
    	if (delivery=="" || isNaN(delivery)) {
    		delivery=0;
    	}
    	$('#mcobrar').val(delivery+total);
    });
});