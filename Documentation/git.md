# Git
Установка Moodle
cd /var/www/html
git clone git://git.moodle.org/moodle.git



Composer
Download and install Composer 
curl -sS https://getcomposer.org/installer | php

Once the process completes, you can make the ‘composer.phar’ file executable by running the following command:
chmod +x composer.phar

Now use the following commands to make composer available globally for all users in your system, which can be used for all php applications on that system:
mv composer.phar /usr/local/bin/composer

You can also check the version of composer by running bellow command:
composer -V


http://idroot.net/tutorials/how-to-install-php-composer-on-centos-7/
https://habrahabr.ru/post/145946/
https://getcomposer.org/


Установка OAuth2
composer require league/oauth2-server

To generate the private key run this command on the terminal:
openssl genrsa -out private.key 1024

then extract the public key from the private key:
openssl rsa -in private.key -pubout -out public.key



https://oauth2.thephpleague.com/

