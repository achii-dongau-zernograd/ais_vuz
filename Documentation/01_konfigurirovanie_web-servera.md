# Часть 1. Конфигурирование веб-сервера

В качестве серверной операционной системы используется CentOS 7 (https://www.centos.org/download/).
ОС установлена в режиме "Веб-сервер".

1. Обновление всех установленных пакетов
yum update

2. Устанавливаем Midnight commander
yum install mc

3. Устанавливаем текстовый веб-сервер Elinks
yum install elinks

4. Установка веб-сервера Apache
yum install httpd -y

5. Поставить Apache в автозагрузку
systemctl enable httpd.service

6. Запускаем Apache
systemctl start httpd.service

7. Проверяем, работает ли веб-сервер.
elinks
http://localhost
Если все сделано правильно и сервер работает, в браузере elinks будет отображена стартовая страница Apache.
Закрываем браузер командой "q" ? или F10???

8. ук
9. 
