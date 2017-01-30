$( document ).ready(function() {
	var nameClient 	= $("#nameClient").val();
	var restaurant 	= $("#restaurant-list").val();
	var local		= $("#local-list").val();
	$( "li" ).each(function( index ) {
	  console.log( index + ": " + $( this ).text() );
	});

   $('#enviar').on('click',function(){
   		var arr = [];
   		var headquarter = $('#local-list').val(),
   			client 		= $("#nameClient").val(),
   			delivery 	= $("#delivery").val(),
   			oAmount 	= $("#total").val(),
   			total 		= $("#mcobrar").val(),
   			address 	= $("#destino").val(),
   			reference 	= $("#referencia").val(),
   			comment 	= $("#comentarios").val();
   			district 	= $("#distrito").val(); 	
   			// rider		= $("#rider").val
	   	$("#list-product div.item:not(.lnone) .content .header input[type=hidden]").each(function(i, elem){
	   		arr.push(this.value);
	   	});

		$.ajax({
			url:'/order',
			type:'POST',
			data:{
					"products":arr,
					"headquarter":headquarter,
					"client_id":client,
					"deliveryAmount":delivery,
					"orderAmount":oAmount,
					"totalAmount":total,
					"address":address,
					"references":reference,
					"rider":1,
					"orderComment":comment,
					"district":district
				}
		}).done(function() {
		    alert( "Pedido éxitoso" );
		    $("#pedido")[0].reset();

		  }).fail(function() {
		    alert( "error" );
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