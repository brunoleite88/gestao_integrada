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
	
function exibir_combo($posicao, $tabela, $chave='', $campo='', $onde='', $ordem='', $script='', $campo_id='', $campoatual='', $campobranco=true, $tabela2='', $uniao2='', $tabela3='', $uniao3=''){
	global $localidade_tipo_caract;
	$sql = new BDConsulta;
	$sql->adTabela($tabela);
	$onde=html_entity_decode($onde, ENT_COMPAT, $localidade_tipo_caract);
	if ($tabela2) $sql->esqUnir($tabela2, $tabela2, $uniao2);
	if ($tabela3) $sql->esqUnir($tabela3, $tabela3, $uniao3);
	if ($chave) $sql->adCampo($chave);
	if ($campo) $sql->adCampo($campo);
	if ($onde) $sql->adOnde($onde);
	if ($ordem) $sql->adOrdem($ordem);
	$saida=$sql->comando_sql();
	$linhas=$sql->Lista();
	$sql->limpar();
	$vetor=array();
	$chave=explode('.',$chave); 
	$chave = array_pop($chave);
	if ($campobranco) $vetor[]='';
	foreach($linhas as $linha)$vetor[$linha[$chave]]=gpw_passthrough($linha[$campo]);
	$saida=selecionaVetor($vetor, $campo_id, $script, $campoatual);
	$objResposta = new xajaxResponse();
	$objResposta->assign($posicao,"innerHTML", $saida);
	return $objResposta;
	}
	
$xajax->registerFunction("selecionar_om_ajax");	
$xajax->registerFunction("exibir_combo");
$xajax->processRequest();

?>


