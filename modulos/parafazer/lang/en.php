<?php
/* Copyright [2008] -  Sérgio Fernandes Reinert de Lima
Este arquivo é parte do programa gpweb
O gpweb é um software livre; você pode redistribuí-lo e/ou modificá-lo dentro dos termos da Licença Pública Geral GNU como publicada pela Fundação do Software Livre (FSF); na versão 2 da Licença.
Este programa é distribuído na esperança que possa ser  útil, mas SEM NENHUMA GARANTIA; sem uma garantia implícita de ADEQUAÇÃO a qualquer  MERCADO ou APLICAÇÃO EM PARTICULAR. Veja a Licença Pública Geral GNU/GPL em português para maiores detalhes.
Você deve ter recebido uma cópia da Licença Pública Geral GNU, sob o título "licença GPL 2.odt", junto com este programa, se não, acesse o Portal do Software Público Brasileiro no endereço www.softwarepublico.gov.br ou escreva para a Fundação do Software Livre(FSF) Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301, USA 
*/

class Lang extends DefaultLang
{
	var $js = array
	(
		'actionNote' => "nota",
		'actionEdit' => "modificar",
		'actionDelete' => "excluir",
		'taskDate' => array("function(date) { return 'adicionado em '+date; }"),
		'confirmDelete' => "Tem certeza?",
		'actionNoteSave' => "salvar",
		'actionNoteCancel' => "cancelar",
		'error' => "Algum erro ocorreu (clique para detalhes)",
		'denied' => "Acesso negado",
		'invalidpass' => "Senha errada",
		'readonly' => "apenas-leitura",
		'tagfilter' => "Tag:",
		'adicionarLista' => "Criar nova lista",
		'renomearLista' => "Renomear lista",
		'excluiLista' => "Isto excluirá a lista corrente e todas as atividades na mesma.\\nTem certeza?",
		'settingsSaved' => "Salvando as configurações saved. Carregando...",
	);

	var $inc = array
	(
		'My Tiny Todolist' => "Minha Lista de Coisa a Fazer",
		'htab_novatarefa' => "Nova atividade",
		'htab_pesquisar' => "Procurar",
		'btn_adicionar' => "Adicionar",
		'btn_search' => "Procurar",
		'advanced_add' => "Avançado",
		'searching' => "Procurando por",
		'tasks' => "Atividades",
		'edit_task' => "Editar Atividade",
		'add_task' => "Nova Atividade",
		'priority' => "Prioridade",
		'task' => "Atividade",
		'nota' => "Nota",
		'save' => "Salvar",
		'cancel' => "Cancelar",
		'btn_login' => "Login",
		'a_login' => "Login",
		'a_logout' => "Logout",
		'parafazer_chave' => "Tags",
		'tagfilter_cancel' => "cancelar filtro",
		'ordenarPorNome' => "Ordenar pessoalmente",
		'ordenarPorPrioridade' => "Ordenar por prioridade",
		'ordenarPorDataFinal' => "Ordenar por data",
		'due' => "Em",
		'daysago' => "%d dias atrás",
		'indays' => "em %d dias",
		'months_short' => array("Jan","Fev","Mar","Abr","Mai","Jun","Jul","Ago","Set","Out","Nov","Dez"),
		'months_long' => array("Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"),
		'days_min' => array("Dom","2ª","3ª","4ª","5ª","6ª","Sáb"),
		'hoje' => "hoje",
		'yesterday' => "ontem",
		'tomorrow' => "amanhã",
		'f_passado' => "Atrasado",
		'f_hoje' => "Hoje e amanhã",
		'f_breve' => "Breve",
		'tasks_and_compl' => "Atividades feitas",
		'notas' => "Notas:",
		'notas_show' => "Mostrar",
		'notas_hide' => "Esconder",
		'list_new' => "Nova lista",
		'list_rename' => "Renomear",
		'list_delete' => "Excluir",
		'allparafazer_chave' => "Todas para fazer:",
		'allparafazer_chave_show' => "Mostrar todas",
		'allparafazer_chave_hide' => "Esconder todas",
		'a_settings' => "Configurações",
		'rss_feed' => "RSS Feed",
		'feed_titulo' => "%s",
		'feed_description' => "Nova atividade em %s",
	);
}

?>

