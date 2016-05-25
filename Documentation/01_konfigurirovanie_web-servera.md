# Часть 1. Конфигурирование веб-сервера

В качестве серверной операционной системы используется CentOS 7 (https://www.centos.org/download/).
ОС установлена в режиме "Веб-сервер".

1. Обновление всех установленных пакетов<br>
<b>yum update</b>

2. Устанавливаем Midnight commander<br>
<b>yum install mc</b>

3. Устанавливаем текстовый веб-сервер Elinks<br>
<b>yum install elinks</b>

4. Установка веб-сервера Apache<br>
<b>yum install httpd -y</b>

5. Поставить Apache в автозагрузку<br>
<b>systemctl enable httpd.service</b>

6. Запускаем Apache<br>
<b>systemctl start httpd.service</b>

7. Проверяем, работает ли веб-сервер.<br>
<b>elinks</b><br>
<b>http://localhost</b><br>
Если все сделано правильно и сервер работает, в браузере elinks будет отображена стартовая страница Apache.<br>
Закрываем браузер командой "q" ? или F10???
Если данная страница не открывается, нужно настроить firewall (службу <strong>iptables</strong>), а именно включить прослушивание порта 80.

8. Устанавливаем дополнительные репозитории<br>
yum -y install epel-release
rpm --import http://apt.sw.be/RPM-GPG-KEY.dag.txt
yum -y install http://pkgs.repoforge.org/rpmforge-release/rpmforge-release-0.5.3-1.el7.rf.x86_64.rpm

9. Устанавливаем дополнительные утилиты
yum -y install net-tools.x86_64
yum -y install iftop
yum -y install htop
yum -y install atop

10. Настраиваем сеть
nmtui
10.52.9.200/8
10.52.9.100
10.52.9.100
8.8.8.8
8.8.4.4

11. Установка и настройка PhpMyAdmin
yum install phpmyadmin

Редактируем: /etc/httpd/conf.d/phpMyAdmin.conf

...

<Directory /usr/share/phpMyAdmin/>
   AddDefaultCharset UTF-8
 
   <IfModule mod_authz_core.c>
     # Apache 2.4
     <RequireAny>
       #Require ip 127.0.0.1
       #Require ip ::1
       Require all granted
     </RequireAny>
   </IfModule>
   <IfModule !mod_authz_core.c>
     # Apache 2.2
     Order Deny,Allow
     Deny from All
     Allow from 127.0.0.1
     Allow from ::1
   </IfModule>
</Directory>
 
<Directory /usr/share/phpMyAdmin/setup/>
   <IfModule mod_authz_core.c>
     # Apache 2.4
     <RequireAny>
       #Require ip 127.0.0.1
       #Require ip ::1
       Require all granted
     </RequireAny>
   </IfModule>
   <IfModule !mod_authz_core.c>
     # Apache 2.2
     Order Deny,Allow
     Deny from All
     Allow from 127.0.0.1
     Allow from ::1
   </IfModule>
</Directory>

...


Перезагрузить веб-сервер:
service httpd restart

Запускаем по адресу http://10.52.9.200/phpmyadmin 

12. Устанавливаем и настраиваем Moodle


Устанавливаем права на папку для Apache:
chown -R apache:apache /var/www/html/moodle/

Теперь создадим папку для хранения данных Moodle. Она должна быть не доступна из веб и располагаться вне директории /var/www/html/:
mkdir /var/moodle
mkdir /var/moodle/data

Также указываем владельца и права на папку:
chown -R apache:apache /var/moodle
chmod -R 755 /var/moodle

Далее создадим собственный конфигурационный файл (config.php), основываясь на файле config-dist.php.

Для этого переходим в каталог Moodle:
cd /var/www/html/moodle/

И создаем копию файла config-dist.php:
cp config-dist.php config.php

Открываем файл на редактирование и корректируем следующие строки.
Информация о базе данных (указываем свои данные):
$CFG->dbtype    = 'mariadb';     
$CFG->dbname    = 'moodledb';    
$CFG->dbuser    = 'moodleusr';  
$CFG->dbpass    = 'moodlepass'; 

Также настраиваем параметр URL адреса для доступа к Moodle (указываем либо домен, либо IP адрес):
$CFG->wwwroot   = 'http://10.52.9.200/moodle';

Указываем путь к каталогу с данными:
$CFG->dataroot  = '/var/moodle/data';

Далее продолжим инсталляцию, уже перейдя непосредственно на только что установленный сайт Moodle через браузер.

Вводим в браузере указанный ранее адрес (домен или IP), например, http://192.168.0.10/moodle

Источники:
1. http://pyatilistnik.org/kak-ustanovit-moodle-na-centos-7-sozdayte-svoyu-ploshhadku-obucheniya/
2. http://serveradmin.ru/centos-7-nastroyka-servera/
3. http://centos.name/?page/tipsandtricks/phpmyadmin
4. Установка Moodle: https://docs.moodle.org/31/en/Installing_Moodle
5. http://www.e-du.ru/2015/08/install-moodle-linux-centos.html?m=1
6. http://on.econ.msu.ru/help.php?file=install.html