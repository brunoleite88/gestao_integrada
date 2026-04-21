<?php
/* Copyright [2008] -  Sérgio Fernandes Reinert de Lima
Este arquivo é parte do programa gpweb
O gpweb é um software livre; você pode redistribuí-lo e/ou modificá-lo dentro dos termos da Licença Pública Geral GNU como publicada pela Fundação do Software Livre (FSF); na versão 2 da Licença.
Este programa é distribuído na esperança que possa ser  útil, mas SEM NENHUMA GARANTIA; sem uma garantia implícita de ADEQUAÇÃO a qualquer  MERCADO ou APLICAÇÃO EM PARTICULAR. Veja a Licença Pública Geral GNU/GPL em português para maiores detalhes.
Você deve ter recebido uma cópia da Licença Pública Geral GNU, sob o título "licença GPL 2.odt", junto com este programa, se não, acesse o Portal do Software Público Brasileiro no endereço www.softwarepublico.gov.br ou escreva para a Fundação do Software Livre(FSF) Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301, USA 
*/

include_once $Aplic->getClasseBiblioteca('xajax/xajax_core/xajax.inc');
$xajax = new xajax();

function mudar_porcentagem_ajax($msg_usuario_id, $porcentagem){
	global $Aplic;
	$sql = new BDConsulta;
	$sql->adTabela('msg_usuario');
	$sql->adAtualizar('tarefa_progresso', $porcentagem);
	$sql->adOnde('msg_usuario_id='.$msg_usuario_id);
	$sql->exec();
	$sql->limpar();
	
	$sql->adTabela('msg_tarefa_historico');
	$sql->adInserir('progresso', (int)$porcentagem);
	$sql->adInserir('msg_usuario_id', $msg_usuario_id);
	$sql->adInserir('data', date('Y-m-d H:i:s'));
	$sql->exec();
	$sql->limpar();
	}
	

$xajax->registerFunction("mudar_porcentagem_ajax");
$xajax->processRequest();

?>

