apt-get update

apt-get install redis git curl wget unzip nginx mysql-server supervisor -y

# Install PHP

add-apt-repository ppa:ondrej/php
apt-get update
apt-get -y install php8.2-{cli,common,fpm,mysql,mbstring,zip,gd,curl,dev,pgsql,sqlite3,imap,bcmath,soap,intl,readline,gmp,redis,memcached,memcache}
apt install php8.2-xml

# Install Composer

cd ~

curl -sS https://getcomposer.org/installer -o /tmp/composer-setup.php

HASH=`curl -sS https://composer.github.io/installer.sig`

php -r "if (hash_file('SHA384', '/tmp/composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"

sudo php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer

# Install project

composer install

cp .env.example .env
php artisan key:generate
chmod -R 775

# Config nginx


ALTER USER 'root'@'localhost' IDENTIFIED WITH caching_sha2_password BY 'testroot';

# Node js 

curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.7/install.sh | bash

nvm install 20

https://certbot.eff.org/instructions?ws=nginx&os=snap

# Configure supervisor

[program:laravel-worker]
process_name=%(program_name)s_%(process_num)02d
command=php /var/www/cf-laravel-integrador/artisan queue:work
autostart=true
autorestart=true
stopasgroup=true
killasgroup=true
user=root
numprocs=1
redirect_stderr=true
stdout_logfile=/root/worker.log
stopwaitsecs=3600