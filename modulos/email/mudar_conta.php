<?php 
/* Copyright [2008] -  Sérgio Fernandes Reinert de Lima
Este arquivo é parte do programa gpweb
O gpweb é um software livre; você pode redistribuí-lo e/ou modificá-lo dentro dos termos da Licença Pública Geral GNU como publicada pela Fundação do Software Livre (FSF); na versão 2 da Licença.
Este programa é distribuído na esperança que possa ser  útil, mas SEM NENHUMA GARANTIA; sem uma garantia implícita de ADEQUAÇÃO a qualquer  MERCADO ou APLICAÇÃO EM PARTICULAR. Veja a Licença Pública Geral GNU/GPL em português para maiores detalhes.
Você deve ter recebido uma cópia da Licença Pública Geral GNU, sob o título "licença GPL 2.odt", junto com este programa, se não, acesse o Portal do Software Público Brasileiro no endereço www.softwarepublico.gov.br ou escreva para a Fundação do Software Livre(FSF) Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301, USA 
*/

$sql = new BDConsulta;
$sql->adTabela('usuarios');
$sql->adCampo('usuario_login2, usuario_senha2');
$sql->adOnde('usuario_id ='.$Aplic->usuario_id);
$outra_conta=$sql->Linha();
$sql->limpar();

$sql->adTabela('usuarios');
$sql->adCampo('usuario_id');
$sql->adOnde('usuario_login =\''.$outra_conta['usuario_login2'].'\'');
$sql->adOnde('usuario_senha =\''.$outra_conta['usuario_senha2'].'\'');
$achado=$sql->Resultado();
$sql->limpar();

if ($achado){
 		$Aplic->mudar_conta($achado);
 		$Aplic->redirecionar('m=email&a=lista_msg');
		}
$Aplic->setMsg('A segunda conta cadastrada não corresponde a nenhuma cadastrada no sistema!', UI_MSG_ERRO); 			
$Aplic->redirecionar('m=email&a=lista_msg');
?>

