<?php
if (!defined('BASE_DIR')) die('Você não deveria acessar este arquivo diretamente.');

$loa_id = (int)getParam($_GET, 'loa_id', 0);

// Se for edição, carregar dados
$loa = array();
if ($loa_id) {
    $sql = new BDConsulta();
    $sql->adTabela('gei_loa');
    $sql->adOnde('loa_id = ' . $loa_id);
    $loa = $sql->Linha();
    $sql->limpar();
}

// Carregar Objetivos Estratégicos para o Select
$sql = new BDConsulta();
$sql->adTabela('objetivos_estrategicos');
$sql->adCampo('pg_objetivo_estrategico_id, pg_objetivo_estrategico_nome');
$objetivos = $sql->Lista();
$sql->limpar();

// Carregar Departamentos (Setores)
$sql = new BDConsulta();
$sql->adTabela('depts');
$sql->adCampo('dept_id, dept_nome');
$setores = $sql->Lista();
$sql->limpar();

echo estiloTopoCaixa();
?>

<form name="editFrm" action="?m=planejamento&a=loa_lista" method="post">
    <input type="hidden" name="fazerSQL" value="fazer_loa_aed" />
    <input type="hidden" name="loa_id" value="<?php echo $loa_id; ?>" />

    <table cellspacing="1" cellpadding="4" border="0" width="100%" class="std">
        <tr>
            <td align="right" width="200">Ano da LOA:</td>
            <td><input type="text" class="texto" name="loa_ano" value="<?php echo @$loa['loa_ano'] ? $loa['loa_ano'] : date('Y'); ?>" size="4" maxlength="4" /></td>
        </tr>
        <tr>
            <td align="right">Código da Ação:</td>
            <td><input type="text" class="texto" name="loa_codigo_acao" value="<?php echo @$loa['loa_codigo_acao']; ?>" size="20" /></td>
        </tr>
        <tr>
            <td align="right">Nome da Ação:</td>
            <td><input type="text" class="texto" name="loa_nome_acao" value="<?php echo @$loa['loa_nome_acao']; ?>" size="60" /></td>
        </tr>
        <tr>
            <td align="right">Subação:</td>
            <td><input type="text" class="texto" name="loa_subacao" value="<?php echo @$loa['loa_subacao']; ?>" size="60" /></td>
        </tr>
        <tr>
            <td align="right">Valor Previsto (R$):</td>
            <td><input type="text" class="texto" name="loa_valor_previsto" value="<?php echo @$loa['loa_valor_previsto']; ?>" size="20" /></td>
        </tr>
        <tr>
            <td align="right">Objetivo Estratégico:</td>
            <td>
                <select name="loa_objetivo_estrategico" class="texto">
                    <option value="">-- Selecione o Vínculo Estratégico --</option>
                    <?php foreach ($objetivos as $obj) { 
                        $sel = ($obj['pg_objetivo_estrategico_id'] == @$loa['loa_objetivo_estrategico']) ? 'selected' : '';
                        echo "<option value='".$obj['pg_objetivo_estrategico_id']."' $sel>".$obj['pg_objetivo_estrategico_nome']."</option>";
                    } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td align="right">Setor Responsável:</td>
            <td>
                <select name="loa_setor_responsavel" class="texto">
                    <option value="">-- Selecione o Setor --</option>
                    <?php foreach ($setores as $setor) { 
                        $sel = ($setor['dept_id'] == @$loa['loa_setor_responsavel']) ? 'selected' : '';
                        echo "<option value='".$setor['dept_id']."' $sel>".$setor['dept_nome']."</option>";
                    } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><input type="button" value="cancelar" class="botao" onclick="javascript:history.back()" /></td>
            <td align="right"><input type="submit" value="salvar ação" class="botao" /></td>
        </tr>
    </table>
</form>

<?php echo estiloFundoCaixa(); ?>
