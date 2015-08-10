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
				url:'gerenciar-usuario-v.php',
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
	window.location = './editar-usuario.php?userid='+pk;
}