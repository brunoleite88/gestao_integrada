<?php
/* Copyright [2008] -  Sérgio Fernandes Reinert de Lima
Este arquivo é parte do programa gpweb
O gpweb é um software livre; você pode redistribuí-lo e/ou modificá-lo dentro dos termos da Licença Pública Geral GNU como publicada pela Fundação do Software Livre (FSF); na versão 2 da Licença.
Este programa é distribuído na esperança que possa ser  útil, mas SEM NENHUMA GARANTIA; sem uma garantia implícita de ADEQUAÇÃO a qualquer  MERCADO ou APLICAÇÃO EM PARTICULAR. Veja a Licença Pública Geral GNU/GPL em português para maiores detalhes.
Você deve ter recebido uma cópia da Licença Pública Geral GNU, sob o título "licença GPL 2.odt", junto com este programa, se não, acesse o Portal do Software Público Brasileiro no endereço www.softwarepublico.gov.br ou escreva para a Fundação do Software Livre(FSF) Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301, USA 
*/

if (!defined('BASE_DIR')) die('Você não deveria acessar este arquivo diretamente.');

class eventos extends pesquisa {
	var $tabela = 'eventos';
	var $tabela_modulo = 'calendario';
	var $tabela_chave = 'evento_id';
	var $tabela_extra = '';
	var $tabela_link = 'index.php?m=calendario&a=ver&evento_id=';
	var $tabela_titulo = 'Eventos';
	var $tabela_ordem_por = 'evento_inicio';
	var $buscar_campos = array('evento_titulo', 'evento_descricao', 'evento_oque', 'evento_onde', 'evento_quando', 'evento_como', 'evento_porque', 'evento_quanto', 'evento_quem');
	var $mostrar_campos = array('evento_titulo', 'evento_descricao', 'evento_oque', 'evento_onde', 'evento_quando', 'evento_como', 'evento_porque', 'evento_quanto', 'evento_quem');
	var $funcao='evento';
	}
?>

