<?php
/*
Copyright [2008] -  Sérgio Fernandes Reinert de Lima
Este arquivo é parte do programa gpweb
O gpweb é um software livre; você pode redistribuí-lo e/ou modificá-lo dentro dos termos da Licença Pública Geral GNU como publicada pela Fundação do Software Livre (FSF); na versão 2 da Licença.
Este programa é distribuído na esperança que possa ser  útil, mas SEM NENHUMA GARANTIA; sem uma garantia implícita de ADEQUAÇÃO a qualquer  MERCADO ou APLICAÇÃO EM PARTICULAR. Veja a Licença Pública Geral GNU/GPL em português para maiores detalhes.
Você deve ter recebido uma cópia da Licença Pública Geral GNU, sob o título "licença GPL 2.odt", junto com este programa, se não, acesse o Portal do Software Público Brasileiro no endereço www.softwarepublico.gov.br ou escreva para a Fundação do Software Livre(FSF) Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301, USA 
*/

/********************************************************************************************
		
gpweb\modulos\social\fazer_sql.php		

Rotina chamada quando se exclui uma ação, prática ou indicador																																							
																																												
********************************************************************************************/
include_once BASE_DIR.'/modulos/social/familia.class.php';
$sql = new BDConsulta;

$_REQUEST['social_familia_esgoto']=(isset($_REQUEST['social_familia_esgoto']) ? 1 : 0);
$_REQUEST['social_familia_eletrificacao']=(isset($_REQUEST['social_familia_eletrificacao']) ? 1 : 0);
$_REQUEST['social_familia_sanitario']=(isset($_REQUEST['social_familia_sanitario']) ? 1 : 0);
$_REQUEST['social_familia_irrigacao']=(isset($_REQUEST['social_familia_irrigacao']) ? 1 : 0);
$_REQUEST['social_familia_ativo']=(isset($_REQUEST['social_familia_ativo']) ? 1 : 0);
$_REQUEST['social_familia_chefe']=(isset($_REQUEST['social_familia_chefe']) ? 1 : 0);
$_REQUEST['social_familia_bolsa']=(isset($_REQUEST['social_familia_bolsa']) ? 1 : 0);
$_REQUEST['social_familia_necessita_bolsa']=(isset($_REQUEST['social_familia_necessita_bolsa']) ? 1 : 0);

if (isset($_REQUEST['social_familia_distancia'])) $_REQUEST['social_familia_distancia']=float_americano(getParam($_REQUEST, 'social_familia_distancia', null));
if (isset($_REQUEST['social_familia_comprimento'])) $_REQUEST['social_familia_comprimento']=float_americano(getParam($_REQUEST, 'social_familia_comprimento', null));
if (isset($_REQUEST['social_familia_largura'])) $_REQUEST['social_familia_largura']=float_americano(getParam($_REQUEST, 'social_familia_largura', null));
if (isset($_REQUEST['social_familia_distancia_agua'])) $_REQUEST['social_familia_distancia_agua']=float_americano(getParam($_REQUEST, 'social_familia_distancia_agua', null));
if (isset($_REQUEST['social_familia_area_propriedade'])) $_REQUEST['social_familia_area_propriedade']=float_americano(getParam($_REQUEST, 'social_familia_area_propriedade', null));
if (isset($_REQUEST['social_familia_area_producao'])) $_REQUEST['social_familia_area_producao']=float_americano(getParam($_REQUEST, 'social_familia_area_producao', null));
if (isset($_REQUEST['social_familia_renda_capita'])) $_REQUEST['social_familia_renda_capita']=float_americano(getParam($_REQUEST, 'social_familia_renda_capita', null));
if (isset($_REQUEST['social_familia_renda_valor'])) $_REQUEST['social_familia_renda_valor']=float_americano(getParam($_REQUEST, 'social_familia_renda_valor', null));

if(isset($_REQUEST['social_familia_nascimento']) && $_REQUEST['social_familia_nascimento']){
		$dia=substr(getParam($_REQUEST, 'social_familia_nascimento', null), 0,2);
		$mes=substr(getParam($_REQUEST, 'social_familia_nascimento', null), 3,2);
		$ano=substr(getParam($_REQUEST, 'social_familia_nascimento', null), 6,4);
		$_REQUEST['social_familia_nascimento']=$ano.'-'.$mes.'-'.$dia;
		}

$del = intval(getParam($_REQUEST, 'del', 0));
$social_familia_id = getParam($_REQUEST, 'social_familia_id', 0);

$obj = new CFamilia();
if ($social_familia_id) $obj->_mensagem = 'atualizado';
else $obj->_mensagem = 'adicionado';

if (!$obj->join($_REQUEST)) {
	$Aplic->setMsg($obj->getErro(), UI_MSG_ERRO);
	$Aplic->redirecionar('m=social&a=index');
	}
$Aplic->setMsg(ucfirst($config['beneficiario']));
if ($del) {
	$obj->load($social_familia_id);
	if (($msg = $obj->excluir())) {
		$Aplic->setMsg($msg, UI_MSG_ERRO);
		$Aplic->redirecionar('m=social&a=familia_ver&social_familia_id='.$social_familia_id);
		} 
	else {
		$Aplic->setMsg('excluída', UI_MSG_ALERTA, true);
		$Aplic->redirecionar('m=social&a=familia_lista');
		}
	}

if (($msg = $obj->armazenar())) $Aplic->setMsg($msg, UI_MSG_ERRO);
else {
	$obj->notificar($_REQUEST);
	$Aplic->setMsg($social_familia_id ? 'atualizado' : 'adicionado', UI_MSG_OK, true);
	}
$Aplic->redirecionar('m=social&a=familia_ver&social_familia_id='.$obj->social_familia_id);

?>

