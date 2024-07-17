# Título do Projeto

Projeto realizado para o teste técnico de Desenvolvedor Backend PHP Júnior para a **Petiko**.

### Tecnologias e pacotes utilizados

-   Laravel 11 (Backend)
-   Vue 3 (Frontend)
-   Laravel Breeze (Autenticação)
-   Inertia.js
-   TailwindCSS (Estilização)

### Por que utilizei o Inertia?

Optei por utilizar o Inertia.js devido à sua integração direta com Laravel e Vue.js, o que simplifica o desenvolvimento sem a necessidade de utilizar APIs separadas. Resultando em maior agilidade de desenvolvimento.

## Requisitos

-   [x] Utilizar MySQL como Banco de Dados.
-   [x] Sistema de autenticação.
-   [x] Permitir que apenas **Administradores** adicionem novas tarefas aos usuários.
-   [x] As tarefas devem ter _Título, descrição e data de vencimento_
-   [x] Permitir que usuários marquem tarefas como concluídas.
-   [x] Validações de formulário para garantir que os campos sejam preenchidos.

### Requisitos adicionais

-   [x] Funcionalidade de busca de tarefas por palavras-chaves no título
-   [x] Paginação da lista de tarefas.
-   [x] Validar se a data de vencimento é válida (no futuro).
-   [ ] Exportar tarefas em um arquivo CSV
-   [x] Interface administrativa (gerênciar usuários e tarefas).
-   [ ] Frontend ser reativo, usando broadcasts e laravel-echo-server
-   [x] Use as ferramentas do Laravel para inserir dados nas tabelas (seeeder)
-   [ ] Criar um “command” que manipule algum dado.
-   [x] Utilizar events, listeners e jobs.
-   [ ] Criar um Observer que execute alguma ação.

## Instalação e configuração do projeto

1. Clone o projeto

```bash
git clone https://github.com/GuilhermeWilker/petikoTeste.git

cd ./petikoTeste
```

2. Instale as dependências do Composer e do Node

```bash
composer install

npm i
```

3. Iniciando servidor php

```bash
php artisan serve
```

4. Iniciando servidor javascript

```bash
npm run build
npm run dev
```

## Overview e primeiros passos

### Gerar key de acesso do laravel

```bash
php artisan key:generate
```

### Gerar seeder de usuário Administrador

```bash
php artisan db:seed
```

após o seeding, teremos o display no console do e-mail e senha de login na aplicação.

```bash
|----------------------------------|
| E-mail: admin@petiko.com
| Senha: *********
|----------------------------------|
```

### Executando jobs de Eventos e Listeners da aplicação

```bash
php artisan queue:work
```
