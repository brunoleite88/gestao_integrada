<?php
/*
Copyright [2008] -  Sérgio Fernandes Reinert de Lima
Este arquivo é parte do programa gpweb
O gpweb é um software livre; você pode redistribuí-lo e/ou modificá-lo dentro dos termos da Licença Pública Geral GNU como publicada pela Fundação do Software Livre (FSF); na versão 2 da Licença.
Este programa é distribuído na esperança que possa ser  útil, mas SEM NENHUMA GARANTIA; sem uma garantia implícita de ADEQUAÇÃO a qualquer  MERCADO ou APLICAÇÃO EM PARTICULAR. Veja a Licença Pública Geral GNU/GPL em português para maiores detalhes.
Você deve ter recebido uma cópia da Licença Pública Geral GNU, sob o título "licença GPL 2.odt", junto com este programa, se não, acesse o Portal do Software Público Brasileiro no endereço www.softwarepublico.gov.br ou escreva para a Fundação do Software Livre(FSF) Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301, USA 
*/

/********************************************************************************************
		
gpweb\modulos\praticas\fazer_sql.php		

Rotina chamada quando se exclui uma ação, prática ou indicador																																							
																																												
********************************************************************************************/
global $config;
$base_dir=($config['dir_arquivo'] ? $config['dir_arquivo'] : BASE_DIR.'/modulos/social');

$excluir=getParam($_REQUEST, 'excluir', 0);
$social_id=getParam($_REQUEST, 'social_id', 0);
$social_acao_id=getParam($_REQUEST, 'social_acao_id', 0);
$social_familia_id=getParam($_REQUEST, 'social_familia_id', 0);
$social_comunidade_id=getParam($_REQUEST, 'social_comunidade_id', 0);
$social_comite_id=getParam($_REQUEST, 'social_comite_id', 0);
$modulo=getParam($_REQUEST, 'modulo', '');
$sql = new BDConsulta;


if ($modulo=='social' && $excluir && $social_id){
	
	$sql->setExcluir('social');
	$sql->adOnde('social_id='.$social_id);
	if (!$sql->exec()) die('Não foi possivel alterar os valores da tabela social!'.$bd->stderr(true));
	$sql->limpar();
	
	$sql->setExcluir('social_depts');
	$sql->adOnde('social_id='.$social_id);
	if (!$sql->exec()) die('Não foi possivel alterar os valores da tabela social_depts!'.$bd->stderr(true));
	$sql->limpar();
	
	$sql->setExcluir('social_log');
	$sql->adOnde('social_log_social='.$social_id);
	if (!$sql->exec()) die('Não foi possivel alterar os valores da tabela social_acao_id!'.$bd->stderr(true));
	$sql->limpar();

	$Aplic->setMsg('Programa social excluído', UI_MSG_OK);
	$Aplic->redirecionar('m=social&a=index');
	exit();
	}
	
if ($modulo=='acao' && $excluir && $social_acao_id){
	
	$sql->adTabela('social_acao_arquivo');
	$sql->adCampo('social_acao_arquivo_endereco');
	$sql->adOnde('social_acao_arquivo_acao='.$social_acao_id);
	$arquivos=$sql->Lista();
	$sql->limpar();
	foreach($arquivos as $chave => $arquivo){
		@unlink($base_dir.'/arquivos/acoes/'.$arquivo['social_acao_arquivo_endereco']);
		}

	$sql->setExcluir('social_acao_arquivo');
	$sql->adOnde('social_acao_arquivo_acao='.$social_acao_id);
	if (!$sql->exec()) die('Não foi possivel alterar os valores da tabela social_acao_arquivo!'.$bd->stderr(true));
	$sql->limpar();
	
	$sql->setExcluir('social_acao');
	$sql->adOnde('social_acao_id='.$social_acao_id);
	if (!$sql->exec()) die('Não foi possivel alterar os valores da tabela social_acao_id!'.$bd->stderr(true));
	$sql->limpar();

		$sql->setExcluir('social_acao_usuarios');
	$sql->adOnde('social_acao_id='.$social_acao_id);
	if (!$sql->exec()) die('Não foi possivel alterar os valores da tabela social_acao_id!'.$bd->stderr(true));
	$sql->limpar();

	$sql->setExcluir('social_acao_problema');
	$sql->adOnde('social_acao_problema_acao_id='.$social_acao_id);
	if (!$sql->exec()) die('Não foi possivel alterar os valores da tabela social_acao_id!'.$bd->stderr(true));
	$sql->limpar();

	$sql->setExcluir('social_acao_negacao');
	$sql->adOnde('social_acao_negacao_acao_id='.$social_acao_id);
	if (!$sql->exec()) die('Não foi possivel alterar os valores da tabela social_acao_id!'.$bd->stderr(true));
	$sql->limpar();


	$sql->setExcluir('social_acao_log');
	$sql->adOnde('social_acao_log_acao='.$social_acao_id);
	if (!$sql->exec()) die('Não foi possivel alterar os valores da tabela social_acao_id!'.$bd->stderr(true));
	$sql->limpar();


	$sql->setExcluir('social_acao_lista');
	$sql->adOnde('social_acao_lista_acao_id='.$social_acao_id);
	if (!$sql->exec()) die('Não foi possivel alterar os valores da tabela social_acao_id!'.$bd->stderr(true));
	$sql->limpar();


	$sql->setExcluir('social_acao_depts');
	$sql->adOnde('social_acao_id='.$social_acao_id);
	if (!$sql->exec()) die('Não foi possivel alterar os valores da tabela social_acao_id!'.$bd->stderr(true));
	$sql->limpar();

	$sql->setExcluir('social_acao_conceder');
	$sql->adOnde('social_acao_conceder_acao='.$social_acao_id);
	if (!$sql->exec()) die('Não foi possivel alterar os valores da tabela social_acao_id!'.$bd->stderr(true));
	$sql->limpar();
	
	$Aplic->setMsg('ação social excluída', UI_MSG_OK);
	$Aplic->redirecionar('m=social&a=acao_lista');
	exit();
	}	
	


	
