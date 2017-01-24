$( document ).ready(function() {
   $('#send').on('click',function(){
   		a = {
			products:[1,4,4,9],
			headquarter:2,
			client_id:1,
			deliveryAmount:5,
			orderAmount:25,
			totalAmount:4,
			address:"tupac",
			references:"mercado",
			rider:'2',
			orderComment:"all",
			district:"delicias"
		};
		$.ajax({
			url:'',
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
});