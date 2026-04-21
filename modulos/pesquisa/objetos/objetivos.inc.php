<?php 
/* Copyright [2008] -  Sérgio Fernandes Reinert de Lima
Este arquivo é parte do programa gpweb
O gpweb é um software livre; você pode redistribuí-lo e/ou modificá-lo dentro dos termos da Licença Pública Geral GNU como publicada pela Fundação do Software Livre (FSF); na versão 2 da Licença.
Este programa é distribuído na esperança que possa ser  útil, mas SEM NENHUMA GARANTIA; sem uma garantia implícita de ADEQUAÇÃO a qualquer  MERCADO ou APLICAÇÃO EM PARTICULAR. Veja a Licença Pública Geral GNU/GPL em português para maiores detalhes.
Você deve ter recebido uma cópia da Licença Pública Geral GNU, sob o título "licença GPL 2.odt", junto com este programa, se não, acesse o Portal do Software Público Brasileiro no endereço www.softwarepublico.gov.br ou escreva para a Fundação do Software Livre(FSF) Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301, USA 
*/

if (!defined('BASE_DIR')) die('Você não deveria acessar este arquivo diretamente.');


class objetivos extends pesquisa {
	var $tabela = 'objetivos_estrategicos';
	var $tabela_apelido = 'objetivos_estrategicos';
	var $tabela_modulo = 'praticas';
	var $tabela_chave = 'objetivos_estrategicos.pg_objetivo_estrategico_id';
	var $tabela_link = 'index.php?m=praticas&a=obj_estrategico_ver&pg_objetivo_estrategico_id=';
	var $tabela_titulo ='objetivos';
	var $tabela_ordem_por = 'pg_objetivo_estrategico_nome';
	var $buscar_campos = array('pg_objetivo_estrategico_nome', 'pg_objetivo_estrategico_oque','pg_objetivo_estrategico_descricao','pg_objetivo_estrategico_onde','pg_objetivo_estrategico_quando','pg_objetivo_estrategico_como','pg_objetivo_estrategico_porque','pg_objetivo_estrategico_quanto','pg_objetivo_estrategico_quem','pg_objetivo_estrategico_controle','pg_objetivo_estrategico_melhorias','pg_objetivo_estrategico_metodo_aprendizado','pg_objetivo_estrategico_desde_quando');
	var $mostrar_campos = array('pg_objetivo_estrategico_nome', 'pg_objetivo_estrategico_oque','pg_objetivo_estrategico_descricao','pg_objetivo_estrategico_onde','pg_objetivo_estrategico_quando','pg_objetivo_estrategico_como','pg_objetivo_estrategico_porque','pg_objetivo_estrategico_quanto','pg_objetivo_estrategico_quem','pg_objetivo_estrategico_controle','pg_objetivo_estrategico_melhorias','pg_objetivo_estrategico_metodo_aprendizado','pg_objetivo_estrategico_desde_quando');
	var $funcao='objetivo';
	}
?>

