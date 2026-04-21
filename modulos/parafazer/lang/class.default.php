<?php
/* Copyright [2008] -  Sérgio Fernandes Reinert de Lima
Este arquivo é parte do programa gpweb
O gpweb é um software livre; você pode redistribuí-lo e/ou modificá-lo dentro dos termos da Licença Pública Geral GNU como publicada pela Fundação do Software Livre (FSF); na versão 2 da Licença.
Este programa é distribuído na esperança que possa ser  útil, mas SEM NENHUMA GARANTIA; sem uma garantia implícita de ADEQUAÇÃO a qualquer  MERCADO ou APLICAÇÃO EM PARTICULAR. Veja a Licença Pública Geral GNU/GPL em português para maiores detalhes.
Você deve ter recebido uma cópia da Licença Pública Geral GNU, sob o título "licença GPL 2.odt", junto com este programa, se não, acesse o Portal do Software Público Brasileiro no endereço www.softwarepublico.gov.br ou escreva para a Fundação do Software Livre(FSF) Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301, USA 
*/

class DefaultLang {
	private $default_js = array (
		'actionNote' => "nota",
		'actionEdit' => "modify",
		'actionDelete' => "delete",
		'taskDate' => array("function(date) { return 'added at '+date; }"),
		'confirmDelete' => "Tem certeza?",
		'actionNoteSave' => "save",
		'actionNoteCancel' => "cancel",
		'error' => "Some error occurred (click for details)",
		'denied' => "Access denied",
		'invalidpass' => "Wrong password",
		'readonly' => "read-only",
		'tagfilter' => "Tag:",
		'adicionarLista' => "Create new list",
		'adicionarListaDefault' => "Todo",
		'renomearLista' => "Rename list",
		'excluiLista' => "This will delete current list with all tasks in it.\\nAre you sure?",
		'settingsSaved' => "Settings saved. Reloading...",
		);

	private $default_inc = array(
		'tasks' => "Tarefas",
		'priority' => "Priority",
		'task' => "Tarefa",
		'nota' => "Note",
		'save' => "Save",
		'cancel' => "Cancel",
		'due' => "Due",
		);

	var $js = array();
	var $inc = array();

	function makeJS(){
		$a = array();
		foreach($this->default_js as $k=>$v){
			if(isset($this->js[$k])) $v = $this->js[$k];
			if(is_array($v)) {
				$a[] = "$k: ". $v[0];
				} 
			else {
				$a[] = "$k: \"". str_replace('"','\\"',$v). "\"";
				}
			}
		$t = array();
		foreach($this->get('days_min') as $v) { $t[] = '"'.str_replace('"','\\"',$v).'"'; }
		$a[] = "daysMin: [". implode(',', $t). "]";
		$t = array();
		foreach($this->get('months_long') as $v) { $t[] = '"'.str_replace('"','\\"',$v).'"'; }
		$a[] = "monthsLong: [". implode(',', $t). "]";
		$a[] = "parafazer_chave: \"". str_replace('"','\\"',$this->get('parafazer_chave')). "\"";
		return "lang = {\n". implode(",\n", $a). "\n};";
		}

	function get($key){
		if(isset($this->inc[$key])) return $this->inc[$key];
		if(isset($this->default_inc[$key])) return $this->default_inc[$key];
		return $key;
		}
	
	}

?>

