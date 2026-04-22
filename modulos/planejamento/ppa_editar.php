<?php
if (!defined('BASE_DIR')) die('Você não deveria acessar este arquivo diretamente.');

$ppa_id = (int)getParam($_GET, 'ppa_id', 0);

// Se for edição, carregar dados
$ppa = array();
if ($ppa_id) {
    $sql = new BDConsulta();
    $sql->adTabela('gei_ppa');
    $sql->adOnde('ppa_id = ' . $ppa_id);
    $ppa = $sql->Linha();
    $sql->limpar();
}

echo estiloTopoCaixa();
?>

<form name="editPpaFrm" action="?m=planejamento&a=ppa_lista" method="post">
    <input type="hidden" name="fazerSQL" value="fazer_ppa_aed" />
    <input type="hidden" name="ppa_id" value="<?php echo $ppa_id; ?>" />

    <table cellspacing="1" cellpadding="4" border="0" width="100%" class="std">
        <tr>
            <td align="right" width="200">Código do Programa:</td>
            <td><input type="text" class="texto" name="ppa_codigo" value="<?php echo @$ppa['ppa_codigo']; ?>" size="20" placeholder="Ex: 1001" /></td>
        </tr>
        <tr>
            <td align="right">Nome do Programa:</td>
            <td><input type="text" class="texto" name="ppa_nome" value="<?php echo @$ppa['ppa_nome']; ?>" size="60" /></td>
        </tr>
        <tr>
            <td align="right">Descrição Objetiva:</td>
            <td><textarea name="ppa_descricao" class="texto" cols="60" rows="4"><?php echo @$ppa['ppa_descricao']; ?></textarea></td>
        </tr>
        <tr>
            <td align="right">Ano de Início:</td>
            <td><input type="text" class="texto" name="ppa_inicio" value="<?php echo @$ppa['ppa_inicio'] ? $ppa['ppa_inicio'] : date('Y'); ?>" size="4" maxlength="4" /></td>
        </tr>
        <tr>
            <td align="right">Ano de Término:</td>
            <td><input type="text" class="texto" name="ppa_fim" value="<?php echo @$ppa['ppa_fim'] ? $ppa['ppa_fim'] : (date('Y')+3); ?>" size="4" maxlength="4" /></td>
        </tr>
        <tr>
            <td align="right">Status:</td>
            <td>
                <select name="ppa_status" class="texto">
                    <option value="Ativo" <?php echo (@$ppa['ppa_status'] == 'Ativo') ? 'selected' : ''; ?>>Ativo</option>
                    <option value="Concluído" <?php echo (@$ppa['ppa_status'] == 'Concluído') ? 'selected' : ''; ?>>Concluído</option>
                    <option value="Suspenso" <?php echo (@$ppa['ppa_status'] == 'Suspenso') ? 'selected' : ''; ?>>Suspenso</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><input type="button" value="cancelar" class="botao" onclick="javascript:history.back()" /></td>
            <td align="right"><input type="submit" value="salvar programa" class="botao" /></td>
        </tr>
    </table>
</form>

<?php echo estiloFundoCaixa(); ?>
