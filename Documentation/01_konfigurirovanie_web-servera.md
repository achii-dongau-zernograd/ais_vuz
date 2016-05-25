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


В файле /usr/share/phpmyadmin/config.inc.php
строку
$cfg['Servers'][$i]['auth_type'] = ‘cookies‘;
заменить на
$cfg['Servers'][$i]['auth_type'] = ‘http‘;




Источники:
1. http://pyatilistnik.org/kak-ustanovit-moodle-na-centos-7-sozdayte-svoyu-ploshhadku-obucheniya/
2. http://serveradmin.ru/centos-7-nastroyka-servera/
3. Установка Moodle: https://docs.moodle.org/31/en/Installing_Moodle