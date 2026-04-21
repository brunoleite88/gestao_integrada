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
require_once (BASE_DIR.'/modulos/praticas/praticas.class.php');

$sql = new BDConsulta;


$del = intval(getParam($_REQUEST, 'del', 0));
$pratica_indicador_id = getParam($_REQUEST, 'pratica_indicador_id', null);
$pratica_indicador_log_id = getParam($_REQUEST, 'pratica_indicador_log_id', null);



$obj = new CIndicadorLog();
if ($pratica_indicador_log_id) $obj->_mensagem = 'atualizada';
else $obj->_mensagem = 'adicionada';

if (!$obj->join($_REQUEST)) {
	$Aplic->setMsg($obj->getErro(), UI_MSG_ERRO);
	$Aplic->redirecionar('m=praticas&a=indicador_ver&tab=0&pratica_indicador_id='.$pratica_indicador_id);
	}
$Aplic->setMsg('Ocorrência');
if ($del) {
	$obj->load($pratica_indicador_log_id);
	if (($msg = $obj->excluir())) {
		$Aplic->setMsg($msg, UI_MSG_ERRO);
		$Aplic->redirecionar('m=praticas&a=indicador_ver&tab=0&pratica_indicador_id='.$pratica_indicador_id);
		} 
	else {
		$Aplic->setMsg('excluída', UI_MSG_ALERTA, true);
		$Aplic->redirecionar('m=praticas&a=indicador_ver&tab=0&pratica_indicador_id='.$pratica_indicador_id);
		}
	}

if (($msg = $obj->armazenar())) $Aplic->setMsg($msg, UI_MSG_ERRO);
else {
	
	$obj->notificar($_REQUEST);
	
	$Aplic->setMsg($pratica_indicador_log_id ? 'atualizada' : 'adicionada', UI_MSG_OK, true);
	}
$Aplic->redirecionar('m=praticas&a=indicador_ver&tab=0&pratica_indicador_id='.$pratica_indicador_id);

?>

