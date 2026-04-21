<?php
/*
Copyright [2008] -  Sérgio Fernandes Reinert de Lima
Este arquivo é parte do programa gpweb
O gpweb é um software livre; você pode redistribuí-lo e/ou modificá-lo dentro dos termos da Licença Pública Geral GNU como publicada pela Fundação do Software Livre (FSF); na versão 2 da Licença.
Este programa é distribuído na esperança que possa ser  útil, mas SEM NENHUMA GARANTIA; sem uma garantia implícita de ADEQUAÇÃO a qualquer  MERCADO ou APLICAÇÃO EM PARTICULAR. Veja a Licença Pública Geral GNU/GPL em português para maiores detalhes.
Você deve ter recebido uma cópia da Licença Pública Geral GNU, sob o título "licença GPL 2.odt", junto com este programa, se não, acesse o Portal do Software Público Brasileiro no endereço www.softwarepublico.gov.br ou escreva para a Fundação do Software Livre(FSF) Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301, USA 
*/


require_once (BASE_DIR.'/modulos/praticas/perspectiva.class.php');

$sql = new BDConsulta;

$_REQUEST['pg_perspectiva_ativo']=(isset($_REQUEST['pg_perspectiva_ativo']) ? 1 : 0);

if (isset($_REQUEST['pg_perspectiva_percentagem'])) $_REQUEST['pg_perspectiva_percentagem']=float_americano($_REQUEST['pg_perspectiva_percentagem']);
if (isset($_REQUEST['pg_perspectiva_ponto_alvo'])) $_REQUEST['pg_perspectiva_ponto_alvo']=float_americano($_REQUEST['pg_perspectiva_ponto_alvo']);


$pg_perspectiva_id = getParam($_REQUEST, 'pg_perspectiva_id', null);

$percentagem = getParam($_REQUEST, 'percentagem', null);

if ($Aplic->profissional && !getParam($_REQUEST, 'pg_perspectiva_tipo_pontuacao', '')) $_REQUEST['pg_perspectiva_percentagem']=$percentagem;
$del = intval(getParam($_REQUEST, 'del', 0));
$pg_perspectiva_id = getParam($_REQUEST, 'pg_perspectiva_id', null);

$obj = new CPerspectiva();
if ($pg_perspectiva_id) $obj->_mensagem = 'atualizada';
else $obj->_mensagem = 'adicionada';

if (!$obj->join($_REQUEST)) {
	$Aplic->setMsg($obj->getErro(), UI_MSG_ERRO);
	$Aplic->redirecionar('m=praticas&a=perspectiva_lista');
	}
$Aplic->setMsg(ucfirst($config['perspectiva']));
if ($del) {
	$obj->load($pg_perspectiva_id);
	if (($msg = $obj->excluir())) {
		$Aplic->setMsg($msg, UI_MSG_ERRO);
		$Aplic->redirecionar('m=praticas&a=perspectiva_ver&pg_perspectiva_id='.$pg_perspectiva_id);
		} 
	else {
		$Aplic->setMsg('excluíd'.$config['genero_perspectiva'], UI_MSG_ALERTA, true);
		$Aplic->redirecionar('m=praticas&a=perspectiva_lista');
		}
	}

if (($msg = $obj->armazenar())) $Aplic->setMsg($msg, UI_MSG_ERRO);
else {
	$obj->notificar($_REQUEST);
	$Aplic->setMsg($pg_perspectiva_id ? 'atualizad'.$config['genero_perspectiva'] : 'adicionad'.$config['genero_perspectiva'], UI_MSG_OK, true);
	}
	
if ($Aplic->profissional){	
	$pontuacao=$obj->calculo_percentagem();
	}	
	
	
$Aplic->redirecionar('m=praticas&a=perspectiva_ver&pg_perspectiva_id='.$obj->pg_perspectiva_id);

?>

