# Установка PHP 5.6 на CentOS через Yum


Добавим репозиторий (хранилище пакетов) WebtaticEL, соответствующий CentOS 7 в yum:

rpm -Uvh https://mirror.webtatic.com/yum/el7/epel-release.rpm
rpm -Uvh https://mirror.webtatic.com/yum/el7/webtatic-release.rpm

установить PHP 5.6 (вместе с кэшером операционного кода)
yum install -y php56w php56w-opcache

обновить PHP (если PHP уже установлен)
yum replace --enablerepo=webtatic-testing php-common --replace-with=php56w-common


Автоматизация обновления

Обновление в кратчайшие сроки путем запуска одной строчки:
service mysqld stop && service nginx stop && service httpd stop && yum erase php54 php54-gd  php54-imap php54-pdo php54-mysql php54-xml php54-common php54-process php54-mbstring  php54-cli php54-ldap -y && yum install php56w php56w-gd  php56w-imap php56w-pdo php56w-mysql php56w-xml php56w-common php56w-process php56w-mbstring  php56w-cli php56w-ldap php56w-devel -y && service mysqld start && service nginx start && service httpd start


Источник: http://drach.pro/blog/linux/item/57-php-5-6-for-centos-6-5-via-yum

_____________________________________________________________
**Установка php7**
cd /tmp
curl 'https://setup.ius.io/' -o setup-ius.sh

bash setup-ius.sh

yum install mod_php70u php70u-cli php70u-mysqlnd

apachectl restart



