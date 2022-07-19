# Sistema Concessionária

Histórico de atualizações do sistema disponivél no [CHANGELOG.](https://github.com/wistech7l/sistema-concessionaria/blob/main/changelog.md)

## Atualmente disponivél
Sistema disponivél [http://acai.epizy.com](http://acai.epizy.com)

## Requisitos minímos 
* PHP
* MariaDB
* Servidor Apache
* [Composer](https://getcomposer.org/download/)

Recomendamos a instalação do [XAMPP](https://www.apachefriends.org/download.html) em sistemas operacionais Windows

## Instalação para testes locais
1) Instalar o XAMPP
2) execute ``` git clone https://github.com/wistech7l/sistema-concessionaria.git ``` na pasta do XAMPP
3) Renomeia a pasta *htdocs* para *htdocs.old*
4) Renomeia a pasta *sistema-concessionaria* para *htdocs*
5) Click em *start* no servidor *Apache* no aplicativo do *XAMPP*
6) [Abrir site no navegador: *localhost/*](http://localhost/)

7) execute ```composer i```
8) criar arquivo ```.env``` conforme as descrições do ```example.env```

## Sobre o Banco de dados

1) Click em *start* no banco de dados *MySql* do *XAMPP*

2) Utilize o gerenciador de banco de dados que preferir .

*Obs.:* o XAMPP disponibiliza o [*PHPMyAdmin*](localhost/phpmyadmin/)

3) Criar uma nova base de dados, com o nome que preferir
*obs.:* nome utilizado deverá ser prenchido no aquivo *.env*

4) Após a inserção do banco no *.env* para criação das tabelas é necessário apenas acessar a página 
*initDb.php*, em localhost: [Abrir site no navegador: *localhost/initDb.php*](http://localhost/initDb.php)

*Obs.:* Usuário Test: **login:** admin **senha:** admin

## Deploy
Para o Deploy foi escolhido o servidor do [InfinityFree](https://www.infinityfree.net/), por ser um servidor que possui *PHP* e banco de dados *MySql/MariaDB*, necessários para execução do nosso sistema e por ser um Servidor gratuito. 

Sendo necessário, previamente possuir uma conta no mesmo e acesso ao painel de um dominio, criado no servidor do [InfinityFree](https://app.infinityfree.net/accounts)

### Banco de dados 
* Criar um banco de dados no servidor do InfinityFree.
* Criar as tabelas no servidor do InfinityFree, necessário acessar a página *initDb.php*, por exemplo: 
Se seu dominio for *test.epizy.com* acesse *test.epizy.com/initDb.php* para criar as tabelas, caso ocorra tudo bem, você será redirecionado para página de home, podendo realizar o login com o usuário Test.

*Obs.:* Usuário Test: **login:** admin **senha:** admin

### Variavéis do Secret 
Será necessário adicionar as variavéis de ambiente no Secrets do Github, para a realização do deploy automatizado, [disponivél aqui](https://github.com/wistech7l/sistema-concessionaria/blob/main/.github/workflows/deploy.yml)

* ***DB_DATABASE***: Referente ao nome do banco de dados criado no InfinityFree

* ***DB_HOST***: Referente *URL* do servidor de banco de dados criado no InfinityFree

* ***DB_PASS***: Referente a senha utilizada para acessar o banco de dados criado no InfinityFree

* ***DB_USER***: Referente ao usuário utilizado para acessar o banco de dados criado no InfinityFree

* ***FTP_HOST***: Referente a URL do servidor *FTP*, para envio dos arquivos para o servidor do InfinityFree

* ***FTP_PASS***: Referente a senha utilizada para envio dos arquivos ao servidor do InfinityFree, via *FTP*

* ***FTP_USER***: Referente ao usuário utilizado para envio dos arquivos ao Servidor do InfinityFree, via *FTP*
