<?php
if (!defined('BASE_DIR')) die('Você não deveria acessar este arquivo diretamente.');

$sql = new BDConsulta();
$sql->adTabela('gei_loa');
$sql->adCampo('gei_loa.*, objetivos_estrategicos.pg_objetivo_estrategico_nome');
$sql->adJoin('objetivos_estrategicos', 'objetivos_estrategicos', 'gei_loa.loa_objetivo_estrategico = objetivos_estrategicos.pg_objetivo_estrategico_id', 'left');
$lista_loa = $sql->Lista();
$sql->limpar();

?>
<table width="100%" cellspacing="0" cellpadding="0" border="0">
    <tr>
        <td align="right">
            <input type="button" class="botao" value="nova ação orçamentária" onclick="javascript:window.location='?m=planejamento&a=loa_editar'" />
        </td>
    </tr>
</table>
<?php
echo estiloTopoCaixa();
?>
<table class="tbl_lista" width="100%" cellspacing="1" cellpadding="2">
    <thead style="position: sticky; top: 0; background: #eee; z-index: 10;">
        <tr>
            <th width="80">Ano</th>
            <th width="120">Ação / Subação</th>
            <th>Objetivo Estratégico (PGE-MA)</th>
            <th width="150">Vl. Previsto (R$)</th>
            <th width="150">Vl. Executado (R$)</th>
            <th width="50">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if (count($lista_loa) > 0) {
            foreach ($lista_loa as $linha) { ?>
            <tr>
                <td align="center"><?php echo $linha['loa_ano']; ?></td>
                <td align="center"><b><?php echo $linha['loa_codigo_acao']; ?></b><br><small><?php echo $linha['loa_subacao']; ?></small></td>
                <td style="color: #555;">
                    <img src="estilo/rondon/imagens/icones/bsc.png" align="absmiddle"> 
                    <?php echo ($linha['pg_objetivo_estrategico_nome'] ? $linha['pg_objetivo_estrategico_nome'] : '<i style="color:red">Não vinculado</i>'); ?>
                </td>
                <td align="right"><?php echo number_format($linha['loa_valor_previsto'], 2, ',', '.'); ?></td>
                <td align="right" style="color: blue;"><?php echo number_format($linha['loa_valor_executado'], 2, ',', '.'); ?></td>
                <td align="center"><img src="estilo/rondon/imagens/icones/moeda.png" title="Financeiro" style="cursor:pointer"></td>
            </tr>
        <?php } 
        } else { ?>
            <tr><td colspan="6" align="center">Nenhuma Ação Orçamentária na LOA. <a href="#">Importar da Secretaria de Planejamento</a></td></tr>
        <?php } ?>
    </tbody>
</table>
<?php echo estiloFundoCaixa(); ?>
