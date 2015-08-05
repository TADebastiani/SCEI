function excluiTupla(pk){
	$.ajax({
		type:'POST',
		url:'getUser.php',
		data:'userid='+pk,
		success: function(data) {
			confirma(confirm("Você deseja excluir o usuário "+data+"?"));
		}
	});

	function confirma(conf){
		if (conf){
			$.ajax({
				type:'POST',
				url:'gerenciaUserV.php',
				data:'excluir='+pk,
				success: function(data){ 
					if(data){
						$('#tabela').html(data);
					} else {
						console.log(data);
					}
				}
			});
		}
	}	
}

function alteraTupla(pk){
	window.location = './alteraUser.php?userid='+pk;
}