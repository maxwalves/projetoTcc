
# Configuração do Projeto TCC

## Requisitos

- **Sistema operacional:** Debian 12
- **Dependências de instalação:**
  - PHP 8.2
  - Apache
  - Composer
  - Node.js
  - MySQL Maria DB
  - Git

## Configuração do Git

1. Configure o Git via terminal com suas credenciais.

## Clonando o Repositório

1. Entre na pasta `/var/www/html`.
2. Execute o seguinte comando para clonar o repositório público do projeto:
```
git clone https://github.com/maxwalves/projetoTcc
```

## Configuração do Banco de Dados

1. Abra a pasta clonada e crie o arquivo `.env` a partir do `.env.example`.
2. Informe os dados do banco de dados no arquivo `.env`:
```
    DB_DATABASE=nome_do_banco_de_dados
    DB_USERNAME=usuario_do_banco
    DB_PASSWORD=senha_do_banco
```
3. Configure o banco de dados:
```
    sudo mysql -u root -p 
    create database [nomeDB]; 
    CREATE USER nomeUsuario@‘%’ IDENTIFIED BY ‘X’; 
    GRANT USAGE ON _._ TO nomeUsuario @‘%’ IDENTIFIED BY ‘X’; 
    GRANT ALL PRIVILEGES ON `nomeDB`.* TO `nomeUsuario`@`%`; 
    SHOW GRANTS FOR nomeUsuario @‘%’;
```
## Comandos Adicionais

1. Execute os seguintes comandos:
```
    npm install -g vite 
    npm install vite --save-dev 
    composer install 
    php artisan key:generate 
    php artisan migrate 
    php artisan db:seed
```

## Configuração do Apache

1. Crie um arquivo de configuração chamado `projetoTcc.conf` em `/etc/apache2/sites-available`.
2. Abra o arquivo com o comando:
```
    sudo nano projetoTcc.conf
```
3. Edite a configuração:
```
<VirtualHost *:80>
    ServerName http://IP_DO_SERVIDOR
    ServerAdmin admin@example.com
    DocumentRoot /var/www/projetoTcc/public
    <Directory /var/www/projetoTcc />
        Options FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
    RewriteEngine on
</VirtualHost>
```
4. Habilite o módulo rewrite:
```
sudo a2enmod rewrite
```
6.  Habilite o projeto no servidor:
 ```
 sudo a2ensite projetoTcc.conf
```
7.  Reinicie o servidor:
 ```
 sudo systemctl restart apache2
  ```