if ($modulo=='comite' && $excluir && $social_comite_id){
	
	$sql->adTabela('social_comite_arquivo');
	$sql->adCampo('social_comite_arquivo_nome_real');
	$sql->adOnde('social_comite_arquivo_comite='.$social_comite_id);
	$arquivos=$sql->Lista();
	$sql->limpar();
	foreach($arquivos as $chave => $arquivo){
		@unlink($base_dir.'/arquivos/comites/'.$arquivo['social_comite_arquivo_nome_real']);
		}

	$sql->setExcluir('social_comite_arquivo');
	$sql->adOnde('social_comite_arquivo_comite='.$social_comite_id);
	if (!$sql->exec()) die('Não foi possivel alterar os valores da tabela social_comite_arquivo!'.$bd->stderr(true));
	$sql->limpar();
	
	$sql->setExcluir('social_comite');
	$sql->adOnde('social_comite_id='.$social_comite_id);
	if (!$sql->exec()) die('Não foi possivel alterar os valores da tabela social_comite_id!'.$bd->stderr(true));
	$sql->limpar();

	$sql->setExcluir('social_comite_membros');
	$sql->adOnde('social_comite_id='.$social_comite_id);
	if (!$sql->exec()) die('Não foi possivel alterar os valores da tabela social_comite_id!'.$bd->stderr(true));
	$sql->limpar();

	$sql->setExcluir('social_comite_problema');
	$sql->adOnde('social_comite_problema_comite='.$social_comite_id);
	if (!$sql->exec()) die('Não foi possivel alterar os valores da tabela social_comite_id!'.$bd->stderr(true));
	$sql->limpar();

	
	$sql->setExcluir('social_comite_log');
	$sql->adOnde('social_comite_log_comite='.$social_comite_id);
	if (!$sql->exec()) die('Não foi possivel alterar os valores da tabela social_comite_id!'.$bd->stderr(true));
	$sql->limpar();


	$sql->setExcluir('social_comite_lista');
	$sql->adOnde('social_comite_lista_comite='.$social_comite_id);
	if (!$sql->exec()) die('Não foi possivel alterar os valores da tabela social_comite_id!'.$bd->stderr(true));
	$sql->limpar();

	$Aplic->setMsg('Comitê excluído', UI_MSG_OK);
	$Aplic->redirecionar('m=social&a=comite_lista');
	exit();
	}		







