<?php 
/* Copyright [2008] -  Sérgio Fernandes Reinert de Lima
Este arquivo é parte do programa gpweb
O gpweb é um software livre; você pode redistribuí-lo e/ou modificá-lo dentro dos termos da Licença Pública Geral GNU como publicada pela Fundação do Software Livre (FSF); na versão 2 da Licença.
Este avaliacao é distribuído na esperança que possa ser  útil, mas SEM NENHUMA GARANTIA; sem uma garantia implícita de ADEQUAÇÃO a qualquer  MERCADO ou APLICAÇÃO EM PARTICULAR. Veja a Licença Pública Geral GNU/GPL em português para maiores detalhes.
Você deve ter recebido uma cópia da Licença Pública Geral GNU, sob o título "licença GPL 2.odt", junto com este avaliacao, se não, acesse o Portal do Software Público Brasileiro no endereço www.softwarepublico.gov.br ou escreva para a Fundação do Software Livre(FSF) Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301, USA 
*/


if (!defined('BASE_DIR')) die('Você não deveria acessar este arquivo diretamente.');

class avaliacoes extends pesquisa {
	var $tabela = 'avaliacao';
	var $tabela_apelido = 'avaliacao';
	var $tabela_modulo = 'projetos';
	var $tabela_chave = 'avaliacao.avaliacao_id';
	var $tabela_link = 'index.php?m=praticas&a=avaliacao_ver&avaliacao_id=';
	var $tabela_titulo = 'Avaliações';
	var $tabela_ordem_por = 'avaliacao_nome';
	var $buscar_campos = array('avaliacao_nome', 'avaliacao_descricao');
	var $mostrar_campos = array('avaliacao_nome', 'avaliacao_descricao');
	var $tabela_agruparPor = 'avaliacao.avaliacao_id';
	var $funcao='avaliacao';
	}
?>

