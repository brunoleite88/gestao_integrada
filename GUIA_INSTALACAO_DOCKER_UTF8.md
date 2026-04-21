# Guia de Instalação GPWeb - Padrão UTF-8 (Docker/PHP 7.4)

Este documento descreve o processo de instalação e as correções técnicas aplicadas para rodar o GPWeb (sistema legado ISO-8859-1) em um ambiente moderno 100% UTF-8.

## 1. Ambiente Docker
Utilize uma imagem `php:7.4-apache`. As extensões obrigatórias são:
- `mysqli`, `gd`, `mbstring`, `xml`.
- Configuração de PHP (`php.ini`):
  - `default_charset = "UTF-8"`
  - `display_errors = Off` (Essencial para não quebrar headers de sessão).

## 2. Preparação do Banco de Dados (MariaDB/MySQL)
O banco deve ser criado com:
```sql
CREATE DATABASE gpweb CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```
**Importante:** Antes de importar os arquivos `.sql` originais, converta-os de `CP1252` para `UTF-8`.

## 3. Correções de Código (PHP 7.4+)

### A. Erro Fatal no ADOdb
No arquivo `lib/adodb/adodb-time.inc.php`, remova o comando `break;` que está fora de um loop (por volta da linha 944).

### B. Substituição da Função cada() (each)
O PHP 7.4 removeu a função `each()`. No arquivo `classes/BDConsulta.class.php`, substitua as chamadas por loops `foreach` ou use o padrão:
```php
reset($array);
$chave = key($array);
$valor = current($array);
```

### C. Ajuste de Sessão
No arquivo `incluir/sessao.php`, comente a linha:
```php
// ini_set('session.save_handler', 'user');
```

## 4. Solução Definitiva para Caracteres (O Filtro Global)
Para garantir que módulos antigos (ainda em ISO) apareçam corretamente em um navegador configurado para UTF-8, adicione este código no início do arquivo `base.php`:

```php
// Filtro de saída para converter ISO residual para UTF-8 em tempo real
function gpw_utf8_filter($buffer) {
    if (function_exists('mb_check_encoding') && !mb_check_encoding($buffer, 'UTF-8')) {
        return mb_convert_encoding($buffer, 'UTF-8', 'ISO-8859-1');
    }
    return $buffer;
}
ob_start("gpw_utf8_filter");
```

## 5. Credenciais Iniciais (PGE-MA)
Para criar o acesso inicial sem passar pelo instalador, execute no banco:
```sql
INSERT INTO cias (cia_nome, cia_nome_completo) VALUES ('PGE-MA', 'Procuradoria Geral do Estado do Maranhão');
-- Vincule o contato e o usuário (usuario_admin = 1) e o perfil_usuario (perfil = 11).
```

---
*Documentação gerada em 21 de Abril de 2026.*
