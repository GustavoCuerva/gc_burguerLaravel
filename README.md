# GC Burguer - Laravel

Esse projeto realizado com o intuito de ser um cardápio para uma hamburgaria. Projeto idependente que já tinha sido realizado com php puro, onde podem encontrar o projeto nesse <a href="https://github.com/GustavoCuerva/gc_burguer">link</a>, porém agora o codifiquei com laravel facilitando o processo.<br>
Nesse projeto você encontrará CRUD desde usuários, produtos, categorias, etc; Também poderá identificar diversos relacionamento em tabelas, utilização de migrations e bibilioteca como jetstream.

## Stack

![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white) ![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white) ![HTML5](https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white) ![CSS3](https://img.shields.io/badge/css3-%231572B6.svg?style=for-the-badge&logo=css3&logoColor=white) ![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)

## Instalação

De um git clone no projeto em seu servidor local e abra a pasta no terminal de sua preferencia.

Primeiramnete você deverá ter o composer intalado em sua máquina assim como o node.

Dentro do terminal na pasta dode o comando `composer install`

Vá até o seu php my admin, caso esteja utilizando o xampp que já deve estar iniciado, e crie uma nova base de dados.

Depois disso vá ao arquvio `.env.example` e o configure suas informações do banco de dados com algo do tipo:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE= Nome da base de dados que você criou
DB_USERNAME=root
DB_PASSWORD=
```
E salve esse arquivo, `.env.example`, como `.env`

Voltando ao terminal de comando que está aberto na pasta raiz do projeto rode o comando `php artisan migrate`

Depois de terminar a execução do comando acima rode o comando final `php artisan serve`

Abra outro terminal na pasta e execute o comando `npm install`

Após terminar essa intalação rode `npm run dev`

Clique no link seguindo a instrução e caso ocorra algum erro como pedindo uma chave apenas clique em gerar chave.

### Configurando o email

No arquivo .env configure um email smtp, onde foi utilizado para teste no localhost o mailtrap, crie uma conta e insira suas credenciais

### Primeira utilização
Rode o comando `php artisan serve` em seu terminal. O projeto abrirá localmente.

Após isso acesse a area de login e clique em cadastrar-se. Ao finalizar o cadastro você já estará logado como usuario comum.

Para obter a permissão de administrador você deverá acessar o banco de dados e alterar na coluna permission de 0 para 1.

Faça o logout e o login novamente para ter acesso a área restrita ao administrador.

<strongOBS:</strong> Todos que criam um cadastro são automaticamente colocados como usuário. O projeto foi feito para ter apenas uma conta administradora.

## Screenshots

### HOME
![Home](https://user-images.githubusercontent.com/86535275/215567886-7dea164f-9ce4-49c6-92f2-ee99ede38725.png)

### MENU
![Menu](https://user-images.githubusercontent.com/86535275/215568002-62b8237c-e41f-46e4-a6d7-957233fff846.png)

### RESERVAS
![Reservas](https://user-images.githubusercontent.com/86535275/215568238-309fb8e5-8991-42ef-a5cf-d28cfcd65462.png)

### DASHBOARD
![Dashboard](https://user-images.githubusercontent.com/86535275/215568304-1c19e8bb-e76d-4120-bcc4-09ec81834663.png)



## Funcionalidades a implementar:
    . Carrocel de produtos
    . Pedir produtos
        . Sistema de frete
        . Sistema de pagamentos
    . Enviar informações por email
        . Dados da reserva
        . Recuperar senha
        . Confirmar conta
