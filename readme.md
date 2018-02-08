# TESTE PORTABILIS - Desenvolvedor PHP Sênior



---

## Intruções de instalação:

1. Faça o clone do projeto `git clone git@github.com:anacnogueira/teste-portabilis.git`
2. Altere o arquivo **.env.example**  para **.env** e altere as configurações de banco de dados (host, nome do banco, usuario e senha), servidor de email e e-mail de envio (MAIL_FROM_ADDRESS, MAIL_FROM_NAME)
3. Rode o comando `php artisan migrate --seed`  no terminal para criar as tabelas e popular a tabela users
4. Rode o comando `composer update` no terminal para instalar as depedências
5. Será gerado um usuário admin com e-mail fictício root@teste.com e senha padrão 123456
6. Gere um link simbólico através do comando `php artisan storage:link`
7. Importe os dados das tabelas através do comando `php artisan import:database`