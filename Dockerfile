# Usando a imagem base do PHP com Apache
FROM php:8.3-apache

# Instalando extensões PHP necessárias para o PostgreSQL
RUN apt-get update \
    && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Instalando o Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copiando o arquivo de configuração do Apache
COPY apache-config.conf /etc/apache2/sites-available/000-default.conf

# Ativando mod_rewrite do Apache
RUN a2enmod rewrite

# Instalando as dependências do Composer
# (Certifique-se de ter o arquivo composer.json no diretório onde você está construindo a imagem)
COPY composer.* /var/www/html/

WORKDIR /var/www/html

RUN composer install

# Reiniciando o Apache
RUN service apache2 restart

# Expondo a porta 80 para acesso externo
EXPOSE 80
