<?php
if (!defined('BASE_DIR')) die('Você não deveria acessar este arquivo diretamente.');

$loa_id = (int)getParam($_POST, 'loa_id', 0);
$fazerSQL = getParam($_POST, 'fazerSQL', '');

if ($fazerSQL == 'fazer_loa_aed') {
    $sql = new BDConsulta();
    $sql->adTabela('gei_loa');
    
    // Preparar campos
    $sql->adCampo('loa_ano', getParam($_POST, 'loa_ano', date('Y')));
    $sql->adCampo('loa_codigo_acao', getParam($_POST, 'loa_codigo_acao', ''));
    $sql->adCampo('loa_nome_acao', getParam($_POST, 'loa_nome_acao', ''));
    $sql->adCampo('loa_subacao', getParam($_POST, 'loa_subacao', ''));
    $sql->adCampo('loa_valor_previsto', str_replace(',', '.', getParam($_POST, 'loa_valor_previsto', 0)));
    $sql->adCampo('loa_objetivo_estrategico', getParam($_POST, 'loa_objetivo_estrategico', null));
    $sql->adCampo('loa_setor_responsavel', getParam($_POST, 'loa_setor_responsavel', null));

    if ($loa_id) {
        // Editar
        $sql->adOnde('loa_id = ' . $loa_id);
        $ok = $sql->exec();
    } else {
        // Adicionar novo
        $ok = $sql->exec();
    }

    if ($ok) {
        $Aplic->setMsg('Ação Orçamentária salva com sucesso!', UI_MSG_OK);
    } else {
        $Aplic->setMsg('Erro ao salvar Ação Orçamentária: ' . $sql->ErrorMsg(), UI_MSG_ERRO);
    }
    
    $sql->limpar();
    $Aplic->redirecionar('m=planejamento&tab=1');
}
?>
