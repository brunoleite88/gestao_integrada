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
//$xajax->setFlag('debug',true);
//$xajax->setFlag('outputEntities',true);

function selecionar_om_ajax($cia_id=1, $campo, $posicao, $script, $acesso=0){
	$saida=selecionar_om_para_ajax($cia_id, $campo, $script, $acesso);
	$objResposta = new xajaxResponse();
	$objResposta->assign($posicao,"innerHTML", $saida);
	return $objResposta;
	}
$xajax->registerFunction("selecionar_om_ajax");		
	

function mudar_indicadores_ajax($cia_id=0, $pratica_indicador_id=0, $vetor=array(), $esqUnir=null, $esqOnde=null){
	global $Aplic;
	$indicadores=vetor_com_pai_generico('pratica_indicador', 'pratica_indicador_id', 'pratica_indicador_nome', 'pratica_indicador_superior', $pratica_indicador_id, $cia_id, 'pratica_indicador_cia', TRUE, TRUE, 'pratica_indicador_acesso', 'indicador', '', false, $vetor, $esqUnir, $esqOnde);
	$saida=selecionaVetor($indicadores, 'lista', 'style="width:100%;" size="15" class="texto" ondblclick="mudar_indicadores_filhos();"');
	$objResposta = new xajaxResponse();
	$objResposta->assign("combo_lista_indicadores","innerHTML", $saida);
	return $objResposta;
	}	

$xajax->registerFunction("mudar_indicadores_ajax");	


	
$xajax->processRequest();
?>

