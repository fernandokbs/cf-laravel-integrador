apt-get update

# Install some basic tools
apt-get install redis git curl wget unzip nginx mysql-server supervisor -y

# Install PHP
add-apt-repository ppa:ondrej/php

apt-get install php8.2-{cli,common,fpm,mysql,mbstring,zip,gd,curl,dev,pgsql,sqlite3,imap,bcmath,soap,intl,readline,gmp,redis,memcached,memcache}

# Composer

cd ~

curl -sS https://getcomposer.org/installer -o /tmp/composer-setup.php
