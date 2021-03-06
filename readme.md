## Blog simples desenvolvido em Laravel 5.8

**Funcionalidades:** Blog administrável com posts e categorias. O sistema de permissões permite criar usuários e grupos de acesso.

### Requisitos

- PHP 7.2 ou superior
- MySQL
- Composer - [Link](https://getcomposer.org)

### Instalação

- Clone o repositório ou baixe e descompacte projeto
- Pelo terminal acesse a pasta do projeto
- Execute o comando "composer install" e aguarde finalizar
- Crie um arquivo .env com base no .env.example
- Execute o comando "php artisan key:generate" para gerar uma app key para o projeto
- Crie um novo banco de dados e configure o nome do banco, usuário e senha no arquivo .env
- Execute o comando "php artisan storage:link" para disponibilizar a pasta de arquivos publicos no site
- Execute o comando "php artisan migrate"
- Execute o comando "php artisan db:seed"

### Acesso ao blog e painel administrativo

- Execute o comando "php artisan serve" e acesse o blog pelo navegador. Normalmente pela url [http://localhost:8000](http://localhost:8000)

- Para acessar o painel administrativo, acesse: [http://localhost:8000/painel](http://localhost:8000/painel)
- O sistema irá criar um usuário administrativo:
Usuário: admin@blog.com
Senha: admin

- Demo: http://demo-blog.w42.com.br
- Demo painel: http://demo-blog.w42.com.br/painel
