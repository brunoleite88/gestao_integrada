<?php
if (!defined('BASE_DIR')) die('Você não deveria acessar este arquivo diretamente.');

echo estiloTopoCaixa();
?>
<div style="padding: 20px;">
    <h2 style="color: #333; border-bottom: 2px solid #0056b3; padding-bottom: 10px;">Monitoramento de Metas (SIMMA / PGE-MA)</h2>
    
    <div style="display: flex; gap: 20px; margin-top: 20px;">
        <div style="flex: 1; background: #f9f9f9; padding: 15px; border: 1px solid #ddd; border-radius: 8px;">
            <h3 style="margin-top: 0;">Execução Física Global</h3>
            <div style="background: #e0e0e0; height: 30px; border-radius: 15px; overflow: hidden;">
                <div style="background: #28a745; width: 65%; height: 100%; text-align: center; color: white; line-height: 30px; font-weight: bold;">65%</div>
            </div>
            <p style="font-size: 0.9em; color: #666;">Ações dentro do cronograma quadrienal.</p>
        </div>

        <div style="flex: 1; background: #f9f9f9; padding: 15px; border: 1px solid #ddd; border-radius: 8px;">
            <h3 style="margin-top: 0;">Execução Financeira (LOA)</h3>
            <div style="background: #e0e0e0; height: 30px; border-radius: 15px; overflow: hidden;">
                <div style="background: #007bff; width: 42%; height: 100%; text-align: center; color: white; line-height: 30px; font-weight: bold;">42%</div>
            </div>
            <p style="font-size: 0.9em; color: #666;">Percentual liquidado em relação ao empenhado.</p>
        </div>
    </div>

    <table class="tbl_lista" width="100%" cellspacing="1" cellpadding="5" style="margin-top: 30px;">
        <thead>
            <tr style="background: #0056b3; color: white;">
                <th>Setor Responsável</th>
                <th>Marcos de Entrega</th>
                <th>Evidências</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><b>Gabinete do Procurador Geral</b></td>
                <td>Entrega de Relatório Anual à AGE</td>
                <td align="center"><img src="estilo/rondon/imagens/icones/anexo_projeto.png" title="Ver Documento"></td>
                <td align="center" style="background: #d4edda; color: #155724; font-weight: bold;">Concluído</td>
            </tr>
            <tr>
                <td><b>Corregedoria</b></td>
                <td>Plano de Integridade Atualizado</td>
                <td align="center"><img src="estilo/rondon/imagens/icones/progresso.gif" title="Em processamento"></td>
                <td align="center" style="background: #fff3cd; color: #856404; font-weight: bold;">Em Andamento</td>
            </tr>
        </tbody>
    </table>
</div>
<?php echo estiloFundoCaixa(); ?>
