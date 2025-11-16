# 🏡 Projeto: Sistema de Gestão Imobiliária (IMOB PRIME)

## ✨ Visão Geral do Projeto

Este projeto consiste em um Sistema de Gestão Imobiliária completo, desenvolvido para modernizar o cadastro, a visualização e o gerenciamento de propriedades, corretores e clientes. Utiliza um stack tecnológico robusto, focado em performance e escalabilidade.

### 🎯 Objetivo Principal

O objetivo é criar uma Plataforma Web que sirva como um ponto central para todas as operações de uma imobiliária, desde a captação e publicação de imóveis até o gerenciamento de transações e a comunicação com a carteira de clientes e funcionários.

### 💡 Funcionalidades Detalhadas

* **Gestão de Imóveis:** Cadastro detalhado com múltiplas fotos, características (usando Pivot Tables) e definição de disponibilidade (venda/locação).
* **Gestão de Pessoas:** Divisão clara entre `Funcionários` (Corretores, Administradores, com níveis de acesso) e `Clientes`.
* **Normalização de Dados:** Uso de Foreign Keys e tabelas de relacionamento para tipos de imóvel e tipos de usuário, garantindo escalabilidade futura.
* **APIs de Localização:** Integração com **ViaCEP** para preenchimento automático de endereços e **Google Maps** para geolocalização (`latitude`/`longitude`) de imóveis e sedes.
* **Segurança:** Implementação de autenticação e autorização robustas, separando clientes de colaboradores.

---

## 💻 Stack Tecnológico (O "Tijolo e Cimento" Digital)

O projeto utiliza a arquitetura moderna **LEMP** (Linux, Nginx, MySQL, PHP) encapsulada em contêineres e turbinada por frameworks reativos e utilitários de design.

| Categoria | Tecnologia | Descrição |
| :--- | :--- | :--- |
| **Backend** | **Laravel** | Framework PHP robusto para a lógica de negócios, rotas e APIs. |
| **Database** | **MySQL** | Banco de dados relacional para persistência de dados. |
| **Frontend** | **Vue.js** | Framework JavaScript progressivo para a construção de Single Page Applications (SPA) reativas. |
| **Estilização** | **Tailwind CSS** | Framework CSS *utility-first* que permite construir designs complexos rapidamente. |
| **Contêineres** | **Docker** & **Docker Compose** | Ferramentas essenciais para criar, empacotar e executar o ambiente de desenvolvimento de forma isolada e consistente. |
| **Servidor Web** | **Nginx** | Servidor web de alta performance para servir a aplicação. |

### 🌐 Logos

| Laravel | Vue.js | Tailwind CSS | MySQL | Docker |
| :---: | :---: | :---: | :---: | :---: |
|  |  |  |  |  |

---

## ⚙️ Configuração do Ambiente Local (Dockerized)

Siga os passos abaixo para configurar e iniciar o projeto em sua máquina local.

### Pré-requisitos

* **Docker Desktop** (com Docker Compose) instalado e em execução.
* **Git** instalado.

### 1. Clonar o Repositório e Configurar Arquivos

```bash
git clone [https://www.youtube.com/watch?v=w1RGT6FpXyY](https://www.youtube.com/watch?v=w1RGT6FpXyY)
cd imob_prime

2. Configurar o .env do Docker Compose

Crie o arquivo .env na raiz do projeto (ao lado do docker-compose.yml) com as credenciais do banco de dados:
Snippet de código

# .env (para o Docker Compose)
DB_DATABASE=imobiliaria_db
DB_USERNAME=imob_user
DB_PASSWORD=imob_secret

3. Subir e Construir os Contêineres

Este comando construirá a imagem PHP e iniciará os serviços MySQL e Nginx.
Bash

docker-compose up -d --build

4. Configuração Final do Laravel e Migrações

Execute esta sequência de comandos para concluir a instalação, configurar o .env interno do Laravel, e migrar o banco de dados.
Bash

# Instala o Laravel na subpasta (se necessário, caso o diretório raiz não esteja vazio)
docker-compose exec app composer create-project laravel/laravel .

# --- Ajuste do .env (CRÍTICO) ---
# Edite o novo arquivo .env criado na raiz e altere:
# DB_HOST=db
# DB_USERNAME=imob_user
# DB_PASSWORD=imob_secret

# Força o Laravel a usar a nova configuração
docker-compose exec app php artisan config:clear

# Gerar APP_KEY de segurança
docker-compose exec app php artisan key:generate

# Criar o link simbólico e ajustar permissões
docker-compose exec app php artisan storage:link
docker-compose exec app chmod -R 777 storage bootstrap/cache

# Aplicar o esquema do banco de dados (cria as tabelas padrão)
docker-compose exec app php artisan migrate

5. Acesso à Aplicação

O projeto estará acessível via navegador em:

http://localhost