if ($modulo=='comunidade' && $excluir && $social_comunidade_id){
	
	$sql->setExcluir('social_comunidade');
	$sql->adOnde('social_comunidade_id='.$social_comunidade_id);
	if (!$sql->exec()) die('Não foi possivel alterar os valores da tabela social_comunidade_id!'.$bd->stderr(true));
	$sql->limpar();

	$sql->setExcluir('social_comunidade_usuarios');
	$sql->adOnde('social_comunidade_id='.$social_comunidade_id);
	if (!$sql->exec()) die('Não foi possivel alterar os valores da tabela social_comunidade_id!'.$bd->stderr(true));
	$sql->limpar();

	$sql->setExcluir('social_comunidade_log');
	$sql->adOnde('social_comunidade_log_comunidade='.$social_comunidade_id);
	if (!$sql->exec()) die('Não foi possivel alterar os valores da tabela social_comunidade_id!'.$bd->stderr(true));
	$sql->limpar();

	$sql->setExcluir('social_comunidade_depts');
	$sql->adOnde('social_comunidade_id='.$social_comunidade_id);
	if (!$sql->exec()) die('Não foi possivel alterar os valores da tabela social_comunidade_id!'.$bd->stderr(true));
	$sql->limpar();
	
	$Aplic->setMsg('Comunidade excluída', UI_MSG_OK);
	$Aplic->redirecionar('m=social&a=comunidade_lista');
	exit();
	}	







if ($modulo=='familia' && $excluir && $social_familia_id){
	
	$sql->adTabela('social_familia_arquivo');
	$sql->adCampo('social_familia_arquivo_nome_real');
	$sql->adOnde('social_familia_arquivo_familia='.$social_familia_id);
	$arquivos=$sql->Lista();
	$sql->limpar();
	foreach($arquivos as $chave => $arquivo){
		@unlink($base_dir.'/arquivos/familias/'.$arquivo['social_familia_arquivo_nome_real']);
		}

	$sql->setExcluir('social_familia_arquivo');
	$sql->adOnde('social_familia_arquivo_familia='.$social_familia_id);
	if (!$sql->exec()) die('Não foi possivel alterar os valores da tabela social_familia_arquivo!'.$bd->stderr(true));
	$sql->limpar();
	
	$sql->setExcluir('social_familia');
	$sql->adOnde('social_familia_id='.$social_familia_id);
	if (!$sql->exec()) die('Não foi possivel alterar os valores da tabela social_familia_id!'.$bd->stderr(true));
	$sql->limpar();

	$sql->setExcluir('social_familia_problema');
	$sql->adOnde('social_familia_problema_familia='.$social_familia_id);
	if (!$sql->exec()) die('Não foi possivel alterar os valores da tabela social_familia_id!'.$bd->stderr(true));
	$sql->limpar();

	$sql->setExcluir('social_familia_acao_negada');
	$sql->adOnde('social_familia_acao_negada_familia='.$social_familia_id);
	if (!$sql->exec()) die('Não foi possivel alterar os valores da tabela social_familia_id!'.$bd->stderr(true));
	$sql->limpar();

	$sql->setExcluir('social_familia_log');
	$sql->adOnde('social_familia_log_familia='.$social_familia_id);
	if (!$sql->exec()) die('Não foi possivel alterar os valores da tabela social_familia_id!'.$bd->stderr(true));
	$sql->limpar();

	$sql->setExcluir('social_familia_lista');
	$sql->adOnde('social_familia_lista_familia='.$social_familia_id);
	if (!$sql->exec()) die('Não foi possivel alterar os valores da tabela social_familia_id!'.$bd->stderr(true));
	$sql->limpar();

	$sql->setExcluir('social_familia_producao');
	$sql->adOnde('social_familia_producao_familia='.$social_familia_id);
	if (!$sql->exec()) die('Não foi possivel alterar os valores da tabela social_familia_producao!'.$bd->stderr(true));
	$sql->limpar();

	$sql->setExcluir('social_familia_opcao');
	$sql->adOnde('social_familia_opcao_familia='.$social_familia_id);
	if (!$sql->exec()) die('Não foi possivel alterar os valores da tabela social_familia_opcao!'.$bd->stderr(true));
	$sql->limpar();
	
	$sql->setExcluir('social_familia_irrigacao');
	$sql->adOnde('social_familia_irrigacao_familia='.$social_familia_id);
	if (!$sql->exec()) die('Não foi possivel alterar os valores da tabela social_familia_irrigacao!'.$bd->stderr(true));
	$sql->limpar();
	
	$sql->setExcluir('social_familia_acao');
	$sql->adOnde('social_familia_acao_familia='.$social_familia_id);
	if (!$sql->exec()) die('Não foi possivel alterar os valores da tabela social_familia_acao!'.$bd->stderr(true));
	$sql->limpar();	
	
	$Aplic->setMsg('família excluída', UI_MSG_OK);
	$Aplic->redirecionar('m=social&a=familia_lista');
	exit();
	}		

?>

