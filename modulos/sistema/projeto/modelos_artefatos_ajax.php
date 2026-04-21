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
$xajax->configure('defaultMode', 'synchronous');
//$xajax->setFlag('debug',true);
//$xajax->setFlag('outputEntities',true);

function mudar_campo_artefato($artefato_tipo='', $campo='', $posicao='', $script=''){
	$vetor=vetor_campo_sistema('ArtefatoCampo',$artefato_tipo, true);
	$saida=selecionaVetor($vetor, $campo, $script, $artefato_tipo);
	$objResposta = new xajaxResponse();
	$objResposta->assign($posicao,"innerHTML", $saida);
	return $objResposta;
	}
$xajax->registerFunction("mudar_campo_artefato");	






function alterar_html($artefato_tipo_id, $artefato_tipo_html=null){
	global $bd, $Aplic;
		
	$sql = new BDConsulta;
	$artefato_tipo_html=previnirXSS(gpw_passthrough($artefato_tipo_html));
	if ($artefato_tipo_id){
		$sql->adTabela('artefatos_tipo');
		$sql->adAtualizar('artefato_tipo_html', $artefato_tipo_html);	
		$sql->adOnde('artefato_tipo_id ='.(int)$artefato_tipo_id);
		$sql->exec();
	  $sql->Limpar();
		
		
		$sql->adTabela('artefatos_tipo');
		$sql->adCampo('artefato_tipo_nome, artefato_tipo_descricao, artefato_tipo_imagem, artefato_tipo_campos, artefato_tipo_endereco, artefato_tipo_arquivo, artefato_tipo_html');
		$sql->adOnde('artefato_tipo_id='.$artefato_tipo_id);
		$rs = $sql->Linha();
		$sql->Limpar();
	
		$arquivo_modelo = str_replace('src="imagens/', 'src="./'.$rs['artefato_tipo_endereco'].'/imagens/', $rs['artefato_tipo_html']);
		$arquivo_modelo = str_replace('src="./'.$rs['artefato_tipo_endereco'].'/imagens/brasao_republica.gif','src="'.$Aplic->gpweb_brasao,  $arquivo_modelo);
	
		$objResposta = new xajaxResponse();
		$objResposta->assign("combo_modelo","innerHTML", gpw_passthrough($arquivo_modelo));
		return $objResposta;
		
		
		
		}

	
	}
$xajax->registerFunction("alterar_html");	











$xajax->processRequest();
?>


