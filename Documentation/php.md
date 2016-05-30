# Установка PHP 5.6 на CentOS через Yum


Добавим репозиторий (хранилище пакетов) WebtaticEL, соответствующий CentOS 7 в yum:

rpm -Uvh https://mirror.webtatic.com/yum/el7/epel-release.rpm
rpm -Uvh https://mirror.webtatic.com/yum/el7/webtatic-release.rpm

установить PHP 5.6 (вместе с кэшером операционного кода)
yum install -y php56w php56w-opcache

обновить PHP (если PHP уже установлен)
yum replace --enablerepo=webtatic-testing php-common --replace-with=php56w-common

Источник: http://drach.pro/blog/linux/item/57-php-5-6-for-centos-6-5-via-yum





