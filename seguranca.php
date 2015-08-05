<?php

require 'fcnsdb.php';
//  Configurações do Script
// ==============================
$_SG['abreSessao'] = true;         // Inicia a sessão com um session_start()?
$_SG['caseSensitive'] = false;     // Usar case-sensitive? Onde 'thiago' é diferente de 'THIAGO'
$_SG['validaSempre'] = true;       // Deseja validar o usuário e a senha a cada carregamento de página?
// Evita que, ao mudar os dados do usuário no banco de dado o mesmo contiue logado.
$_SG['paginaLogin'] = 'login.php'; // Página de login
$_SG['tabela'] = 'user';       // Nome da tabela onde os usuários são salvos
// ==============================

// Verifica se precisa iniciar a sessão
if ($_SG['abreSessao'] == true)
	session_start();
/**
* Função que valida um usuário e senha
*
* @param string $usuario - O usuário a ser validado
* @param string $senha - A senha a ser validada
*
* @return bool - Se o usuário foi validado ou não (true/false)
*/
function validaUsuario($login, $senha) {
	global $_SG;
	$cS = ($_SG['caseSensitive']) ? 'BINARY' : '';
	// Usa a função addslashes para escapar as aspas
	$nlogin = addslashes($login);
	$nsenha = addslashes($senha);
	// Monta uma consulta SQL (query) para procurar um usuário
	$sql = "SELECT `user_id`, `username`, `root` FROM `".$_SG['tabela']."` WHERE ".$cS." `login` = '".$nlogin."' AND ".$cS." `password` = '".$nsenha."' LIMIT 1";
	$resultado = mysqli_fetch_assoc(query($sql));
	// Verifica se encontrou algum registro
	if (empty($resultado)) {
		// Nenhum registro foi encontrado => o usuário é inválido
		return false;
	} else {
		// Definimos dois valores na sessão com os dados do usuário
		$_SESSION['usuarioID'] = $resultado['user_id']; // Pega o valor da coluna 'id do registro encontrado no MySQL
		$_SESSION['usuarioNome'] = $resultado['username']; // Pega o valor da coluna 'nome' do registro encontrado no MySQL
		$_SESSION['usuarioRoot'] = $resultado['root'];
		// Verifica a opção se sempre validar o login
		if ($_SG['validaSempre'] == true) {
			// Definimos dois valores na sessão com os dados do login
			$_SESSION['usuarioLogin'] = $login;
			$_SESSION['usuarioSenha'] = $senha;
		}
		return true;
	}
}
/**
* Função que protege uma página
*/
function protegePagina() {
	global $_SG;
	if (!isset($_SESSION['usuarioID']) OR !isset($_SESSION['usuarioNome'])) {
		// Não há usuário logado, manda pra página de login
		expulsaVisitante();
	} else if (isset($_SESSION['usuarioID']) OR isset($_SESSION['usuarioNome'])) {
		// Há usuário logado, verifica se precisa validar o login novamente
		if ($_SG['validaSempre'] == true) {
			// Verifica se os dados salvos na sessão batem com os dados do banco de dados
			if (!validaUsuario($_SESSION['usuarioLogin'], $_SESSION['usuarioSenha'])) {
				// Os dados não batem, manda pra tela de login
				expulsaVisitante();
			}
		}
	}
}
/**
* Função pra proteger a página de Usuários Padrões
*/
function protegeRoot() {
	if ($_SESSION['usuarioRoot'] == 'N'){
		expulsaVisitante();
	}
}
/**
* Função pra validar Usuários Administradores
*/
function validaRoot() {
	if ($_SESSION['usuarioRoot'] == 'Y'){
		return true;
	}
	return false;
}
/**
* Função para expulsar um visitante
*/
function expulsaVisitante() {
	global $_SG;
	// Remove as variáveis da sessão (caso elas existam)
	unset($_SESSION['usuarioID'], $_SESSION['usuarioNome'], $_SESSION['usuarioLogin'], $_SESSION['usuarioSenha'], $_SESSION['root']);
	// Manda pra tela de login
	header("Location: ".$_SG['paginaLogin']);
}
?>