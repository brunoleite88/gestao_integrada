# Gestão Estratégica Integrada (GEI)

Este projeto é um fork modernizado do sistema GPWeb, adaptado para ambientes de alta performance em governos e instituições públicas. O foco principal desta versão foi a estabilização em **PHP 7.4+**, migração nativa para **UTF-8** e isolamento via **Docker**.

**Autor do Clone:** [brunoleite88](https://github.com/brunoleite88)  
**Base Original:** GPWeb v8.4

---

## 🚀 Diferenciais desta Versão

### 1. Modernização do Ambiente (Stack)
- **Dockerizado:** Containers Apache/PHP 7.4 e MariaDB 10.6 pré-configurados.
- **PHP 7.4 Ready:** Correção de bugs fatais de bibliotecas legadas (ADOdb, PEAR).
- **Substituição de `each()`:** Atualização de todos os loops para padrões modernos de iteração de arrays.

### 2. Solução Definitiva de Acentuação (UTF-8 Puro)
- **Conversão Física:** 100% dos arquivos fonte (.php, .js, .sql) convertidos de ISO-8859-1 para UTF-8.
- **Banco de Dados:** Configurado em `utf8mb4_unicode_ci` nativo.
- **Filtro Global de Saída (OB):** Implementação de um buffer inteligente em `base.php` que intercepta e corrige qualquer resíduo de codificação antiga antes de chegar ao navegador.
- **Bypass de `utf8_encode`:** Desativação de funções manuais de conversão que causavam corrupção de dados.

---

## 🛠️ Como Instalar e Rodar

### Pré-requisitos
- Docker e Docker Compose instalados.

### Passo a Passo
1. Clone o repositório em sua máquina.
2. Navegue até a pasta `gestao_integrada`.
3. Suba os containers:
   ```bash
   docker-compose up -d --build
   ```
4. O sistema estará disponível em: `http://localhost:8081`

### Credenciais Padrão
- **Organização:** PGE-MA
- **Usuário Admin:** `admin_gei`
- **Senha:** `admin123`

---

## 📂 Estrutura de Configuração Técnica

### Filtro de Caracteres (`base.php`)
Adicionado um motor de limpeza dinâmica para suportar módulos antigos:
```php
function gpw_utf8_filter($buffer) {
    if (function_exists('mb_check_encoding') && !mb_check_encoding($buffer, 'UTF-8')) {
        return mb_convert_encoding($buffer, 'UTF-8', 'ISO-8859-1');
    }
    return $buffer;
}
ob_start("gpw_utf8_filter");
```

### Conexão de Dados (`incluir/db_adodb.php`)
Forçado o padrão de comunicação moderna com o MariaDB:
```php
$bd->Execute('SET NAMES utf8mb4;');
$bd->Execute('SET CHARACTER SET utf8mb4;');
```

---

## 📜 Licença
Distribuído sob a Licença Pública Geral GNU (GPL) Versão 2.

---
*Documentação gerada automaticamente para o projeto GEI - 2026.*

