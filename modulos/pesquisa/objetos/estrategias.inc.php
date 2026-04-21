<?php 
/* Copyright [2008] -  Sérgio Fernandes Reinert de Lima
Este arquivo é parte do programa gpweb
O gpweb é um software livre; você pode redistribuí-lo e/ou modificá-lo dentro dos termos da Licença Pública Geral GNU como publicada pela Fundação do Software Livre (FSF); na versão 2 da Licença.
Este programa é distribuído na esperança que possa ser  útil, mas SEM NENHUMA GARANTIA; sem uma garantia implícita de ADEQUAÇÃO a qualquer  MERCADO ou APLICAÇÃO EM PARTICULAR. Veja a Licença Pública Geral GNU/GPL em português para maiores detalhes.
Você deve ter recebido uma cópia da Licença Pública Geral GNU, sob o título "licença GPL 2.odt", junto com este programa, se não, acesse o Portal do Software Público Brasileiro no endereço www.softwarepublico.gov.br ou escreva para a Fundação do Software Livre(FSF) Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301, USA 
*/

if (!defined('BASE_DIR')) die('Você não deveria acessar este arquivo diretamente.');


class estrategias extends pesquisa {
	var $tabela = 'estrategias';
	var $tabela_apelido = 'estrategias';
	var $tabela_modulo = 'praticas';
	var $tabela_chave = 'estrategias.pg_estrategia_id';
	var $tabela_link = 'index.php?m=praticas&a=estrategia_ver&pg_estrategia_id=';
	var $tabela_titulo ='iniciativas';
	var $tabela_ordem_por = 'pg_estrategia_nome';
	var $buscar_campos = array('pg_estrategia_nome', 'pg_estrategia_oque','pg_estrategia_descricao','pg_estrategia_onde','pg_estrategia_quando','pg_estrategia_como','pg_estrategia_porque','pg_estrategia_quanto','pg_estrategia_quem','pg_estrategia_controle','pg_estrategia_melhorias','pg_estrategia_metodo_aprendizado','pg_estrategia_desde_quando');
	var $mostrar_campos = array('pg_estrategia_nome', 'pg_estrategia_oque','pg_estrategia_descricao','pg_estrategia_onde','pg_estrategia_quando','pg_estrategia_como','pg_estrategia_porque','pg_estrategia_quanto','pg_estrategia_quem','pg_estrategia_controle','pg_estrategia_melhorias','pg_estrategia_metodo_aprendizado','pg_estrategia_desde_quando');
	var $funcao='estrategia';

	}
?>

