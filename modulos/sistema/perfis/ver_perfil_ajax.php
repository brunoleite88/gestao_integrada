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


function mudar_submodulo($modulo=''){
	global $config;
	$sql = new BDConsulta;
	$sql->adTabela('perfil_submodulo');
	$sql->adCampo('perfil_submodulo_submodulo, perfil_submodulo_descricao');
	$sql->adOnde('perfil_submodulo_modulo=\''.previnirXSS(gpw_passthrough($modulo)).'\'');
	$sql->adOnde('perfil_submodulo_pai IS NULL');
	$sql->adOrdem('perfil_submodulo_descricao');
	$lista=$sql->Lista();
	$sql->limpar();
	$vetor=array(''=>'');
	foreach($lista as $linha) {
		if ($linha['perfil_submodulo_submodulo']=='me') $linha['perfil_submodulo_descricao']=ucfirst($config['me']);
		elseif ($linha['perfil_submodulo_submodulo']=='perspectiva') $linha['perfil_submodulo_descricao']=ucfirst($config['perspectiva']);
		elseif ($linha['perfil_submodulo_submodulo']=='tema') $linha['perfil_submodulo_descricao']=ucfirst($config['tema']);
		elseif ($linha['perfil_submodulo_submodulo']=='objetivo') $linha['perfil_submodulo_descricao']=ucfirst($config['objetivo']);
		elseif ($linha['perfil_submodulo_submodulo']=='fator') $linha['perfil_submodulo_descricao']=ucfirst($config['fator']);
		elseif ($linha['perfil_submodulo_submodulo']=='iniciativa') $linha['perfil_submodulo_descricao']=ucfirst($config['iniciativa']);
		elseif ($linha['perfil_submodulo_submodulo']=='pratica') $linha['perfil_submodulo_descricao']=ucfirst($config['pratica']);
		elseif ($linha['perfil_submodulo_submodulo']=='plano_acao') $linha['perfil_submodulo_descricao']=ucfirst($config['acao']);
		
		
		$vetor[$linha['perfil_submodulo_submodulo']]=$linha['perfil_submodulo_descricao'];
		$sql->adTabela('perfil_submodulo');
		$sql->adCampo('perfil_submodulo_submodulo, perfil_submodulo_descricao');
		$sql->adOnde('perfil_submodulo_modulo=\''.previnirXSS(gpw_passthrough($modulo)).'\'');
		$sql->adOnde('perfil_submodulo_pai =\''.$linha['perfil_submodulo_submodulo'].'\'');
		$sql->adOrdem('perfil_submodulo_descricao');
		$filhos=$sql->Lista();
		$sql->limpar();
		
		foreach($filhos as $filho) {
			$vetor[$filho['perfil_submodulo_submodulo']]=' - '.$filho['perfil_submodulo_descricao'];
			}
		}
	$saida=selecionaVetor($vetor, 'permissao_submodulo', 'size="1" style="width:200px;" class="texto"');
	$objResposta = new xajaxResponse();
	$objResposta->assign('combo_submodulo',"innerHTML", gpw_passthrough($saida));
	return $objResposta;
	}			
$xajax->registerFunction("mudar_submodulo");	

$xajax->processRequest();

?>


