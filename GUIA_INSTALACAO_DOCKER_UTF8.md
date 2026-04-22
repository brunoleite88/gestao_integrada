# Guia de Instalação GPWeb - Padrão UTF-8 (Docker/PHP 7.4)

Este documento descreve o processo de instalação e as correções técnicas aplicadas para rodar o GPWeb em um ambiente moderno 100% UTF-8 nativo.

## 1. Ambiente Docker
Utilize uma imagem `php:7.4-apache`. As extensões obrigatórias são:
- `mysqli`, `gd`, `mbstring`, `xml`.
- Configuração de PHP (`php.ini`):
  - `default_charset = "UTF-8"`
  - `display_errors = Off`

## 2. Solução Definitiva para Caracteres (Importação Forçada)
O erro de acentuação ocorre por "Double Encoding". Como os arquivos `.php` já estão em UTF-8, o segredo está em garantir que os dados entrem no banco de dados também em UTF-8, ignorando o padrão do terminal (Windows/Latin1).

**Comando de Importação Correto:**
```bash
docker exec -i gestao_integrada_db mariadb -u gei_user -pgei_password --default-character-set=utf8mb4 gestao_integrada < seu_arquivo.sql
```
*O uso do parâmetro `--default-character-set=utf8mb4` é obrigatório para evitar a corrupção de nomes como "Amapá" ou "São Paulo".*

## 3. Correções de Código (PHP 7.4+)

### A. Erro Fatal no ADOdb
No arquivo `lib/adodb/adodb-time.inc.php`, remover o comando `break;` na linha 944.

### B. Substituição da Função each()
O PHP 7.4 não aceita `each()`. Substitua por loops `foreach`.

### C. Limpeza da Classe UI
No arquivo `classes/ui.class.php`, desative as verificações legadas que tentam forçar `iso-8859-1` em strings de tradução. O sistema deve confiar que o arquivo de tradução já é UTF-8.

---
*Documentação atualizada em 21 de Abril de 2026 por brunoleite88.*
