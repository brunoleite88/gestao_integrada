<?php
if (!defined('BASE_DIR')) die('Você não deveria acessar este arquivo diretamente.');

// Título do Módulo
$botoesTitulo = new CBlocoTitulo('Planejamento Governamental', 'money.png', 'planejamento');
$botoesTitulo->mostrar();

// Definição das Abas (Tabs)
$tab = getParam($_GET, 'tab', 0);
$tabBox = new CAbas(BASE_URL . '/index.php?m=planejamento');
$tabBox->adAba('modulos/planejamento/ppa_lista', 'PPA (Plano Plurianual)');
$tabBox->adAba('modulos/planejamento/loa_lista', 'LOA (Orçamento Anual)');
$tabBox->adAba('modulos/planejamento/monitoramento', 'Monitoramento Governamental');

$tabBox->mostrar($tab);
?>
