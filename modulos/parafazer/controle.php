<?php
/* Copyright [2008] -  Sérgio Fernandes Reinert de Lima
Este arquivo é parte do programa gpweb
O gpweb é um software livre; você pode redistribuí-lo e/ou modificá-lo dentro dos termos da Licença Pública Geral GNU como publicada pela Fundação do Software Livre (FSF); na versão 2 da Licença.
Este programa é distribuído na esperança que possa ser  útil, mas SEM NENHUMA GARANTIA; sem uma garantia implícita de ADEQUAÇÃO a qualquer  MERCADO ou APLICAÇÃO EM PARTICULAR. Veja a Licença Pública Geral GNU/GPL em português para maiores detalhes.
Você deve ter recebido uma cópia da Licença Pública Geral GNU, sob o título "licença GPL 2.odt", junto com este programa, se não, acesse o Portal do Software Público Brasileiro no endereço www.softwarepublico.gov.br ou escreva para a Fundação do Software Livre(FSF) Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301, USA 
*/

$botoesTitulo = new CBlocoTitulo('Controle dos Lembretes', 'todo_list.png', $m, "$m.$a");

if (isset($_REQUEST['tab'])) $Aplic->setEstado('ParafazerControleTab', getParam($_REQUEST, 'tab', null));
$tab = $Aplic->getEstado('ParafazerControleTab', 0);


$botoesTitulo->mostrar();

$caixaTab = new CTabBox('m=parafazer&a=controle', BASE_DIR.'/modulos/parafazer/', $tab);

$caixaTab->adicionar('controle_tabela', 'Enviados Pendentes',null,null,'Enviados Pendentes','Visualizar os lembretes enviados que ainda aguardam aceitação ou recusa.');
$caixaTab->adicionar('controle_tabela', 'Enviados Recusadas',null,null,'Enviados Recusados','Visualizar os lembretes enviados que foram recusados.');
$caixaTab->adicionar('controle_tabela', 'Enviados Aceitas',null,null,'Enviados Aceitos','Visualizar os lembretes enviados que foram aceitos.');

$caixaTab->adicionar('controle_tabela', 'Recebidos Pendentes',null,null,'Recebidos Pendentes','Visualizar os lembretes recebidos que ainda aguardam aceitação ou recusa.');
$caixaTab->adicionar('controle_tabela', 'Recebidos Recusadas',null,null,'Recebidos Recusados','Visualizar os lembretes recebidos que foram recusados');
$caixaTab->adicionar('controle_tabela', 'Recebidos Aceitas',null,null,'Recebidos Aceitos','Visualizar os lembretes recebidos que foram aceitos');

$caixaTab->mostrar('','','','',true);
echo estiloFundoCaixa('','', $tab);






?>

