<?php
if (!defined('BASE_DIR')) die('Você não deveria acessar este arquivo diretamente.');

$sql = new BDConsulta();
$sql->adTabela('gei_ppa');
$sql->adCampo('*');
$lista_ppa = $sql->Lista();
$sql->limpar();

?>
<table width="100%" cellspacing="0" cellpadding="0" border="0">
    <tr>
        <td align="right">
            <input type="button" class="botao" value="novo programa do ppa" onclick="javascript:window.location='?m=planejamento&a=ppa_editar'" />
        </td>
    </tr>
</table>
<?php
echo estiloTopoCaixa();
?>
<table class="tbl_lista" width="100%" cellspacing="1" cellpadding="2">
    <thead style="position: sticky; top: 0; background: #eee; z-index: 10;">
        <tr>
            <th width="100">Código</th>
            <th>Programa</th>
            <th width="100">Início</th>
            <th width="100">Fim</th>
            <th width="100">Status</th>
            <th width="50">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if (count($lista_ppa) > 0) {
            foreach ($lista_ppa as $linha) { ?>
            <tr>
                <td align="center"><?php echo $linha['ppa_codigo']; ?></td>
                <td><a href="?m=planejamento&a=ppa_editar&ppa_id=<?php echo $linha['ppa_id']; ?>"><b><?php echo $linha['ppa_nome']; ?></b></a></td>
                <td align="center"><?php echo $linha['ppa_inicio']; ?></td>
                <td align="center"><?php echo $linha['ppa_fim']; ?></td>
                <td align="center"><?php echo $linha['ppa_status']; ?></td>
                <td align="center"><a href="?m=planejamento&a=ppa_editar&ppa_id=<?php echo $linha['ppa_id']; ?>"><img src="estilo/rondon/imagens/icones/editar.png" border="0" style="cursor:pointer"></a></td>
            </tr>
        <?php } 
        } else { ?>
            <tr><td colspan="6" align="center">Nenhum PPA cadastrado. <a href="?m=planejamento&a=ppa_editar">Clique para adicionar</a></td></tr>
        <?php } ?>
    </tbody>
</table>
<?php echo estiloFundoCaixa(); ?>
