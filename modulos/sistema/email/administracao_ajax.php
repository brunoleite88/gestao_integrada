<?php
/*
Copyright [2008] -  Sérgio Fernandes Reinert de Lima
Este arquivo é parte do programa gpweb
O gpweb é um software livre; você pode redistribuí-lo e/ou modificá-lo dentro dos termos da Licença Pública Geral GNU como publicada pela Fundação do Software Livre (FSF); na versão 2 da Licença.
Este programa é distribuído na esperança que possa ser  útil, mas SEM NENHUMA GARANTIA; sem uma garantia implícita de ADEQUAÇÃO a qualquer  MERCADO ou APLICAÇÃO EM PARTICULAR. Veja a Licença Pública Geral GNU/GPL em português para maiores detalhes.
Você deve ter recebido uma cópia da Licença Pública Geral GNU, sob o título "licença GPL 2.odt", junto com este programa, se não, acesse o Portal do Software Público Brasileiro no endereço www.softwarepublico.gov.br ou escreva para a Fundação do Software Livre(FSF) Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301, USA 
*/

include_once $Aplic->getClasseBiblioteca('xajax/xajax_core/xajax.inc');
$xajax = new xajax();

function selecionar_om_ajax($cia_id=1, $campo, $posicao, $script,  $vazio='', $acesso=0, $externo=0 ){
	$saida=selecionar_om_para_ajax($cia_id, $campo, $script,  $vazio, $acesso, $externo);
	$objResposta = new xajaxResponse();
	$objResposta->assign($posicao,"innerHTML", $saida);
	return $objResposta;
	}
	
function mudar_usuario_ajax($cia_id=0){
	global $Aplic;
	if (!$cia_id) $cia_id=$Aplic->usuario_cia;
	$saida=mudar_usuario_em_dept(true, $cia_id, 0, 'ListaDE','nome', 'class="texto" size=10 style="width:350px; height:144px;" multiple ondblClick="javascript:Mover();"');
	$saida2=mudar_usuario_em_dept(true, $cia_id, 0, 'ListaDE2','nome2', 'class="texto" size=10 style="width:350px; height:144px;" multiple ondblClick="javascript:Mover3();"');
	$objResposta = new xajaxResponse();
	$objResposta->assign("combo_usuario","innerHTML", $saida);
	$objResposta->assign("combo_usuario2","innerHTML", $saida2);
	return $objResposta;
	}	
$xajax->registerFunction("mudar_usuario_ajax");			
$xajax->registerFunction("selecionar_om_ajax");
$xajax->processRequest();

?>

