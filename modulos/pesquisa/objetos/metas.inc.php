<?php 
/* Copyright [2008] -  Sérgio Fernandes Reinert de Lima
Este arquivo é parte do programa gpweb
O gpweb é um software livre; você pode redistribuí-lo e/ou modificá-lo dentro dos termos da Licença Pública Geral GNU como publicada pela Fundação do Software Livre (FSF); na versão 2 da Licença.
Este programa é distribuído na esperança que possa ser  útil, mas SEM NENHUMA GARANTIA; sem uma garantia implícita de ADEQUAÇÃO a qualquer  MERCADO ou APLICAÇÃO EM PARTICULAR. Veja a Licença Pública Geral GNU/GPL em português para maiores detalhes.
Você deve ter recebido uma cópia da Licença Pública Geral GNU, sob o título "licença GPL 2.odt", junto com este programa, se não, acesse o Portal do Software Público Brasileiro no endereço www.softwarepublico.gov.br ou escreva para a Fundação do Software Livre(FSF) Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301, USA 
*/

if (!defined('BASE_DIR')) die('Você não deveria acessar este arquivo diretamente.');


class metas extends pesquisa {
	var $tabela = 'metas';
	var $tabela_apelido = 'metas';
	var $tabela_modulo = 'praticas';
	var $tabela_chave = 'metas.pg_meta_id';
	var $tabela_link = 'index.php?m=praticas&a=meta_ver&pg_meta_id=';
	var $tabela_titulo ='metas';
	var $tabela_ordem_por = 'pg_meta_nome';
	var $buscar_campos = array('pg_meta_nome', 'pg_meta_oque','pg_meta_descricao','pg_meta_onde','pg_meta_quando','pg_meta_como','pg_meta_porque','pg_meta_quanto','pg_meta_quem','pg_meta_controle','pg_meta_melhorias','pg_meta_metodo_aprendizado','pg_meta_desde_quando');
	var $mostrar_campos = array('pg_meta_nome', 'pg_meta_oque','pg_meta_descricao','pg_meta_onde','pg_meta_quando','pg_meta_como','pg_meta_porque','pg_meta_quanto','pg_meta_quem','pg_meta_controle','pg_meta_melhorias','pg_meta_metodo_aprendizado','pg_meta_desde_quando');
	var $funcao='meta';

	}
?>

