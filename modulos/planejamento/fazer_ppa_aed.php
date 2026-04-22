<?php
if (!defined('BASE_DIR')) die('Você não deveria acessar este arquivo diretamente.');

$ppa_id = (int)getParam($_POST, 'ppa_id', 0);
$fazerSQL = getParam($_POST, 'fazerSQL', '');

if ($fazerSQL == 'fazer_ppa_aed') {
    $sql = new BDConsulta();
    $sql->adTabela('gei_ppa');
    
    // Preparar campos
    $sql->adCampo('ppa_codigo', getParam($_POST, 'ppa_codigo', ''));
    $sql->adCampo('ppa_nome', getParam($_POST, 'ppa_nome', ''));
    $sql->adCampo('ppa_descricao', getParam($_POST, 'ppa_descricao', ''));
    $sql->adCampo('ppa_inicio', getParam($_POST, 'ppa_inicio', date('Y')));
    $sql->adCampo('ppa_fim', getParam($_POST, 'ppa_fim', (date('Y')+3)));
    $sql->adCampo('ppa_status', getParam($_POST, 'ppa_status', 'Ativo'));

    if ($ppa_id) {
        // Editar
        $sql->adOnde('ppa_id = ' . $ppa_id);
        $ok = $sql->exec();
    } else {
        // Adicionar novo
        $ok = $sql->exec();
    }

    if ($ok) {
        $Aplic->setMsg('Programa do PPA salvo com sucesso!', UI_MSG_OK);
    } else {
        $Aplic->setMsg('Erro ao salvar PPA: ' . $sql->ErrorMsg(), UI_MSG_ERRO);
    }
    
    $sql->limpar();
    $Aplic->redirecionar('m=planejamento&tab=0');
}
?>
