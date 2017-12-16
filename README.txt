# Instalação do Composer em linux:

1. curl -sS https://getcomposer.org/installer | php
2. sudo mv composer.phar /usr/local/bin/composer
3. composer

# Versões

1. PHP-7.1
2. PHP-XDEBUG

# Ao subir o projeto em DigitalOcean (SSH)

1. Após baixar todo o projeto, deverá install:
    -phpX-X
    -php5.6-mysql
    -php5.6-xml
    -php5.6-mbstring
    -apache2
    -composer
    -a2enmod rewrite
    -inserir o .htaccess na raiz do projeto
    -modificar o /etc/apache2/apache2.conf
        -> Directory
            AllowOverride All